<?php
include_once("check_login.php");
?>
<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>อริศรา พวงมาลัย(กุ๊ก) | Admin Dashboard</title>

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
:root{
    --main:#0d6efd;
    --dark:#1f2937;
    --soft:#f4f6f9;
}
body{
    background:var(--soft);
    font-family: 'Segoe UI', system-ui, -apple-system;
}
.sidebar{
    min-height:100vh;
    background:var(--dark);
}
.sidebar h4{
    font-weight:700;
}
.sidebar a{
    color:#9ca3af;
    text-decoration:none;
    padding:14px 22px;
    display:flex;
    align-items:center;
    gap:10px;
    font-size:15px;
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
.card-hover{
    transition:.25s;
    cursor:pointer;
}
.card-hover:hover{
    transform:translateY(-6px);
    box-shadow:0 15px 30px rgba(0,0,0,.1);
}
.icon{
    font-size:42px;
}
.user-box{
    background:#fff;
    border-radius:20px;
    padding:24px;
}
.badge-admin{
    background:#e0e7ff;
    color:#3730a3;
}
</style>
</head>

<body>

<div class="container-fluid">
<div class="row">

<!-- Sidebar -->
<div class="col-12 col-md-3 col-lg-2 sidebar p-0">
    <h4 class="text-white text-center py-4 mb-0">
        🛠 ระบบของ อริศรา
    </h4>

    <a href="index2.php" class="active">🏠 Dashboard</a>
    <a href="products.php">📦 สินค้า</a>
    <a href="orders.php">🧾 ออเดอร์</a>
    <a href="customers.php">👥 ลูกค้า</a>
    <a href="logout.php" class="text-danger">🚪 ออกจากระบบ</a>
</div>

<!-- Content -->
<div class="col-12 col-md-9 col-lg-10 content">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">Dashboard</h3>
            <p class="text-muted mb-0">
                ยินดีต้อนรับ <strong><?php echo $_SESSION['aname']; ?></strong>
            </p>
        </div>
        <span class="badge badge-admin px-3 py-2">
            แอดมินระบบ
        </span>
    </div>

    <!-- Action Cards -->
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <a href="products.php" class="text-decoration-none text-dark">
                <div class="card card-hover">
                    <div class="card-body text-center p-4">
                        <div class="icon mb-2">📦</div>
                        <h5>จัดการสินค้า</h5>
                        <p class="text-muted mb-0">เพิ่ม / แก้ไข / ลบสินค้า</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="orders.php" class="text-decoration-none text-dark">
                <div class="card card-hover">
                    <div class="card-body text-center p-4">
                        <div class="icon mb-2">🧾</div>
                        <h5>จัดการออเดอร์</h5>
                        <p class="text-muted mb-0">ตรวจสอบคำสั่งซื้อ</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="customers.php" class="text-decoration-none text-dark">
                <div class="card card-hover">
                    <div class="card-body text-center p-4">
                        <div class="icon mb-2">👥</div>
                        <h5>จัดการลูกค้า</h5>
                        <p class="text-muted mb-0">ข้อมูลผู้ใช้งาน</p>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <!-- User Info -->
    <div class="user-box shadow-sm">
        <h5 class="mb-3">👩‍💻 ข้อมูลผู้ดูแลระบบ</h5>
        <p class="mb-1"><strong>ชื่อ:</strong> อริศรา พวงมาลัย (กุ๊ก)</p>
        <p class="mb-0"><strong>สถานะ:</strong> ผู้ดูแลระบบหลัก</p>
    </div>

</div>
</div>
</div>

</body>
</html>
