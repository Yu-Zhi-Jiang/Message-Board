<?php
session_start();
$username = $_POST['username'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
if ($username == "" || $password1 == "") {
    echo "<script>alert('用户名或密码不能为空！');history.go(-1);</script>";
    exit;
}
elseif ($password2 != $password1) {
    echo "<script>alert('两次密码不一致！');history.go(-1);</script>";
    exit;
}
else
{
    //还没学sql所以先放在这吧
    //接下来应该去数据库寻找一下是否有用户名冲突，如果有就不能注册
    echo "<script>alert('注册成功！');window.location.href='../login/login.html'</script>";
}