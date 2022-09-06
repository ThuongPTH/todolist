<?php
$conn = mysqli_connect('127.0.0.1', 'root','', 'webb' );
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
//     }
// echo 'Connected successfully';
mysqli_set_charset($conn, "utf8");
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $action = $_POST["action"];
    if($action === 'register')
        header("Location: /register.php");
    else header("Location: /login.php");
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
<!-- <div class="container">
		<div class="row">
			<a href="index.php?page=register" class="btn btn-success">'Đăng ký thành viên'</a>
		</div>
		<div class="row">
		//	<?php
		//	if(isset($_GET["page"]) && $_GET["page"] == "register")
		//		include "register.php";
		//   ?>
		</div>
	</div> -->
<form action="" method="POST">
    <button type="submit" name="action" value="register">  Register  </button>
    <button type="submit" name="action" value="login">  Login  </button>
</form>
</body>
</html>

