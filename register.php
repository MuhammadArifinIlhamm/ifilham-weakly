<?php

require 'fungsi.php';

// Mengecek apakah tombol register ditekan
if (isset($_POST["register"])) {

    if (register($_POST) > 0) {

        echo "
        <script>
            alert('User berhasil dibuat!');
            window.location.href='Login.php';
        </script>
        ";

    } else {

        echo "
        <script>
            alert('User gagal dibuat!');
        </script>
        ";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - DithoWeekly</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .container{
            width: 380px;
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,.2);
        }

        .logo{
            text-align: center;
            font-size: 45px;
            margin-bottom: 15px;
        }

        h1{
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .input-group{
            margin-bottom: 18px;
        }

        .input-group label{
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        .input-group input{
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            transition: .3s;
        }

        .input-group input:focus{
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102,126,234,.5);
        }

        .btn{
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #667eea;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: .3s;
        }

        .btn:hover{
            background: #5563d8;
        }

        .login-link{
            text-align: center;
            margin-top: 20px;
        }

        .login-link a{
            text-decoration: none;
            color: #667eea;
            font-weight: bold;
        }

        .login-link a:hover{
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">

        <div class="logo">📝</div>

        <h1>Register</h1>

        <form action="" method="post">

            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password1" id="password" required>
            </div>

            <div class="input-group">
                <label for="password2">Konfirmasi Password</label>
                <input type="password" name="password2" id="password2" required>
            </div>

            <button type="submit" name="register" class="btn">
                Register
            </button>

        </form>

        <div class="login-link">
            Sudah punya akun?
            <a href="Login.php">Login</a>
        </div>

    </div>

</body>
</html>