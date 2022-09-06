<?php
include "../include/connect.php";
session_start();

$author = $_GET['author'];
// $text = base64_encode($_GET['text']);
$time = $_GET['time'];
$username = $_SESSION['username'];
$conn = connect();

if ($username == $author || $username == "admin") {
    // $sql = "delete from message where username='$author' and text='$text'";
    $sql = "delete from message where username='$author' and time='$time'";
    if ($result = mysqli_query($conn, $sql)) {
        echo "<script>alert('删除成功！');window.location.href='../message/message.php'</script>";
    } else {
        echo "<script>alert('删除失败！');history.go(-1);</script>";
    }
} else {
    echo "<script>alert('您没有权限删除该留言！');history.go(-1);</script>";
}