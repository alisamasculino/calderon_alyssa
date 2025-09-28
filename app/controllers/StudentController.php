<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: StudentController
 * 
 * Automatically generated via CLI.
 */
class StudentController extends Controller {
    public function __construct()
    {
        parent::__construct();

        $this->call->database();
        $this->call->model('StudentModel');
        $this->call->library('pagination');

    }

    public function index()
    {
        $this->call->view('students/index');
    }

    public function home()
    {
        // Check if user is logged in
        $this->call->library('session');
        if(!$this->session->userdata('logged_in')) {
            redirect('students/index');
            return;
        }

        // Show student records home page (previously index)
        $this->call->model('StudentModel');

        $page = 1;
        if(isset($_GET['page']) && ! empty($_GET['page'])) {
            $page = $this->io->get('page');
        }

        $q = '';
        if(isset($_GET['q']) && ! empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 8;

        $users = $this->StudentModel->page($q, $records_per_page, $page);
        $data['users'] = $users['records'];
        $total_rows = $users['total_rows'];
        $data['total_rows'] = $total_rows;
        $data['q'] = $q;

        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('bootstrap');
        $this->pagination->initialize($total_rows, $records_per_page, $page, 'students/home?q='.$q);
        $data['page'] = $this->pagination->paginate();

        $this->call->view('students/home', $data);
    }

    public function login()
    {
        if($this->io->method() == 'post') {
            $email = $this->io->post('email');
            $password = $this->io->post('password');
            $remember = $this->io->post('remember');

            if($email && $password) {
                // Find user by email
                $user = $this->StudentModel->db->table('users')
                    ->where('email', $email)
                    ->get();
                
                if($user && password_verify($password, $user['password'])) {
                    // Set session variables
                    $this->call->library('session');
                    $this->session->set_userdata([
                        'user_id' => $user['id'],
                        'user_email' => $user['email'],
                        'user_name' => $user['first_name'] . ' ' . $user['last_name'],
                        'logged_in' => true
                    ]);
                    
                    // Handle remember me functionality
                    if($remember) {
                        // Set a cookie for 30 days
                        setcookie('remember_user', $user['id'], time() + (30 * 24 * 60 * 60), '/');
                    }
                    
                    // Redirect to home page
                    redirect('students/home');
                } else {
                    // Invalid credentials
                    $data['error'] = 'Invalid email or password';
                    $this->call->view('students/login', $data);
                }
            } else {
                // Missing credentials
                $data['error'] = 'Please enter both email and password';
                $this->call->view('students/login', $data);
            }
        } else {
            $this->call->view('students/login');
        }
    }

    public function create() 
    {
        if($this->io->method() == 'post') {
            $first_name = $this->io->post('first_name');
            $last_name  = $this->io->post('last_name');
            $email      = $this->io->post('email');
            $password   = $this->io->post('password');
            $confirm_password = $this->io->post('confirm_password');

            // Validate password match
            if($password !== $confirm_password) {
                $data['error'] = 'Passwords do not match';
                $this->call->view('students/create', $data);
                return;
            }

            // Validate password length
            if(strlen($password) < 6) {
                $data['error'] = 'Password must be at least 6 characters long';
                $this->call->view('students/create', $data);
                return;
            }

            // Hash the password for security
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $data = array(
                'first_name' => $first_name,
                'last_name'  => $last_name,
                'email'      => $email,
                'password'   => $hashed_password,
            );

            if ($this->StudentModel->insert($data)) {
                // Redirect to login page after successful registration
                redirect('students/login');
            } else {
                $data['error'] = 'Error creating student account. Please try again.';
                $this->call->view('students/create', $data);
            }
        } else {
            $this->call->view('students/create');
        }
    }



    public function update($id)
    {
        $user = $this->StudentModel->find($id);
        if (!$user) {   
            echo 'Student not found.';
            return;
        }

        if($this->io->method() == 'post') {
            $first_name = $this->io->post('first_name');
            $last_name  = $this->io->post('last_name');
            $email      = $this->io->post('email');

            $data = array(
                'first_name' => $first_name,
                'last_name'  => $last_name,
                'email'      => $email,
            );

            if ($this->StudentModel->update($id, $data)) {
                redirect();
            } else {
                echo 'Error updating student.';
            }
        } else {
            $data['user'] = $user;
            $this->call->view('students/update', $data);
        }
    }

    public function delete($id)
    {
        if ($this->StudentModel->delete($id)) {
            redirect();
        } else {
            echo 'Error deleting student.';
        }
    }

    public function logout()
    {
        $this->call->library('session');
        $this->session->sess_destroy();
        
        // Clear remember me cookie
        if(isset($_COOKIE['remember_user'])) {
            setcookie('remember_user', '', time() - 3600, '/');
        }
        
        redirect('students/index');
    }

}