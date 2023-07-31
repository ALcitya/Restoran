<?php
session_start();
require("module.php");

if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    if ($key === hash("sha224", fetchingData("SELECT * FROM user WHERE id = '$id'")[0]["email"])) {
        $_SESSION["login"] = "true";
    }
}


if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $alreadyData = fetchingData("SELECT * FROM user WHERE email = '$email'");
    if ($alreadyData) {
        if (password_verify($password, $alreadyData[0]["password"])) {
            $_SESSION["login"] = true;

            if ($_POST["remember"]) {
                setcookie("id", $alreadyData[0]["id"], time() + 300);
                setcookie("key", hash("sha224", $alreadyData[0]["email"]), time() + 300);
            }

            header("Location: index.php ");
        } else {
            echo "
            <script>
            alert('email atau password salah.');
            </script>
            ";
        }
    } else {
        echo "
        <script>
        alert('email atau password salah.');
        </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Document</title>
</head>

<body>
    <section>
        <form action="" method="post">
            <ul>
                <li>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autofocus>
                </li>
                <li>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autofocus>
                </li>
                <li>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember Me</label>
                </li>
                <li>
                    <button type="submit" name="login">Login</button>
                </li>
            </ul>
        </form>
    </section>
    <section>
        <div>
            <a href="signup.php">Sign Up</a>
        </div>
    </section>
</body>

</html>