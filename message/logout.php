<?php
    session_start();
    unset($_SESSION['username']);
    echo "<script>alert('退出登录成功！');window.location.href='../login/login.html'</script>";
