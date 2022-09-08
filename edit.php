<?php
session_start();
include 'connect.php';
include 'function.php';
if (!isset($_SESSION['loged']) || $_SESSION['loged'] !== true) {
    die(header('location: login.php'));
}
$stt = $_GET['id'];
$id = (int)$_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $row = get_task_by_stt($stt, $conn);
    if ($row['id'] !== $id) {
        die('khong có quyền');
    }
    $task = $row['task'];
} else {
    if (isset($_POST['submit'])) {
        $update_task = $_POST['mission'];
        if ($update_task === '') {
            die('Không được để trống task');
        }
        if (edit_list($update_task, $stt, $conn)) {
            header('location: admin.php');
        }
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
    <div>
        <h2>Edit task</h2>
        <form action="" method="post">
            <textarea name="mission" id="" cols="30" rows="10"><?php echo $task; ?></textarea>
            <button name="submit" type="submit">Edit</button>
        </form>
    </div>
</body>

</html>