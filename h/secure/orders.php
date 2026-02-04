<?php
include_once("check_login.php");
?>
<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>จัดการออเดอร์ | อริศรา พวงมาลัย(กุ๊ก)</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
:root{
    --dark:#1f2937;
    --main:#0d6efd;
}
body{
    background:#f4f6f9;
    font-family:'Segoe UI',system-ui;
}
.sidebar{
    min-height:100vh;
    background:var(--dark);
}
.sidebar a{
    color:#9ca3af;
    text-decoration:none;
    padding:14px 22px;
    display:flex;
    align-items:center;
    gap:10px;
}
.sidebar a:hover{
    background:#374151;
    color:#fff;
}
.sidebar .active{
    background:var(--main);
    color:#fff;
}
.content{
    padding:32px;
}
.card{
    border-radius:20px;
    border:none;
}
.table th{
    font-weight:600;
}
.badge{
    font-size:.8rem;
}
.action-btn{
    width:36px;
    height:36px;
    border-radius:10px;
}
</style>
</head>

<body>

<div class="container-fluid">
<div class="row">

<!-- Sidebar -->
<div class="col-12 col-md-3 col-lg-2 sidebar p-0">
    <h5 class="text-white text-center py-4 mb-0">🛠 ระบบของ อริศรา</h5>
    <a href="index2.php">🏠 Dashboard</a>
    <a href="products.php">📦 สินค้า</a>
    <a href="orders.php" class="active">🧾 ออเดอร์</a>
    <a href="customers.php">👥 ลูกค้า</a>
    <a href="logout.php" class="text-danger">🚪 ออกจากระบบ</a>
</div>

<!-- Content -->
<div class="col-12 col-md-9 col-lg-10 content">

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="mb-1">🧾 จัดการออเดอร์</h3>
        <p class="text-muted mb-0">ดูและจัดการคำสั่งซื้อทั้งหมด</p>
    </div>
    <span class="text-muted">
        ผู้ใช้งาน: <strong><?php echo $_SESSION['aname']; ?></strong>
    </span>
</div>

<div class="card shadow-sm">
<div class="card-body p-0">

<table class="table table-hover align-middle mb-0">
<thead class="table-dark">
<tr>
    <th>#</th>
    <th>ลูกค้า</th>
    <th>วันที่</th>
    <th>ยอดรวม</th>
    <th>สถานะ</th>
    <th class="text-center" width="140">จัดการ</th>
</tr>
</thead>

<tbody>
<tr>
    <td>1</td>
    <td>สมชาย ใจดี</td>
    <td>2026-02-03</td>
    <td class="fw-semibold">2,500 บาท</td>
    <td>
        <select class="form-select form-select-sm">
            <option selected>🕒 รอดำเนินการ</option>
            <option>🚚 กำลังจัดส่ง</option>
            <option>✅ สำเร็จ</option>
            <option>❌ ยกเลิก</option>
        </select>
    </td>
    <td class="text-center">
        <button class="btn btn-outline-primary action-btn"
            onclick="viewOrder('สมชาย ใจดี','2026-02-03','2,500 บาท')">
            <i class="bi bi-eye"></i>
        </button>
        <button class="btn btn-outline-danger action-btn"
            onclick="confirmDelete()">
            <i class="bi bi-trash"></i>
        </button>
    </td>
</tr>

<tr>
    <td>2</td>
    <td>สมหญิง รวยจริง</td>
    <td>2026-02-02</td>
    <td class="fw-semibold">5,900 บาท</td>
    <td>
        <span class="badge bg-success">✅ สำเร็จ</span>
    </td>
    <td class="text-center">
        <button class="btn btn-outline-primary action-btn"
            onclick="viewOrder('สมหญิง รวยจริง','2026-02-02','5,900 บาท')">
            <i class="bi bi-eye"></i>
        </button>
        <button class="btn btn-outline-danger action-btn"
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
<div class="modal fade" id="orderModal" tabindex="-1">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content rounded-4">
<div class="modal-header">
    <h5 class="modal-title">📄 รายละเอียดออเดอร์</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body">
    <p><strong>ลูกค้า:</strong> <span id="mCustomer"></span></p>
    <p><strong>วันที่:</strong> <span id="mDate"></span></p>
    <p><strong>ยอดรวม:</strong> <span id="mTotal"></span></p>
</div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
function viewOrder(cus,date,total){
    mCustomer.innerText = cus;
    mDate.innerText = date;
    mTotal.innerText = total;
    new bootstrap.Modal(orderModal).show();
}

function confirmDelete(){
    if(confirm("ต้องการลบออเดอร์นี้ใช่ไหม?")){
        alert("ลบออเดอร์แล้ว (ตัวอย่าง)");
    }
}
</script>

</body>
</html>
