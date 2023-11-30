<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successfully Registered</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 600px;
            text-align: center;
        }

        .alert {
            background-color: #ffeeba;
            border: 1px solid #ffc107;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .alert h4 {
            color: #856404;
        }

        .alert p {
            margin: 0;
        }

        .btn-info {
            background-color: #17a2b8;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }

        .btn-info:hover {
            background-color: #138496;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="alert">
            <h4>Alert!</h4>
            <p>You have been successfully registered. <a href="signin.php" class="btn-info">Sign In</a></p>
        </div>
    </div>
</body>
</html>
