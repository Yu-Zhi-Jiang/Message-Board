<?php
session_start();
include "../include/conn.php";

$username = $_POST['username'];
$_SESSION['username'] = $username;
$password = $_POST['password'];

if ($username == "" || $password == "") {
    echo "<script>alert('用户名或密码不能为空！');history.go(-1);</script>";
    exit;
} elseif (preg_match("/[^0-9a-zA-Z_]/", $username) || preg_match("/[^0-9a-zA-Z]/", $password)) {
    echo "<script>alert('用户名或密码不符合格式！');history.go(-1);</script>";
    exit;
} else {
    $conn = conn();
    $sql = "select * from user where username='$username' and password='$password'";
    if ($result = mysqli_query($conn, $sql)) {
        $row = mysqli_fetch_row($result);
        if ($row) {
            echo "<script>alert('登录成功！');window.location.href='../message/message.php'</script>";
        } else {
            echo "<script>alert('用户名或密码错误！');history.go(-1);</script>";
        }
    } else {
        echo "<script>alert('登录失败！');history.go(-1);</script>";
    }
}
