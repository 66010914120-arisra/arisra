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

<!-- 🔹 ต้องเพิ่ม enctype -->
<form method="post" enctype="multipart/form-data">
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
    </select><br>

    รูปภาพ
    <input type="file" name="photo" required><br><br>

    <button type="submit" name="Submit">บันทึก</button>
</form>

<br><br>

<?php
/* ===== บันทึกข้อมูล + upload รูป ===== */
if (isset($_POST['Submit'])) {
    $pname = $_POST['pname'];
    $rid   = $_POST['rid'];

    // ดึงนามสกุลไฟล์
    $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

    // บันทึกข้อมูล
    $sql = "INSERT INTO provinces (p_name, p_ext, r_id)
            VALUES ('$pname','$ext','$rid')";
    mysqli_query($conn, $sql);
    //กรณีบันทึกข้อมูลไม่ได
    //$sq2 = "INSERT INTO provinces VALUES (NULL,'{$pname}','{$ex}','{$rid}')";
    //mysqli_query($conn, $sq2); or die ("insert ไม่ได้");
    //$pic_id = mysqli_insert_id($conn);
    //copy($_FILES['pimage'],['name'],"images/")
    
    // เอา id ล่าสุดมาใช้ตั้งชื่อรูป
    $pid = mysqli_insert_id($conn);

    // ย้ายไฟล์รูป
    move_uploaded_file(
        $_FILES['photo']['tmp_name'],
        "img/".$pid.".".$ext
    );
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
        <img src="img/<?php echo $data['p_id']; ?>.<?php echo $data['p_ext']; ?>" width="120">
    </td>
    <td><?php echo $data['r_name']; ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>
