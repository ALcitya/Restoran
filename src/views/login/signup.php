<?php
require("module.php");
if (isset($_POST["signup"])) {
    if (signUp() > 0) {
        echo "
        <script>
        alert('berhasil mendaftar');
        </script>
        ";
        header("Location: login.php");
    } else {
        echo "
        <script>
        alert('gagal mendaftar');
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
                    <input type="password" name="password" id="password">
                </li>
                <li>
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" name="confirmPassword" id="confirmPassword">
                </li>
                <li>
                    <button type="submit" name="signup">Sign Up</button>
                </li>
            </ul>
        </form>
    </section>
    <section>
        <div>
            <a href="login.php">Login</a>
        </div>
    </section>
</body>

</html>