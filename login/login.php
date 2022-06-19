<?php
$username = $_POST['username'];
$password = $_POST['password'];
if ($username == "" || $password == "") {
    echo "<script>alert('用户名或密码不能为空！');history.go(-1);</script>";
    exit;
}
else
{
    //还没学sql所以先放在这吧
    //接下来应该去数据库匹配一下，然后实现登录成功的功能
    echo "<script>alert('登录成功！');window.location.href='../information/information.html'</script>";
}