<?php include("include/connect.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Login - Adidravidar Matrimony</title>
    <link rel="stylesheet" href="css/modern-design.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f4f7f6;
        }

        .login-container {
            max-width: 450px;
            margin: 80px auto;
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            color: #333;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-label {
            font-weight: 600;
            font-size: 14px;
            color: #555;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #ddd;
        }

        .login-footer {
            border-top: 1px solid #eee;
            margin-top: 30px;
            padding-top: 20px;
            text-align: center;
        }

        .register-link {
            color: #07642f;
            font-weight: 700;
            text-decoration: none;
        }

        .register-link:hover {
            text-decoration: underline;
        }

        .logo-small {
            height: 50px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <?php include("include/header.php"); ?>

    <div class="login-container">
        <div class="text-center">
            <img src="image/newlogo.svg" class="logo-small" alt="Logo">
            <h2 class="section-title">Member Login</h2>
        </div>

        <form name="form3" method="POST" action="login/logincheck.php" onsubmit="return validateLogin();">
            <input type="hidden" name="command" id="command" value="login" />

            <div class="mb-3">
                <label class="form-label">User ID</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 rounded-start-2"><i
                            class="bi bi-person text-muted"></i></span>
                    <input type="text" class="form-control border-start-0 rounded-end-2" name="username" id="username"
                        placeholder="Enter your User ID" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 rounded-start-2"><i
                            class="bi bi-lock text-muted"></i></span>
                    <input type="password" class="form-control border-start-0 rounded-end-2" name="password"
                        id="password" placeholder="Enter your password" required>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember_me" id="remember" value="Y">
                    <label class="form-check-label small text-muted" for="remember">Remember Me</label>
                </div>
                <a href="#" class="small text-muted text-decoration-none">Forgot Password?</a>
            </div>

            <button type="submit" class="btn btn-green">Login to Your Account</button>
        </form>

        <div class="login-footer">
            <p class="small text-muted mb-0">Don't have an account?</p>
            <a href="register_user.php" class="register-link">Register New Profile</a>
        </div>
    </div>

    <script>
        function validateLogin() {
            var user = document.getElementById("username").value;
            var pass = document.getElementById("password").value;
            if (!user.trim()) { alert("Please Enter Your User ID"); return false; }
            if (!pass.trim()) { alert("Please Enter Your Password"); return false; }
            return true;
        }
    </script>

    <?php include("include/footer.php"); ?>

</body>

</html>