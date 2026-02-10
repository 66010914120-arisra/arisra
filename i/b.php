<?php include_once("connectdb.php"); ?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>ข้อมูลจังหวัด</title>
</head>
<body>

<h1>งาน i</h1>
<h2>ข้อมูลจังหวัด --- อริศรา พวงมาลัย (กุ๊ก)</h2>

<form method="post">
    ชื่อจังหวัด
    <input type="text" name="pname" required><br>

    ชื่อภาค
    <select name="rid">
        <?php
        $sql3 = "SELECT * FROM regions ORDER BY r_name ASC";
        $rs3  = mysqli_query($conn, $sql3);
        while ($r = mysqli_fetch_assoc($rs3)) {
        ?>
            <option value="<?php echo $r['r_id']; ?>">
                <?php echo $r['r_name']; ?>
            </option>
        <?php } ?>
    </select><br><br>

    <button type="submit" name="Submit">บันทึก</button>
</form>

<br><br>

<?php
/* ===== บันทึกข้อมูล ===== */
if (isset($_POST['Submit'])) {
    $pname = $_POST['pname'];
    $rid   = $_POST['rid'];

    // กำหนดนามสกุลเป็น jpg
    $sql = "INSERT INTO provinces (p_name, p_ext, r_id)
            VALUES ('$pname','jpg','$rid')";
    mysqli_query($conn, $sql);
}

/* ===== แสดงข้อมูล ===== */
$sql = "SELECT p.*, r.r_name
        FROM provinces p
        INNER JOIN regions r ON p.r_id = r.r_id";
$rs = mysqli_query($conn, $sql);
?>

<table border="1" cellpadding="5">
<tr>
    <th>รหัส</th>
    <th>ชื่อจังหวัด</th>
    <th>รูปภาพ</th>
    <th>ภาค</th>
</tr>

<?php while ($data = mysqli_fetch_assoc($rs)) { ?>
<tr>
    <td><?php echo $data['p_id']; ?></td>
    <td><?php echo $data['p_name']; ?></td>
<td>
    <img src="img/<?php echo $data['p_id']; ?>.jpg" width="120">
</td>

    <td><?php echo $data['r_name']; ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>
