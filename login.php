<?php
    session_start();
    include('function.php');
	$conn = mysqli_connect('localhost','root','','webb');
	mysqli_set_charset($conn,"utf8");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
    if(isset($_SESSION['loged']) === 1 && $_SESSION['loged'] === 'true') die(header('Location: /admin.php'));
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $infor = get_username($username, $conn);
        if($_POST['action']==='register') die(header('Location: /register.php'));
        else{
            echo $infor['password'];
            echo '<br>';
            echo md5($password);
            if($infor['password'] === md5($password)){
                $_SESSION['loged'] = true;
                $_SESSION['id'] = $infor['id'];
                die(header('Location: /admin.php'));
            }
            else die(header('Location: /login.php'));
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
        Username:
        <br>
        <input type="text" name="username" placeholder="username">
        <br>
        Password:
        <br>
        <input type="text" name="password" placeholder="*******">
        <br>
        <br>
        <button type="submit" name="action" value="login">Login</button> &emsp;
        <button type="submit" name="action" value="register"> Register </button>
    </form>
</body>
</html>