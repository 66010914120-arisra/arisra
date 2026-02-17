<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>อริศรา พวงมาลัย (กุ๊ก)</title>
</head>
<body>

<h1>ข้อมูลภาค -- อริศรา พวงมาลัย (กุ๊ก)</h1>

<form method="post" action="">
    ชื่อภาค 
    <input type="text" name="rname" autofocus required>
    <button type="submit" name="Submit">บันทึก</button>
</form>

<br><br>

<?php
include_once("connectdb.php");

/* บันทึกข้อมูล */
if (isset($_POST['Submit'])) {
    $rname = $_POST['rname'];
    $sql2 = "INSERT INTO regions VALUES (NULL, '$rname')";
    mysqli_query($conn, $sql2) or die("insert ไม่ได้");
}

/* ดึงข้อมูลมาแสดง */
$sql = "SELECT * FROM regions";
$rs  = mysqli_query($conn, $sql);
?>

<table border="1" cellpadding="5">
    <tr>
        <th>รหัสภาค</th>
        <th>ชื่อภาค</th>
        <th>ลบ</th>
    </tr>

    <?php while ($data = mysqli_fetch_array($rs)) { ?>
    <tr>
        <td><?php echo $data['r_id']; ?></td>
        <td><?php echo $data['r_name']; ?></td>
        <td width="50" align="center">
  <a href="delete_region.php?id=<?php echo $data['r_id']; ?>" 
     onclick="return confirm('ยืนยันการลบ?');">
     <img src="img/3.jpg" width="20">
  </a>
</td>

    </tr>
    <?php } ?>
</table>

</body>
</html>
