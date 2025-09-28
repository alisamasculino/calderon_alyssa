<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Student Records Management - Authentication</title>
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
        
        .auth-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
        }
        
        .auth-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
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
        
        .auth-option {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .auth-option:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        .auth-option.active {
            border: 2px solid #1a2a6c;
            background: rgba(26, 42, 108, 0.05);
        }
    </style>
</head>
<body class="min-h-screen p-4 md:p-6 relative">
    <!-- Floating decorative elements -->
    <div class="absolute top-10 left-10 w-20 h-20 rounded-full bg-blue-400 opacity-20 floating-icon"></div>
    <div class="absolute bottom-20 right-10 w-16 h-16 rounded-full bg-red-400 opacity-20 floating-icon" style="animation-delay: 1s;"></div>
    <div class="absolute top-1/3 right-1/4 w-12 h-12 rounded-full bg-yellow-400 opacity-20 floating-icon" style="animation-delay: 2s;"></div>
    
    <div id="app" class="relative w-full max-w-3xl mx-auto rounded-2xl glass-effect p-4 md:p-6">
        <!-- Header Section -->
        <header class="text-center py-4 mb-4">
            <div class="flex justify-center items-center gap-3 mb-3">
                <div class="p-2 rounded-full bg-white bg-opacity-20">
                    <i class="fas fa-graduation-cap text-2xl text-white"></i>
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-white drop-shadow-md">Student Records</h1>
                    <p class="text-white text-opacity-80 text-sm">Management System</p>
                </div>
            </div>
            <p class="text-white text-opacity-90 text-sm max-w-xl mx-auto">
                Choose an option to continue
            </p>
        </header>

        <!-- Authentication Options -->
        <section class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <!-- Login Option -->
            <div class="auth-card p-4 text-center auth-option" onclick="selectAuth('login')" id="login-option">
                <div class="mb-3">
                    <div class="w-12 h-12 mx-auto rounded-full bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center mb-2">
                        <i class="fas fa-sign-in-alt text-lg text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-1">Login</h3>
                    <p class="text-gray-600 text-sm">Access your existing account</p>
                </div>
                <div class="space-y-1">
                    <div class="text-left">
                        <i class="fas fa-check text-green-500 mr-1 text-xs"></i>
                        <span class="text-xs text-gray-600">View records</span>
                    </div>
                    <div class="text-left">
                        <i class="fas fa-check text-green-500 mr-1 text-xs"></i>
                        <span class="text-xs text-gray-600">Edit information</span>
                    </div>
                </div>
            </div>

            <!-- Register Option -->
            <div class="auth-card p-4 text-center auth-option" onclick="selectAuth('register')" id="register-option">
                <div class="mb-3">
                    <div class="w-12 h-12 mx-auto rounded-full bg-gradient-to-r from-green-500 to-teal-600 flex items-center justify-center mb-2">
                        <i class="fas fa-user-plus text-lg text-white"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-1">Register</h3>
                    <p class="text-gray-600 text-sm">Create a new account</p>
                </div>
                <div class="space-y-1">
                    <div class="text-left">
                        <i class="fas fa-check text-green-500 mr-1 text-xs"></i>
                        <span class="text-xs text-gray-600">Create account</span>
                    </div>
                    <div class="text-left">
                        <i class="fas fa-check text-green-500 mr-1 text-xs"></i>
                        <span class="text-xs text-gray-600">Access features</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row justify-center gap-3 mb-4">
            <button id="login-btn" onclick="proceedToLogin()" 
                class="hidden flex items-center justify-center gap-2 px-6 py-2 rounded-xl btn-primary text-white font-semibold text-sm shadow-lg">
                <i class="fas fa-sign-in-alt"></i>
                <span>Proceed to Login</span>
            </button>
            <button id="register-btn" onclick="proceedToRegister()" 
                class="hidden flex items-center justify-center gap-2 px-6 py-2 rounded-xl btn-secondary text-white font-semibold text-sm shadow-lg">
                <i class="fas fa-user-plus"></i>
                <span>Proceed to Register</span>
            </button>
        </div>

        <!-- System Info -->
        <div class="text-center">
            <div class="inline-flex items-center gap-2 bg-white bg-opacity-20 rounded-full px-4 py-2">
                <i class="fas fa-shield-alt text-green-400 text-sm"></i>
                <span class="text-white text-xs font-medium">Secure & Reliable</span>
            </div>
        </div>
        
        <!-- Footer -->
        <footer class="text-center text-white text-opacity-70 py-3 mt-4 border-t border-white border-opacity-20">
            <p class="flex items-center justify-center gap-2 text-xs">
                <i class="fas fa-heart text-red-400"></i>
                <span>© 2023 Student Records Management System</span>
            </p>
        </footer>
    </div>

    <script>
        let selectedAuth = null;

        function selectAuth(type) {
            // Remove active class from all options
            document.querySelectorAll('.auth-option').forEach(option => {
                option.classList.remove('active');
            });
            
            // Add active class to selected option
            document.getElementById(type + '-option').classList.add('active');
            
            // Show appropriate button
            document.getElementById('login-btn').classList.add('hidden');
            document.getElementById('register-btn').classList.add('hidden');
            
            if (type === 'login') {
                document.getElementById('login-btn').classList.remove('hidden');
            } else {
                document.getElementById('register-btn').classList.remove('hidden');
            }
            
            selectedAuth = type;
        }

        function proceedToLogin() {
            if (selectedAuth === 'login') {
                window.location.href = '<?= site_url("students/login"); ?>';
            }
        }

        function proceedToRegister() {
            if (selectedAuth === 'register') {
                window.location.href = '<?= site_url("students/create"); ?>';
            }
        }

        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.auth-option');
            
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px) scale(1.02)';
                });
                
                card.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('active')) {
                        this.style.transform = 'translateY(0) scale(1)';
                    }
                });
            });
        });
    </script>
</body>
</html>