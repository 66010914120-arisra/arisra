<?php
include_once("check_login.php");
?>
<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>จัดการสินค้า | อริศรา พวงมาลัย (กุ๊ก)</title>

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
:root{
    --main:#6366f1;
    --dark:#0f172a;
    --soft:#f1f5f9;
}
body{
    background:var(--soft);
    font-family: 'Segoe UI', system-ui, -apple-system;
}

/* Sidebar */
.sidebar{
    min-height:100vh;
    background:var(--dark);
    padding-top:20px;
}
.sidebar h4{
    color:#fff;
    text-align:center;
    font-weight:600;
    margin-bottom:30px;
}
.sidebar a{
    color:#94a3b8;
    text-decoration:none;
    padding:14px 22px;
    display:flex;
    align-items:center;
    gap:12px;
    transition:.25s;
}
.sidebar a:hover{
    background:#1e293b;
    color:#fff;
}
.sidebar .active{
    background:var(--main);
    color:#fff;
    border-radius:12px;
    margin:0 12px;
}

/* Content */
.content{
    padding:40px;
}
.card{
    border-radius:20px;
    border:none;
}
.table th{
    font-weight:600;
    color:#334155;
}
.table td{
    color:#475569;
    vertical-align:middle;
}

/* Buttons */
.btn-main{
    background:var(--main);
    color:#fff;
    border:none;
}
.btn-main:hover{
    background:#4f46e5;
}

/* Modal */
.modal-content{
    border-radius:20px;
    border:none;
}
</style>
</head>

<body>

<div class="container-fluid">
<div class="row">

<!-- Sidebar -->
<div class="col-12 col-md-3 col-lg-2 sidebar">
    <h4>⚡ระบบของ อริศรา</h4>

    <a href="index2.php">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>
    <a href="products.php" class="active">
        <i class="bi bi-box-seam"></i> สินค้า
    </a>
    <a href="orders.php">
        <i class="bi bi-receipt"></i> ออเดอร์
    </a>
    <a href="customers.php">
        <i class="bi bi-people"></i> ลูกค้า
    </a>
    <a href="logout.php" class="text-danger">
        <i class="bi bi-box-arrow-right"></i> ออกจากระบบ
    </a>
</div>

<!-- Content -->
<div class="col-12 col-md-9 col-lg-10 content">

<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-1">จัดการสินค้า</h3>
        <p class="text-muted mb-0">Product Management</p>
    </div>
    <span class="badge bg-white text-dark shadow-sm px-3 py-2">
        👩‍💼 <?php echo $_SESSION['aname']; ?>
    </span>
</div>

<!-- Card -->
<div class="card shadow-sm">
<div class="card-body">

<div class="d-flex justify-content-between mb-3">
    <h5 class="fw-semibold mb-0">รายการสินค้า</h5>
    <button class="btn btn-main" onclick="openAdd()">
        <i class="bi bi-plus-lg"></i> เพิ่มสินค้า
    </button>
</div>

<table class="table table-hover">
<thead>
<tr>
    <th>#</th>
    <th>สินค้า</th>
    <th>ราคา</th>
    <th>คงเหลือ</th>
    <th class="text-end">จัดการ</th>
</tr>
</thead>
<tbody>

<tr>
    <td>1</td>
    <td>ชุดหมูกะทะ XL</td>
    <td>399 ฿</td>
    <td>30</td>
    <td class="text-end">
        <button class="btn btn-sm btn-outline-primary"
            onclick="openEdit('ชุดหมูกะทะ XL','399','30')">
            <i class="bi bi-pencil"></i>
        </button>
        <button class="btn btn-sm btn-outline-danger"
            onclick="confirmDelete()">
            <i class="bi bi-trash"></i>
        </button>
    </td>
</tr>

<tr>
    <td>2</td>
    <td>ชุดหมูกะทะ Jumbo</td>
    <td>599 ฿</td>
    <td>15</td>
    <td class="text-end">
        <button class="btn btn-sm btn-outline-primary"
            onclick="openEdit('ชุดหมูกะทะ Jumbo','599','15')">
            <i class="bi bi-pencil"></i>
        </button>
        <button class="btn btn-sm btn-outline-danger"
            onclick="confirmDelete()">
            <i class="bi bi-trash"></i>
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

<!-- Modal -->
<div class="modal fade" id="productModal">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="modalTitle">เพิ่มสินค้า</h5>
    <button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
    <div class="mb-3">
        <label class="form-label">ชื่อสินค้า</label>
        <input type="text" id="pname" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">ราคา</label>
        <input type="number" id="pprice" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">คงเหลือ</label>
        <input type="number" id="pstock" class="form-control">
    </div>
</div>

<div class="modal-footer">
    <button class="btn btn-light" data-bs-dismiss="modal">ยกเลิก</button>
    <button class="btn btn-main">บันทึก</button>
</div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
const modal = new bootstrap.Modal(document.getElementById('productModal'));

function openAdd(){
    modalTitle.innerText = 'เพิ่มสินค้า';
    pname.value = '';
    pprice.value = '';
    pstock.value = '';
    modal.show();
}

function openEdit(n,p,s){
    modalTitle.innerText = 'แก้ไขสินค้า';
    pname.value = n;
    pprice.value = p;
    pstock.value = s;
    modal.show();
}

function confirmDelete(){
    if(confirm("ลบสินค้านี้ออกจากระบบ?")){
        alert("ลบแล้ว (ตัวอย่าง UX)");
    }
}
</script>

</body>
</html>
