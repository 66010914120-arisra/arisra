<?php
include_once("check_login.php");
?>
<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>จัดการออเดอร์ | Admin</title>

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{
    background:#f4f6f9;
}
.sidebar{
    min-height:100vh;
    background:#212529;
}
.sidebar a{
    color:#adb5bd;
    text-decoration:none;
    padding:14px 20px;
    display:block;
    transition:.2s;
}
.sidebar a:hover{
    background:#343a40;
    color:#fff;
}
.sidebar .active{
    background:#0d6efd;
    color:#fff;
}
.content{
    padding:30px;
}
.card{
    border-radius:18px;
}
.table td, .table th{
    vertical-align:middle;
}
.badge{
    font-size:0.85rem;
}
</style>
</head>

<body>

<div class="container-fluid">
<div class="row">

<!-- Sidebar -->
<div class="col-12 col-md-3 col-lg-2 sidebar p-0">
    <h5 class="text-white text-center py-3 mb-0">🛠 Admin Panel</h5>
    <a href="index2.php">🏠 Dashboard</a>
    <a href="products.php">📦 จัดการสินค้า</a>
    <a href="orders.php" class="active">🧾 จัดการออเดอร์</a>
    <a href="customers.php">👥 จัดการลูกค้า</a>
    <a href="logout.php" class="text-danger">🚪 ออกจากระบบ</a>
</div>

<!-- Content -->
<div class="col-12 col-md-9 col-lg-10 content">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>🧾 จัดการออเดอร์</h3>
        <span class="text-muted">
            ผู้ใช้งาน: <strong><?php echo $_SESSION['aname']; ?></strong>
        </span>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>ลูกค้า</th>
                        <th>วันที่</th>
                        <th>ยอดรวม</th>
                        <th>สถานะ</th>
                        <th width="180">จัดการ</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>สมชาย ใจดี</td>
                        <td>2026-02-03</td>
                        <td>2,500 บาท</td>
                        <td>
                            <select class="form-select form-select-sm">
                                <option selected>รอดำเนินการ</option>
                                <option>กำลังจัดส่ง</option>
                                <option>สำเร็จ</option>
                                <option>ยกเลิก</option>
                            </select>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-primary"
                                onclick="viewOrder('สมชาย ใจดี','2026-02-03','2,500 บาท')">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="confirmDelete()">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>สมหญิง รวยจริง</td>
                        <td>2026-02-02</td>
                        <td>5,900 บาท</td>
                        <td>
                            <span class="badge bg-success">สำเร็จ</span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-primary"
                                onclick="viewOrder('สมหญิง รวยจริง','2026-02-02','5,900 บาท')">
                                <i class="bi bi-eye"></i>
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

<!-- Modal ดูออเดอร์ -->
<div class="modal fade" id="orderModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">รายละเอียดออเดอร์</h5>
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
function viewOrder(cus,date,total){
    document.getElementById('mCustomer').innerText = cus;
    document.getElementById('mDate').innerText = date;
    document.getElementById('mTotal').innerText = total;
    new bootstrap.Modal(document.getElementById('orderModal')).show();
}

function confirmDelete(){
    if(confirm("⚠️ ต้องการลบออเดอร์นี้จริงหรือไม่?")){
        alert("ลบออเดอร์แล้ว (ตัวอย่าง)");
    }
}
</script>

</body>
</html>
