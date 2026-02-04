<?php
include_once("check_login.php");
?>
<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>จัดการสินค้า | Admin</title>

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{background:#f4f6f9;}
.sidebar{min-height:100vh;background:#212529;}
.sidebar a{
    color:#adb5bd;text-decoration:none;
    padding:14px 20px;display:block;transition:.2s;
}
.sidebar a:hover{background:#343a40;color:#fff;}
.sidebar .active{background:#0d6efd;color:#fff;}
.content{padding:30px;}
.card{border-radius:18px;}
.table th,.table td{vertical-align:middle;}
</style>
</head>

<body>
<div class="container-fluid">
<div class="row">

<!-- Sidebar -->
<div class="col-12 col-md-3 col-lg-2 sidebar p-0">
    <h5 class="text-white text-center py-3 mb-0">🛠 Admin Panel</h5>
    <a href="index2.php">🏠 Dashboard</a>
    <a href="products.php" class="active">📦 จัดการสินค้า</a>
    <a href="orders.php">🧾 จัดการออเดอร์</a>
    <a href="customers.php">👥 จัดการลูกค้า</a>
    <a href="logout.php" class="text-danger">🚪 ออกจากระบบ</a>
</div>

<!-- Content -->
<div class="col-12 col-md-9 col-lg-10 content">

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>📦 จัดการสินค้า</h3>
    <span class="text-muted">
        ผู้ใช้งาน: <strong><?php echo $_SESSION['aname']; ?></strong>
    </span>
</div>

<div class="card shadow-sm">
<div class="card-body">

<div class="d-flex justify-content-end mb-3">
    <button class="btn btn-success" onclick="openAdd()">
        <i class="bi bi-plus-circle"></i> เพิ่มสินค้า
    </button>
</div>

<table class="table table-hover align-middle">
<thead class="table-dark">
<tr>
    <th>#</th>
    <th>สินค้า</th>
    <th>ราคา</th>
    <th>คงเหลือ</th>
    <th width="180">จัดการ</th>
</tr>
</thead>
<tbody>

<tr>
    <td>1</td>
    <td>ชุดหมูกะทะ XL</td>
    <td>399 บาท</td>
    <td>30</td>
    <td>
        <button class="btn btn-sm btn-warning"
            onclick="openEdit('ชุดหมูกะทะ XL','399','30')">
            <i class="bi bi-pencil"></i>
        </button>
        <button class="btn btn-sm btn-danger" onclick="confirmDelete()">
            <i class="bi bi-trash"></i>
        </button>
    </td>
</tr>

<tr>
    <td>2</td>
    <td>ชุดหมูกะทะ Jumbo</td>
    <td>599 บาท</td>
    <td>15</td>
    <td>
        <button class="btn btn-sm btn-warning"
            onclick="openEdit('ชุดหมูกะทะ Jumbo','599','15')">
            <i class="bi bi-pencil"></i>
        </button>
        <button class="btn btn-sm btn-danger" onclick="confirmDelete()">
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

<!-- Modal เพิ่ม/แก้ไข -->
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
        <label class="form-label">จำนวนคงเหลือ</label>
        <input type="number" id="pstock" class="form-control">
    </div>
</div>

<div class="modal-footer">
    <button class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
    <button class="btn btn-primary">บันทึก</button>
</div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
let modal = new bootstrap.Modal(document.getElementById('productModal'));

function openAdd(){
    document.getElementById('modalTitle').innerText = 'เพิ่มสินค้า';
    pname.value = '';
    pprice.value = '';
    pstock.value = '';
    modal.show();
}

function openEdit(name,price,stock){
    document.getElementById('modalTitle').innerText = 'แก้ไขสินค้า';
    pname.value = name;
    pprice.value = price;
    pstock.value = stock;
    modal.show();
}

function confirmDelete(){
    if(confirm("⚠️ ต้องการลบสินค้านี้จริงหรือไม่?")){
        alert("ลบสินค้าแล้ว (ตัวอย่าง)");
    }
}
</script>

</body>
</html>
