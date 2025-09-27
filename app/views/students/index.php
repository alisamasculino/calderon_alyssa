<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Student Records Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
    body {
            font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }
        
        body::before {
            content: "";
            position: fixed;
      top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center;
            background-size: cover;
            opacity: 0.15;
            z-index: -1;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }
        
        .student-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        
        .student-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }
        
        .header-gradient {
            background: linear-gradient(135deg, #1a2a6c 0%, #b21f1f 50%, #fdbb2d 100%);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #1a2a6c 0%, #b21f1f 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 42, 108, 0.4);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
            transition: all 0.3s ease;
        }
        
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 65, 108, 0.4);
        }
        
        .btn-success {
            background: linear-gradient(135deg, #00b09b 0%, #96c93d 100%);
            transition: all 0.3s ease;
        }
        
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 176, 155, 0.4);
        }
        
        .search-input {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(26, 42, 108, 0.2);
      transition: all 0.3s ease;
        }
        
        .search-input:focus {
            box-shadow: 0 0 0 3px rgba(26, 42, 108, 0.1);
            border-color: #1a2a6c;
        }
        
        .floating-icon {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        .text-gradient {
            background: linear-gradient(135deg, #1a2a6c 0%, #b21f1f 50%, #fdbb2d 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .stats-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        .student-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1a2a6c 0%, #b21f1f 100%);
      display: flex;
      align-items: center;
      justify-content: center;
            color: white;
            font-size: 2rem;
            font-weight: bold;
            margin: 0 auto;
        }
        
        .pagination-btn {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(26, 42, 108, 0.2);
      transition: all 0.3s ease;
    }
    
        .pagination-btn:hover {
            background: rgba(26, 42, 108, 0.1);
      transform: translateY(-1px);
    }
    
        .pagination-btn.active {
            background: linear-gradient(135deg, #1a2a6c 0%, #b21f1f 100%);
      color: white;
    }
    
        /* Center and style server-side pagination output */
        nav ul.pagination {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        ul.pagination li {
            list-style: none;
        }
        ul.pagination li a,
        ul.pagination li span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 0.75rem;
            border-radius: 0.5rem;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(26, 42, 108, 0.2);
            transition: all 0.3s ease;
            color: #1f2937; /* gray-800 */
            text-decoration: none;
            font-size: 0.875rem;
        }
        ul.pagination li a:hover {
            background: rgba(26, 42, 108, 0.1);
            transform: translateY(-1px);
        }
        ul.pagination li.active a,
        ul.pagination li.active span {
            background: linear-gradient(135deg, #1a2a6c 0%, #b21f1f 100%);
            color: #ffffff;
            border-color: transparent;
        }
  </style>
</head>
<body class="min-h-screen p-4 md:p-6 relative">
    <!-- Floating decorative elements -->
    <div class="absolute top-10 left-10 w-20 h-20 rounded-full bg-blue-400 opacity-20 floating-icon"></div>
    <div class="absolute bottom-20 right-10 w-16 h-16 rounded-full bg-red-400 opacity-20 floating-icon" style="animation-delay: 1s;"></div>
    <div class="absolute top-1/3 right-1/4 w-12 h-12 rounded-full bg-yellow-400 opacity-20 floating-icon" style="animation-delay: 2s;"></div>
    
    <div id="app" class="relative w-full max-w-7xl mx-auto rounded-2xl glass-effect p-6 md:p-8 flex flex-col gap-8">
        <!-- Header Section -->
        <header class="flex flex-col md:flex-row justify-between items-center gap-6 py-4">
            <div class="flex items-center gap-4">
                <div class="p-3 rounded-full bg-white bg-opacity-20">
                    <i class="fas fa-graduation-cap text-3xl text-white"></i>
                </div>
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold text-white drop-shadow-md">Student Records</h1>
                    <p class="text-white text-opacity-80">Beautiful card-based student management</p>
                </div>
            </div>
            
            <div class="flex flex-col sm:flex-row items-center gap-4">
                <form class="relative" action="<?= site_url('students'); ?>" method="get">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                    <input name="q" type="text" placeholder="Search students..." value="<?= isset($q) ? html_escape($q) : '' ?>"
                        class="pl-10 pr-4 py-3 rounded-xl search-input w-full md:w-64 focus:outline-none"/>
                </form>
                <a href="<?=site_url('students/create');?>" 
                    class="flex items-center gap-2 text-white font-semibold px-5 py-3 rounded-xl btn-success shadow-lg">
                    <i class="fas fa-user-plus"></i>
                    <span>Add New Student</span>
                </a>
    </div>
  </header>

        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="stats-card flex items-center gap-4">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <i class="fas fa-users text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Total Students</h3>
                    <p class="text-2xl font-bold text-gradient"><?= isset($total_rows) ? (int)$total_rows : count($users) ?></p>
                </div>
            </div>
            
            <div class="stats-card flex items-center gap-4">
                <div class="p-3 rounded-full bg-green-100 text-green-600">
                    <i class="fas fa-check-circle text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Active Records</h3>
                    <p class="text-2xl font-bold text-gradient"><?= isset($total_rows) ? (int)$total_rows : count($users) ?></p>
                </div>
            </div>
            
            <div class="stats-card flex items-center gap-4">
                <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                    <i class="fas fa-database text-2xl"></i>
                </div>
        <div>
                    <h3 class="text-lg font-semibold text-gray-700">System Status</h3>
                    <p class="text-2xl font-bold text-gradient">Online</p>
                </div>
            </div>
        </div>

        <!-- Student Cards Section -->
        <section>
            <div class="header-gradient text-white p-4 md:p-6 rounded-t-xl">
                <h2 class="text-xl md:text-2xl font-semibold flex items-center gap-2">
                    <i class="fas fa-id-card"></i>
                    Student Profiles
                </h2>
                <p class="text-white text-opacity-90 mt-1">Browse student information in a beautiful card layout</p>
            </div>
            
            <div id="studentsContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 p-6 bg-white bg-opacity-50 rounded-b-xl">
                <?php foreach ($users as $user): ?>
                <div class="student-card p-5">
                    <div class="student-avatar mb-4">
                        <?= html_escape(substr($user['first_name'], 0, 1) . substr($user['last_name'], 0, 1)) ?>
                    </div>
                    
                    <div class="text-center mb-4">
                        <h3 class="text-xl font-bold text-gray-800"><?= html_escape($user['first_name']);?> <?= html_escape($user['last_name']);?></h3>
                        <p class="text-gray-600 text-sm">Student ID: <?= html_escape($user['id']);?></p>
                    </div>
                    
                    <div class="mb-4">
                        <div class="flex items-center gap-2 text-gray-700 mb-2">
                            <i class="fas fa-envelope text-blue-500"></i>
                            <span class="text-sm truncate"><?= html_escape($user['email']);?></span>
                        </div>
                        <div class="flex items-center gap-2 text-gray-700">
                            <i class="fas fa-calendar text-green-500"></i>
                            <span class="text-sm">Joined: 2025</span>
                        </div>
                    </div>
                    
                    <div class="flex justify-between gap-2">
                        <a href="<?=site_url('students/update/'.$user['id']);?>" 
                            class="flex-1 flex items-center justify-center gap-1 px-3 py-2 rounded-lg btn-primary text-white font-medium text-xs">
                            <i class="fas fa-edit"></i>
                            <span>Edit</span>
                        </a>
                        <a href="<?=site_url('students/delete/'.$user['id']);?>" 
                            onclick="return confirm('Are you sure you want to delete this student record?');"
                            class="flex-1 flex items-center justify-center gap-1 px-3 py-2 rounded-lg btn-danger text-white font-medium text-xs">
                            <i class="fas fa-trash"></i>
                            <span>Delete</span>
                        </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

            <!-- Pagination Controls -->
            <div class="flex justify-center p-4 gap-2 flex-wrap bg-white bg-opacity-50 rounded-b-xl">
                <?= isset($page) ? $page : '' ?>
            </div>
        </section>
        
        <!-- Footer -->
        <footer class="text-center text-white text-opacity-70 py-4 border-t border-white border-opacity-20">
            <p class="flex items-center justify-center gap-2">
                <i class="fas fa-heart text-red-400"></i>
                <span>© 2023 Student Records Management System | BSIT 3F2 - Mindoro State University</span>
            </p>
        </footer>
    </div>

    <script>
    </script>
</body>
</html>