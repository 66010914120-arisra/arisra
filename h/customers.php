<?php
include_once("check_login.php");
?>
<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>จัดการลูกค้า | Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f1f3f6;
    font-family: "Segoe UI", sans-serif;
}
.sidebar{
    min-height:100vh;
    background:linear-gradient(180deg,#1f2933,#111827);
}
.sidebar h5{
    font-weight:600;
}
.sidebar a{
    color:#cbd5e1;
    padding:14px 20px;
    display:block;
    transition:.2s;
}
.sidebar a:hover{
    background:#374151;
    color:#fff;
}
.sidebar .active{
    background:#2563eb;
    color:#fff;
}
.content{
    padding:35px;
}
.card{
    border-radius:18px;
}
.table thead{
    background:#111827;
    color:#fff;
}
.btn{
    border-radius:20px;
}
.badge-user{
    background:#e0e7ff;
    color:#3730a3;
    padding:6px 12px;
    border-radius:20px;
}
</style>
</head>

<body>

<div class="container-fluid">
<div class="row">

<!-- Sidebar -->
<div class="col-12 col-md-3 col-lg-2 sidebar p-0">
    <h5 class="text-white text-center py-4 mb-0">🛠 Admin Panel</h5>
    <a href="index2.php">🏠 หน้าหลัก</a>
    <a href="products.php">📦 สินค้า</a>
    <a href="orders.php">🧾 ออเดอร์</a>
    <a href="customers.php" class="active">👥 ลูกค้า</a>
    <a href="logout.php" class="text-danger">🚪 ออกจากระบบ</a>
</div>

<!-- Content -->
<div class="col-12 col-md-9 col-lg-10 content">

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold">จัดการลูกค้า</h3>
    <span class="badge-user">
        👤 <?php echo $_SESSION['aname']; ?>
    </span>
</div>

<div class="card shadow-sm">
<div class="card-body">

<table class="table table-hover align-middle">
<thead>
<tr>
    <th>#</th>
    <th>ชื่อลูกค้า</th>
    <th>Email</th>
    <th>เบอร์โทร</th>
    <th width="160">จัดการ</th>
</tr>
</thead>
<tbody>

<tr>
    <td>1</td>
    <td>สมชาย ใจดี</td>
    <td>somchai@email.com</td>
    <td>0812345678</td>
    <td>
        <button class="btn btn-sm btn-primary"
        onclick="viewCustomer('สมชาย ใจดี','somchai@email.com','0812345678')">
        👁 ดู
        </button>
        <button class="btn btn-sm btn-danger"
        onclick="deleteCustomer('สมชาย ใจดี')">
        🗑 ลบ
        </button>
    </td>
</tr>

<tr>
    <td>2</td>
    <td>สมหญิง รวยจริง</td>
    <td>somying@email.com</td>
    <td>0899999999</td>
    <td>
        <button class="btn btn-sm btn-primary"
        onclick="viewCustomer('สมหญิง รวยจริง','somying@email.com','0899999999')">
        👁 ดู
        </button>
        <button class="btn btn-sm btn-danger"
        onclick="deleteCustomer('สมหญิง รวยจริง')">
        🗑 ลบ
        </button>
    </td>
</tr>

</tbody>
</table>

</div>
</div>

</div>
</div>
</div>

<!-- Modal ดูข้อมูล -->
<div class="modal fade" id="viewModal" tabindex="-1">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content rounded-4">
<div class="modal-header">
<h5 class="modal-title">👤 ข้อมูลลูกค้า</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body">
<p><strong>ชื่อ:</strong> <span id="m_name"></span></p>
<p><strong>Email:</strong> <span id="m_email"></span></p>
<p><strong>เบอร์:</strong> <span id="m_phone"></span></p>
</div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
function viewCustomer(name,email,phone){
    document.getElementById("m_name").innerText = name;
    document.getElementById("m_email").innerText = email;
    document.getElementById("m_phone").innerText = phone;
    new bootstrap.Modal(document.getElementById("viewModal")).show();
}

function deleteCustomer(name){
    if(confirm("ต้องการลบลูกค้า "+name+" ใช่หรือไม่?")){
        alert("ลบข้อมูลเรียบร้อย (ตัวอย่าง)");
    }
}
</script>

</body>
</html>
