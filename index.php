<?php
session_start();
include 'connect.php';
if (isset($_SESSION['loged']) && $_SESSION['loged'] === true) {
    die(header('location: admin.php'));
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
    <a href="register.php"><button>Register</button></a>
    <a href="login.php"><button>Login</button></a>
</body>

</html>