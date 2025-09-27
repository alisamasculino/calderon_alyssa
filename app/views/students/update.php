<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Update Student Record</title>
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
        
        .form-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.5);
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
        
        .btn-secondary {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 117, 125, 0.4);
        }
        
        .form-input {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(26, 42, 108, 0.2);
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(26, 42, 108, 0.1);
            border-color: #1a2a6c;
            background: rgba(255, 255, 255, 0.95);
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
        
        .image-container {
            background: linear-gradient(135deg, #1a2a6c 0%, #b21f1f 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            height: 100%;
            min-height: 300px;
        }
        
        .profile-image {
            max-width: 100%;
            height: auto;
            filter: drop-shadow(0 10px 15px rgba(0, 0, 0, 0.2));
            border-radius: 10px;
        }
        
        .student-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1a2a6c 0%, #b21f1f 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            font-weight: bold;
            margin: 0 auto 20px;
        }
    </style>
</head>
<body class="min-h-screen p-4 md:p-6 relative">
    <!-- Floating decorative elements -->
    <div class="absolute top-10 left-10 w-20 h-20 rounded-full bg-blue-400 opacity-20 floating-icon"></div>
    <div class="absolute bottom-20 right-10 w-16 h-16 rounded-full bg-red-400 opacity-20 floating-icon" style="animation-delay: 1s;"></div>
    <div class="absolute top-1/3 right-1/4 w-12 h-12 rounded-full bg-yellow-400 opacity-20 floating-icon" style="animation-delay: 2s;"></div>
    
    <div id="app" class="relative w-full max-w-5xl mx-auto rounded-2xl glass-effect p-6 md:p-8">
        <!-- Header Section -->
        <header class="flex flex-col md:flex-row justify-between items-center gap-6 py-4 mb-8">
            <div class="flex items-center gap-4">
                <div class="p-3 rounded-full bg-white bg-opacity-20">
                    <i class="fas fa-user-edit text-3xl text-white"></i>
                </div>
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold text-white drop-shadow-md">Update Student Record</h1>
                    <p class="text-white text-opacity-80">Edit student information</p>
                </div>
            </div>
            
            <a href="<?=base_url('students/index');?>" 
                class="flex items-center gap-2 text-white font-semibold px-5 py-3 rounded-xl btn-secondary shadow-lg">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Students</span>
            </a>
        </header>

        <!-- Form Section -->
        <section class="form-container p-0 overflow-hidden">
            <div class="header-gradient text-white p-6">
                <h2 class="text-xl md:text-2xl font-semibold flex items-center gap-2">
                    <i class="fas fa-user-graduate"></i>
                    Edit Student Information
                </h2>
                <p class="text-white text-opacity-90 mt-1">Update the details for <?= html_escape($user['first_name']) ?> <?= html_escape($user['last_name']) ?></p>
            </div>
            
            <div class="p-6 md:p-8">
                <form action="<?=site_url('students/update/'.$user['id']);?>" method="POST" class="space-y-6" novalidate>
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Image Container -->
                        <div class="lg:col-span-1 image-container">
                            <img src="https://i.pinimg.com/1200x/67/a3/34/67a334572d9e4810f1a835d1bc7e7181.jpg" 
                                 alt="Student Profile" class="profile-image">
                        </div>
                        
                        <!-- Form Fields Column -->
                        <div class="lg:col-span-2 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <i class="fas fa-user text-blue-500"></i>
                                        First Name
                                    </label>
                                    <input type="text" name="first_name" placeholder="Enter first name" required
                                        value="<?= html_escape($user['first_name']); ?>"
                                        class="w-full px-4 py-3 rounded-xl form-input focus:outline-none" />
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <i class="fas fa-user text-blue-500"></i>
                                        Last Name
                                    </label>
                                    <input type="text" name="last_name" placeholder="Enter last name" required
                                        value="<?= html_escape($user['last_name']); ?>"
                                        class="w-full px-4 py-3 rounded-xl form-input focus:outline-none" />
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <i class="fas fa-envelope text-red-500"></i>
                                    Email Address
                                </label>
                                <input type="email" name="email" placeholder="student@example.com" required
                                    value="<?= html_escape($user['email']); ?>"
                                    class="w-full px-4 py-3 rounded-xl form-input focus:outline-none" />
                            </div>

                            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-4 border-t border-gray-200">
                                <button type="reset" 
                                    class="w-full sm:w-auto flex items-center justify-center gap-2 px-6 py-3 rounded-xl btn-secondary text-white font-semibold">
                                    <i class="fas fa-redo"></i>
                                    Reset Changes
                                </button>
                                <button type="submit"
                                    class="w-full sm:w-auto flex items-center justify-center gap-2 px-6 py-3 rounded-xl btn-primary text-white font-semibold shadow-lg">
                                    <i class="fas fa-save"></i>
                                    Update Student
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        
        <!-- Footer -->
        <footer class="text-center text-white text-opacity-70 py-4 mt-8 border-t border-white border-opacity-20">
            <p class="flex items-center justify-center gap-2">
                <i class="fas fa-heart text-red-400"></i>
                <span>© 2023 Student Records Management System | BSIT 3F2 - Mindoro State University</span>
            </p>
        </footer>
    </div>

    <script>
        const form = document.querySelector('form');
        const emailInput = form.querySelector('input[name="email"]');

        form.addEventListener('submit', function(event) {
            const emailValue = emailInput.value.trim();
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailPattern.test(emailValue)) {
                event.preventDefault();
                
                // Create a beautiful alert
                const alertDiv = document.createElement('div');
                alertDiv.className = 'fixed top-4 right-4 bg-red-500 text-white p-4 rounded-lg shadow-lg z-50 max-w-sm';
                alertDiv.innerHTML = `
                    <div class="flex items-center gap-3">
                        <i class="fas fa-exclamation-triangle text-xl"></i>
                        <div>
                            <p class="font-semibold">Invalid Email Format</p>
                            <p class="text-sm">Please enter a valid email address.</p>
                        </div>
                        <button class="ml-auto text-white hover:text-gray-200" onclick="this.parentElement.parentElement.remove()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
                document.body.appendChild(alertDiv);
                
                // Remove alert after 5 seconds
                setTimeout(() => {
                    if (alertDiv.parentElement) {
                        alertDiv.remove();
                    }
                }, 5000);
                
                emailInput.focus();
                emailInput.classList.add('border-red-500');
            }
        });

        // Remove error styling when user starts typing
        emailInput.addEventListener('input', function() {
            this.classList.remove('border-red-500');
        });

        // Add floating animation to form inputs on focus
        const inputs = document.querySelectorAll('.form-input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('transform', 'transition', 'duration-200');
                this.parentElement.style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        // Show success message if coming from update
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('updated')) {
            const successDiv = document.createElement('div');
            successDiv.className = 'fixed top-4 right-4 bg-green-500 text-white p-4 rounded-lg shadow-lg z-50 max-w-sm';
            successDiv.innerHTML = `
                <div class="flex items-center gap-3">
                    <i class="fas fa-check-circle text-xl"></i>
                    <div>
                        <p class="font-semibold">Update Successful</p>
                        <p class="text-sm">Student record has been updated successfully.</p>
                    </div>
                    <button class="ml-auto text-white hover:text-gray-200" onclick="this.parentElement.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
            document.body.appendChild(successDiv);
            
            // Remove success message after 5 seconds
            setTimeout(() => {
                if (successDiv.parentElement) {
                    successDiv.remove();
                }
            }, 5000);
        }
    </script>
</body>
</html>