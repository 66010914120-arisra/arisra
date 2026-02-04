<?php
include_once("check_login.php");
?>
<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>หน้าหลักแอดมิน | Dashboard</title>

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
    padding:12px 20px;
    display:block;
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
    border-radius:15px;
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
            <a href="index2.php" class="active">🏠 หน้าหลักแอดมิน</a>
            <a href="products.php">📦 จัดการสินค้า</a>
            <a href="orders.php">🧾 จัดการออเดอร์</a>
            <a href="customers.php">👥 จัดการลูกค้า</a>
            <a href="logout.php" class="text-danger">🚪 ออกจากระบบ</a>
        </div>

        <!-- Content -->
        <div class="col-12 col-md-9 col-lg-10 content">

            <h3 class="mb-4">Dashboard</h3>
            <p class="text-muted">
                ยินดีต้อนรับ, <strong><?php echo $_SESSION['aname']; ?></strong>
            </p>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h6 class="text-muted">สินค้า</h6>
                            <h3>📦</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h6 class="text-muted">ออเดอร์</h6>
                            <h3>🧾</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h6 class="text-muted">ลูกค้า</h6>
                            <h3>👥</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

</body>
</html>
