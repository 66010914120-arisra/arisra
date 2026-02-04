<?php
session_start();
?>
<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>Login | Admin Panel</title>

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    min-height:100vh;
    background: linear-gradient(135deg,#141e30,#243b55);
}
.login-card{
    max-width:420px;
    border-radius:18px;
}
.login-title{
    font-weight:700;
}
.form-control{
    border-radius:12px;
}
.btn-login{
    border-radius:12px;
}
.footer-text{
    font-size:0.85rem;
    opacity:0.7;
}
</style>
</head>

<body class="d-flex justify-content-center align-items-center">

<div class="card shadow-lg login-card w-100">
    <div class="card-body p-4">
        
        <div class="text-center mb-4">
            <h3 class="login-title">🔐 หลังบ้านผู้ดูแลระบบ</h3>
            <p class="text-muted mb-0">อริศรา พวงมาลัย (กุ๊ก)</p>
        </div>

        <form method="post" action="">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="auser" class="form-control" autofocus required placeholder="กรอกชื่อผู้ใช้">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="apwd" class="form-control" required placeholder="กรอกรหัสผ่าน">
            </div>

            <button type="submit" name="Submit" class="btn btn-dark w-100 btn-login">
                เข้าสู่ระบบ
            </button>
        </form>

        <div class="text-center mt-4 footer-text">
            © Admin System 2026
        </div>

    </div>
</div>

<?php
if(isset($_POST['Submit'])){
    include_once("connectdb.php");

    $sql = "SELECT * FROM admin WHERE a_username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $_POST['auser']);
    mysqli_stmt_execute($stmt);
    $rs = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($rs) == 1){
        $data = mysqli_fetch_array($rs);

        if(password_verify($_POST['apwd'], $data['a_password'])){
            $_SESSION['aid']   = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];

            echo "<script>window.location='index2.php';</script>";
        }else{
            echo "<script>alert('❌ รหัสผ่านไม่ถูกต้อง');</script>";
        }
    }else{
        echo "<script>alert('❌ ไม่พบชื่อผู้ใช้');</script>";
    }
}
?>

</body>
</html>
