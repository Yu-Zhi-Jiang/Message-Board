<?php
//数据库链接及默认库切换
function conn() {
    $server = "localhost";
    $user = "root";
    $pwd = "";
    $conn = mysqli_connect($server, $user, $pwd);
    if ($conn->connect_error) {
        die("服务器连接失败: " . $conn->connect_error);
    }
    $dbname = "message_board";
    $db = mysqli_select_db($conn, $dbname);
    return $conn;
}