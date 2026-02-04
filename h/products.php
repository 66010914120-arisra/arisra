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
            <a href="index2.php">🏠 หน้าหลักแอดมิน</a>
            <a href="products.php" class="active">📦 จัดการสินค้า</a>
            <a href="orders.php">🧾 จัดการออเดอร์</a>
            <a href="customers.php">👥 จัดการลูกค้า</a>
            <a href="logout.php" class="text-danger">🚪 ออกจากระบบ</a>
        </div>

        <!-- Content -->
        <div class="col-12 col-md-9 col-lg-10 content">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3>จัดการสินค้า</h3>
                <span class="text-muted">
                    ผู้ใช้งาน: <strong><?php echo $_SESSION['aname']; ?></strong>
                </span>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">

                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-success">
                            ➕ เพิ่มสินค้า
                        </button>
                    </div>

                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>ชื่อสินค้า</th>
                                <th>ราคา</th>
                                <th>คงเหลือ</th>
                                <th width="180">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ตัวอย่างข้อมูล -->
                            <tr>
                                <td>1</td>
                                <td>เสื้อยืดคอกลม</td>
                                <td>350 บาท</td>
                                <td>25</td>
                                <td>
                                    <button class="btn btn-sm btn-warning">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>กางเกงยีนส์</td>
                                <td>990 บาท</td>
                                <td>10</td>
                                <td>
                                    <button class="btn btn-sm btn-warning">แก้ไข</button>
                                    <button class="btn btn-sm btn-danger">ลบ</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>

    </div>
</div>

</body>
</html>
