<!DOCTYPE html>
<html lang="">
<body>

<h1>用户数据</h1>

<?php
$conn = mysqli_connect('localhost:3306', 'root', '59951308', 'userdata');
mysqli_query($conn, "set names utf8");
$sql = 'select * from userinfo;';
mysqli_select_db($conn, 'userdata');
$retval = mysqli_query($conn, $sql);
echo '<table border="1"><tr><td>用户名</td><td>邮箱</td><td>密码</td><td>偏好</td></tr>';
while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
    echo "<tr><td> {$row['UserName']}</td> " .
        "<td>{$row['UserEmail']} </td> " .
        "<td>{$row['UserPwd']} </td> " .
        "<td>{$row['UserPreferences']} </td> " .
        "</tr>";
}
?>
</body>
</html>