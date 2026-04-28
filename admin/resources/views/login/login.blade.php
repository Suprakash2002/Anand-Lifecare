<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
        }

        .login-container {
            width: 350px;
            padding: 40px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            color: #555;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
            transition: 0.3s;
        }

        .input-group input:focus {
            border-color: #2a5298;
        }

        .login-btn {
            width: 100%;
            padding: 10px;
            background: #2a5298;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-btn:hover {
            background: #1e3c72;
        }

        .extra {
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
        }

        .extra a {
            text-decoration: none;
            color: #2a5298;
        }

        .extra a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Hospital ERP Login</h2>

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit" class="login-btn">Login</button>

        <!-- <div class="extra">
            <p>Forgot Password? <a href="#">Signup</a></p>
        </div> -->
    </form>
</div>

</body>
</html>
