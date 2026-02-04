<?php
session_start();
?>
<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>Login | อริศรา พวงมาลัย(กุ๊ก)</title>

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{
    min-height:100vh;
    background: linear-gradient(135deg,#141e30,#243b55);
}
.login-card{
    max-width:420px;
    border-radius:20px;
    backdrop-filter: blur(10px);
}
.login-title{
    font-weight:700;
}
.form-control{
    border-radius:12px;
    padding-left:40px;
}
.input-icon{
    position:absolute;
    top:50%;
    left:15px;
    transform:translateY(-50%);
    color:#6c757d;
}
.toggle-password{
    position:absolute;
    top:50%;
    right:15px;
    transform:translateY(-50%);
    cursor:pointer;
}
.btn-login{
    border-radius:12px;
    font-weight:600;
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
            <h3 class="login-title">🔐 Admin Panel</h3>
            <p class="text-muted mb-0">อริศรา พวงมาลัย (กุ๊ก)</p>
        </div>

        <form method="post" action="" id="loginForm">

            <!-- Username -->
            <div class="mb-3 position-relative">
                <i class="bi bi-person input-icon"></i>
                <input type="text" name="auser" class="form-control" autofocus required placeholder="Username">
            </div>

            <!-- Password -->
            <div class="mb-3 position-relative">
                <i class="bi bi-lock input-icon"></i>
                <input type="password" name="apwd" id="password" class="form-control" required placeholder="Password">
                <i class="bi bi-eye toggle-password" id="togglePassword"></i>
            </div>

            <!-- Button -->
            <button type="submit" name="Submit" class="btn btn-dark w-100 btn-login" id="loginBtn">
                <span id="btnText">เข้าสู่ระบบ</span>
                <span id="btnLoading" class="spinner-border spinner-border-sm d-none"></span>
            </button>

        </form>

        <div class="text-center mt-4 footer-text">
            © Admin System 2026
        </div>

    </div>
</div>

<script>
// show / hide password
document.getElementById('togglePassword').addEventListener('click', function () {
    const pwd = document.getElementById('password');
    this.classList.toggle('bi-eye-slash');
    pwd.type = pwd.type === 'password' ? 'text' : 'password';
});

// loading effect
document.getElementById('loginForm').addEventListener('submit', function(){
    document.getElementById('btnText').classList.add('d-none');
    document.getElementById('btnLoading').classList.remove('d-none');
});
</script>

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
