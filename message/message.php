<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>留言板</title>
</head>

<body>
    <h1>留言板</h1>
    <table>
        <tr>
            <td>用户名</td>
            <td>留言</td>
            <td>时间</td>
        </tr>
        <?php
        include "../include/conn.php";
        
        $conn = conn();
        $sql = "select username,text,time from message";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $author = $row['username'];
            $text = base64_decode($row['text']);
            $time = $row['time'];
            echo "<tr>";
            echo "<td>$author</td>";
            echo "<td>$text</td>";
            echo "<td>$time</td>";
            // echo "<td><a href='delete.php?author=$author&text=$text'>删除</a></td>";
            echo "<td><a href='delete.php?author=$author&time=$time'>删除</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <a href="add.html">写留言</a>
    <p><form action="logout.php"><input type="submit" value="退出登录"></form></p>
</body>

</html>