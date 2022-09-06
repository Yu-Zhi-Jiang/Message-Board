<?php
session_start();
include "../include/RemoveXSS.php";
include "../include/connect.php";
date_default_timezone_set('Asia/Shanghai');

$username = $_SESSION['username'];
if ($username == "") {
    echo "<script>alert('请先登录！');window.location.href='../login/login.html'</script>";
    exit;
} else {
    $text = base64_encode(RemoveXSS($_POST['text']));
    $time = date("Y-m-d H:i:s");
    $conn = connect();

    $sql = "insert into message (username, text, time) values ('$username', '$text', '$time')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('提交成功！');window.location.href='message.php';</script>";
    } else {
        echo "<script>alert('提交失败！');history.go(-1);</script>";
    }
}
