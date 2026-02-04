<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>อริศรา พวงมาลัย(กุ๊ก)</title>
</head>

<body>
<h1>a.php<h1>
<?php

    $_SESSION['name']="อริศรา พวงมาลัย";
    $_SESSION['nickname']="กุ๊ก";
    echo $_SESSION['name']."<br>"; 
    echo $_SESSION['nickname']."<br>";  
?>
</body>
</html>