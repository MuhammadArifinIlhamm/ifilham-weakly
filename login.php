<?php
session_start();
require 'fungsi.php';

if (isset($_POST["login"])) {

    if (login($_POST)) {
        header("Location: index.php");
        exit;
    } else {
        echo "
        <script>
            alert('Username atau password salah!');
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
    <title>Login - DithoWeekly</title>

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
            width: 350px;
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,.2);
        }

        .container h2{
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
            color: #555;
            font-weight: bold;
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

        .register{
            text-align: center;
            margin-top: 20px;
        }

        .register a{
            text-decoration: none;
            color: #667eea;
            font-weight: bold;
        }

        .register a:hover{
            text-decoration: underline;
        }

        .logo{
            text-align: center;
            font-size: 45px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="container">

        <div class="logo">🔐</div>

        <h2>Login</h2>

        <form action="" method="post">

            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Masukkan username" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan password" required>
            </div>

            <button type="submit" name="login" class="btn">
                Login
            </button>

        </form>

        <div class="register">
            Belum punya akun?
            <a href="register.php">Register</a>
        </div>

    </div>

</body>
</html>