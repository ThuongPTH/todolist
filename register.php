<?php
    include('function.php');
	$conn = mysqli_connect('localhost','root','','webb');
	mysqli_set_charset($conn,"utf8");
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if($_POST['action'] === 'login') die(header('Location:/login.php'));
        $username = (string)$_POST['username'];
        $password = (string)$_POST['password'];
        $password2 = (string)$_POST['password2'];
        if($password != $password2){
            die('Sai passwork! Đăng ký không thành công <a href = "/register.php"> Resiter again </a>');
        }
        else{
            if(get_username($username, $conn) === null){
              add_data($username, $password2, $conn);
              die(header('Location:login.php'));
            }
            else die('Username đã tồn tại! Đăng ký không thành công <a href = "/register.php"> Resiter again </a>');
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
    <form action="" method="POST">
        <br>
        Username: 
        <br>
        <input type="text" name="username" placeholder="username"/>
        <br>
        Password:
        <br>
        <input type="text" name="password" placeholder="password"/>
        <br>
        Password again:
        <br>
        <input type="text" name="password2" placeholder="re-enter password"/>
        <br>
        <br>
        <button type="submit" name="action" value="register">Register</button> &emsp;
        <button type="submit" name="action" value="login">Login</button>
    </form>
</body>
</html>