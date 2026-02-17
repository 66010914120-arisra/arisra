<?php 
include_once("connectdb.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>ข้อมูลจังหวัด</title>
</head>
<body>

<h1>งาน i</h1>
<h2>ข้อมูลจังหวัด --- อริศรา พวงมาลัย (กุ๊ก)</h2>

<form method="post" enctype="multipart/form-data">
    ชื่อจังหวัด
    <input type="text" name="pname" required><br>

    ชื่อภาค
    <select name="rid" required>
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
/* =======================
   บันทึกข้อมูล + Upload
======================= */
if (isset($_POST['Submit'])) {

    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $rid   = $_POST['rid'];

    if ($_FILES['photo']['error'] == 0) {

        // ตรวจสอบชนิดไฟล์
        $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        $allow = array("jpg","jpeg","png","gif");

        if (!in_array($ext, $allow)) {
            die("อนุญาตเฉพาะไฟล์ jpg, jpeg, png, gif เท่านั้น");
        }

        // บันทึกข้อมูลก่อน
        $sql = "INSERT INTO provinces (p_name, p_ext, r_id)
                VALUES ('$pname','$ext','$rid')";
        mysqli_query($conn, $sql);

        $pid = mysqli_insert_id($conn);

        // ถ้าไม่มีโฟลเดอร์ img ให้สร้าง
        if (!is_dir("img")) {
            mkdir("img", 0777, true);
        }

        // ย้ายไฟล์
        move_uploaded_file(
            $_FILES['photo']['tmp_name'],
            "img/".$pid.".".$ext
        );

        echo "บันทึกข้อมูลเรียบร้อย ✅";
    } 
    else {
        echo "อัปโหลดรูปไม่ได้ Error Code: " . $_FILES['photo']['error'];
    }
}

/* =======================
   แสดงข้อมูล
======================= */
$sql = "SELECT p.*, r.r_name
        FROM provinces p
        INNER JOIN regions r ON p.r_id = r.r_id
        ORDER BY p.p_id ASC";

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
        <?php
        $img_path = "img/".$data['p_id'].".".$data['p_ext'];
        if (file_exists($img_path)) {
            echo '<img src="'.$img_path.'" width="120">';
        } else {
            echo "ไม่มีรูป";
        }
        ?>
    </td>
    <td><?php echo $data['r_name']; ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>
