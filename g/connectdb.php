<?php
$host = "localhost";
$user = "root";
$pwd  = "Pw_660109140636769";
$db   = "4120db";

$conn = mysqli_connect($host, $user, $pwd, $db)
        or die("เชื่อมต่อฐานข้อมูลไม่ได้");

mysqli_set_charset($conn, "utf8");
?>
