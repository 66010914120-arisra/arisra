<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>ข้อมูลจังหวัด</title>

<style>
body{
    font-family: Tahoma, sans-serif;
}

table{
    border-collapse: collapse;
    width: 90%;
    margin: auto;
}

th, td{
    border: 1px solid #000;
    padding: 6px;
    text-align: center;
    vertical-align: middle;
}

th{
    background: #f2f2f2;
}

td.name{
    text-align: left;
    padding-left: 10px;
}

img{
    width: 120px;   
    height: auto;
}
</style>
</head>

<body>

<h2>ข้อมูลจังหวัด --- อริศรา พวงมาลัย (กุ๊ก)</h2>

<table>
<tr>
    <th>รหัส</th>
    <th>ชื่อจังหวัด</th>
    <th>รูปภาพ</th>
    <th>ภาค</th>
</tr>

<?php
include_once("connectdb.php");

$sql = "SELECT p.p_id, p.p_name, p.p_ext, r.r_name
        FROM provinces p
        INNER JOIN regions r
        ON p.r_id = r.r_id
        ORDER BY p.p_id ASC";

$rs = mysqli_query($conn, $sql);

while($data = mysqli_fetch_array($rs)){
?>
<tr>
    <td><?php echo $data['p_id']; ?></td>
    <td class="name"><?php echo $data['p_name']; ?></td>
    <td>
        <img src="images/<?php echo $data['p_id']; ?>.<?php echo $data['p_ext']; ?>">
    </td>
    <td><?php echo $data['r_name']; ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>
