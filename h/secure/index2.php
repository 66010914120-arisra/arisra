<?php
include_once("check_login.php");
?>
<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>Dashboard | อริศรา พวงมาลัย(กุ๊ก)</title>

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{
    background:#f4f6f9;
    font-family: 'Segoe UI', sans-serif;
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
    transition:0.2s;
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
    transition:0.3s;
}
.card:hover{
    transform: translateY(-6px);
}
.stat-icon{
    font-size:2.5rem;
    opacity:0.9;
}
.bg-soft-primary{background:#e7f1ff;}
.bg-soft-success{background:#eafaf1;}
.bg-soft-warning{background:#fff6e5;}
.header-box{
    background:#fff;
    border-radius:18px;
    padding:20px;
}
</style>
</head>

<body>

<div class="container-fluid">
<div class="row">

<!-- Sidebar -->
<div class="col-12 col-md-3 col-lg-2 sidebar p-0">
    <h5 class="text-white text-center py-3 mb-0">
        🛠 Admin Panel
    </h5>
    <a href="index2.php" class="active">🏠 Dashboard</a>
    <a href="products.php">📦 จัดการสินค้า</a>
    <a href="orders.php">🧾 จัดการออเดอร์</a>
    <a href="customers.php">👥 จัดการลูกค้า</a>
    <a href="logout.php" class="text-danger">🚪 ออกจากระบบ</a>
</div>

<!-- Content -->
<div class="col-12 col-md-9 col-lg-10 content">

    <!-- Header -->
    <div class="header-box shadow-sm mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="mb-1">สวัสดี 👋 <?php echo $_SESSION['aname']; ?></h4>
            <span class="text-muted">ยินดีต้อนรับสู่ระบบจัดการหลังบ้าน</span>
        </div>
        <div class="text-muted">
            <i class="bi bi-clock"></i> <span id="time"></span>
        </div>
    </div>

    <!-- Stats -->
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow-sm bg-soft-primary">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">สินค้า</h6>
                        <h3 class="fw-bold">12</h3>
                    </div>
                    <i class="bi bi-box-seam stat-icon text-primary"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm bg-soft-warning">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">ออเดอร์</h6>
                        <h3 class="fw-bold">8</h3>
                    </div>
                    <i class="bi bi-receipt stat-icon text-warning"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm bg-soft-success">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">ลูกค้า</h6>
                        <h3 class="fw-bold">25</h3>
                    </div>
                    <i class="bi bi-people stat-icon text-success"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- Info box -->
    <div class="card shadow-sm mt-4">
        <div class="card-body">
            <h5>📌 ระบบหลังบ้าน</h5>
            <p class="text-muted mb-0">
                ใช้สำหรับจัดการสินค้า ออเดอร์ และข้อมูลลูกค้า  
                รองรับการพัฒนาเพิ่มในอนาคต เช่น รายงานยอดขาย และสิทธิ์ผู้ใช้
            </p>
        </div>
    </div>

</div>
</div>
</div>

<script>
// realtime clock
function updateTime(){
    const now = new Date();
    document.getElementById("time").innerHTML =
        now.toLocaleDateString('th-TH') + " " +
        now.toLocaleTimeString('th-TH');
}
setInterval(updateTime,1000);
updateTime();
</script>

</body>
</html>
