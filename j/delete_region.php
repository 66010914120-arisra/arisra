<?php
include_once("connectdb.php");

if (isset($_GET['id'])) {

    $id = intval($_GET['id']);

    // เช็คก่อนว่ามีจังหวัดใช้ภาคนี้อยู่ไหม
    $check = mysqli_query($conn, "SELECT * FROM provinces WHERE r_id = $id");

    if (mysqli_num_rows($check) > 0) {

        echo "<script>
                alert('ลบไม่ได้ มีจังหวัดใช้ภาคนี้อยู่');
                window.location='a.php';
              </script>";

    } else {

        mysqli_query($conn, "DELETE FROM regions WHERE r_id = $id");

        echo "<script>
                alert('ลบสำเร็จ');
                window.location='a.php';
              </script>";
    }
}
?>
