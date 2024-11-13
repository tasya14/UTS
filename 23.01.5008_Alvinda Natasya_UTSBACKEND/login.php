<?php

session_start();

$message = '';
if (isset($_SESSION["message"])) {
    $message = $_SESSION["message"];
    unset($_SESSION["message"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            margin-left: 60vh;
            margin-top: 20vh;
            background-color:#4e4ab6  ;
        }

        u {
            text-decoration: none;
        }

        a {
            text-decoration: none;
        }
        .btn {
            width: 30%;
            padding: 12px;
            background-color: #E74C3C;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #C0392B;
        }
        .card{
            display: flex;
            margin-left: 100px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
    
        }
        
    </style>
</head>

<body>
    <div class="card card-body" style="width: 25rem; height: 25rem; border-radius: 20px; background-color: #66768d;">
        <h4 class="text-center mb-4">LOGIN</h4>
        <form action="./ctrl_login.php" method="POST">
            <div>
                <div class="mb-5">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        placeholder="Masukkan Username" required>
                </div>
                <div class="mb-5">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Masukkan Password" required>
                </div>
            </div>

            <?php if (isset($message)): ?>
                <p style="color: red; font-style: italic;"><?= $message ?></p>
            <?php endif ?>
            <button type="submit" class="btn" name="submit">Login</button>
        </form>
        <!-- <div class="mt-3">
            <u>Belum punya Akun?<a href=""> Register</a></u>
        </div> -->
    </div>
</body>

</html>