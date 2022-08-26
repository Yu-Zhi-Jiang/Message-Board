<?php
include "../include/conn.php";

$username = $_POST['username'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

if ($username == "" || $password1 == "") {
    echo "<script>alert('用户名或密码不能为空！');history.go(-1);</script>";
    exit;
} elseif ($password2 != $password1) {
    echo "<script>alert('两次密码不一致！');history.go(-1);</script>";
    exit;
} elseif (preg_match("/[^0-9a-zA-Z_]/", $username) || preg_match("/[^0-9a-zA-Z]/", $password1) || strlen($username) > 20 || strlen($password1) > 20) {
    echo "<script>alert('用户名或密码不符合格式！');history.go(-1);</script>";
} else {
    $conn = conn();
    $sql = "select * from user where username='$username'";
    if ($result = mysqli_query($conn, $sql)) {
        $row = mysqli_fetch_row($result);
        if ($row) {
            echo "<script>alert('用户名已存在！');history.go(-1);</script>";
            exit;
        } else {
            $sql = "insert into user (username, password) values ('$username', '$password1')";
            if ($result = mysqli_query($conn, $sql)) {
                echo "<script>alert('注册成功！');window.location.href='../login/login.html'</script>";
            } else {
                echo "<script>alert('注册失败！');history.go(-1);</script>";
            }
        }
    } else {
        echo "<script>alert('注册失败！');history.go(-1);</script>";
    }
}
