<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .login-container {
            width: 300px;
            margin: auto;
            margin-top: 100px;
        }

        .login-container h2 {
            text-align: center;
            color: #333;
        }

        .login-form {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #0F2167;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            display: inline-block;
        }

        input[type="submit"]:hover {
            background-color: #0F2167;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form class="login-form" method="post" action="login_process.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>
