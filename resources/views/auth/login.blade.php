<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIM Budidaya Nila Salin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #0a0e1a;
            color: #e2e8f0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Background Animation */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(ellipse at 20% 50%, rgba(0, 212, 255, 0.05) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 50%, rgba(139, 92, 246, 0.05) 0%, transparent 50%);
            z-index: -1;
        }

        .login-container {
            width: 100%;
            max-width: 1100px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            background: rgba(17, 24, 39, 0.6);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            border: 1px solid rgba(0, 212, 255, 0.05);
            padding: 50px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Left Side - Info */
        .login-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-info .badge {
            display: inline-block;
            background: rgba(0, 212, 255, 0.1);
            border: 1px solid rgba(0, 212, 255, 0.2);
            color: #00d4ff;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 24px;
            width: fit-content;
        }

        .login-info .badge i {
            margin-right: 10px;
        }

        .login-info h1 {
            font-size: 40px;
            font-weight: 900;
            line-height: 1.2;
            margin-bottom: 16px;
        }

        .login-info h1 .highlight {
            background: linear-gradient(135deg, #00d4ff, #0891b2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .login-info p {
            color: #94a3b8;
            font-size: 18px;
            line-height: 1.7;
            max-width: 380px;
        }

        .login-info .fish-icon {
            font-size: 100px;
            color: rgba(0, 212, 255, 0.1);
            margin-top: 24px;
        }

        .login-info .location {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #64748b;
            font-size: 16px;
            margin-top: 16px;
        }

        .login-info .location i {
            color: #00d4ff;
            font-size: 18px;
        }

        /* Right Side - Login Form */
        .login-form {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-form h2 {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .login-form .subtitle {
            color: #94a3b8;
            font-size: 17px;
            margin-bottom: 36px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            font-weight: 600;
            color: #94a3b8;
            margin-bottom: 8px;
        }

        .form-group label i {
            margin-right: 10px;
            color: #00d4ff;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper input {
            width: 100%;
            padding: 16px 20px;
            background: rgba(10, 14, 26, 0.6);
            border: 1px solid rgba(0, 212, 255, 0.08);
            border-radius: 14px;
            color: #e2e8f0;
            font-size: 18px;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
            outline: none;
        }

        .input-wrapper input:focus {
            border-color: rgba(0, 212, 255, 0.3);
            box-shadow: 0 0 30px rgba(0, 212, 255, 0.05);
        }

        .input-wrapper input::placeholder {
            color: #475569;
        }

        .input-wrapper .toggle-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #64748b;
            cursor: pointer;
            font-size: 20px;
            transition: color 0.3s;
        }

        .input-wrapper .toggle-password:hover {
            color: #00d4ff;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .form-options label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            color: #94a3b8;
            cursor: pointer;
        }

        .form-options label input[type="checkbox"] {
            accent-color: #00d4ff;
            width: 18px;
            height: 18px;
        }

        .form-options a {
            color: #00d4ff;
            font-size: 16px;
            text-decoration: none;
            transition: color 0.3s;
        }

        .form-options a:hover {
            color: #0891b2;
        }

        .btn-login {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #00d4ff, #0891b2);
            color: #0a0e1a;
            font-weight: 700;
            font-size: 19px;
            border: none;
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 0 30px rgba(0, 212, 255, 0.1);
            font-family: 'Inter', sans-serif;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 40px rgba(0, 212, 255, 0.25);
        }

        .btn-login i {
            margin-right: 12px;
        }

        .login-error {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #f87171;
            padding: 14px 20px;
            border-radius: 12px;
            font-size: 16px;
            margin-bottom: 20px;
            display: none;
        }

        .login-error.show {
            display: block;
        }

        .login-error i {
            margin-right: 10px;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .login-container {
                grid-template-columns: 1fr;
                padding: 30px;
                gap: 30px;
            }

            .login-info {
                text-align: center;
                align-items: center;
            }

            .login-info p {
                max-width: 100%;
            }

            .login-info .badge {
                margin-left: auto;
                margin-right: auto;
            }

            .login-info .location {
                justify-content: center;
            }

            .login-info h1 {
                font-size: 32px;
            }
        }

        @media (max-width: 500px) {
            .login-container {
                padding: 20px;
                border-radius: 16px;
            }

            .login-info h1 {
                font-size: 26px;
            }

            .login-form h2 {
                font-size: 24px;
            }

            .login-form .subtitle {
                font-size: 15px;
            }

            .form-options {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="bg-animation"></div>

    <div class="login-container">
        <!-- Left Side - Info -->
        <div class="login-info">
            <div class="badge">
                <i class="fas fa-fish"></i> Sistem Informasi Manajemen
            </div>
            <h1>
                <span class="highlight">Pengelolaan Budidaya</span><br>
                Ikan Nila Salin
            </h1>
            <p>Digitalisasi pengelolaan budidaya ikan nila salin untuk mendukung pengelolaan data dan promosi hasil panen secara langsung.</p>
            <div class="location">
                <i class="fas fa-map-marker-alt"></i>
                <span>Desa Wanantara, Kec. Sindang, Kab. Indramayu, Jawa Barat</span>
            </div>
            <i class="fas fa-fish fish-icon"></i>
        </div>

        <!-- Right Side - Login Form -->
        <div class="login-form">
            <h2>Login</h2>
            <p class="subtitle">Masuk ke sistem manajemen budidaya</p>

            @if(session('error'))
                <div class="login-error show">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label><i class="fas fa-envelope"></i> Email</label>
                    <div class="input-wrapper">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="admin@wanantara.com" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label><i class="fas fa-lock"></i> Password</label>
                    <div class="input-wrapper">
                        <input type="password" name="password" id="password" placeholder="Masukkan password" required>
                        <button type="button" class="toggle-password" onclick="togglePassword()">
                            <i class="fas fa-eye" id="passwordIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="form-options">
                    <label>
                        <input type="checkbox" name="remember"> Ingat saya
                    </label>
                    <a href="#">Lupa password?</a>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Masuk ke Sistem
                </button>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const icon = document.getElementById('passwordIcon');
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>