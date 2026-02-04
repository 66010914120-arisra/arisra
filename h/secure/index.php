<?php
session_start();
?>
<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>Login |อริศรา พวงมาลัย(กุ๊ก)</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    min-height:100vh;
    background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
}
.login-card{
    max-width:420px;
    border-radius:18px;
}
.form-control{border-radius:12px;}
.btn-login{border-radius:12px;}
</style>
</head>

<body class="d-flex justify-content-center align-items-center">

<div class="card shadow-lg login-card w-100">
<div class="card-body p-4">

<div class="text-center mb-4">
    <h3>🔐 ระบบหลังบ้านร้านหมูกะทะ</h3>
    <p class="text-muted mb-0">อริศรา พวงมาลัย (กุ๊ก)</p>
</div>

<form method="post">
    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="auser" class="form-control" required autofocus>
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="apwd" class="form-control" required>
    </div>

    <button type="submit" name="Submit" class="btn btn-dark w-100 btn-login">
        เข้าสู่ระบบ
    </button>
</form>

</div>
</div>

<?php
if(isset($_POST['Submit'])){
    include_once("connectdb.php");

    $sql = "SELECT * FROM admin WHERE a_username = ?";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"s",$_POST['auser']);
    mysqli_stmt_execute($stmt);
    $rs = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($rs) == 1){
        $data = mysqli_fetch_assoc($rs);

        if(password_verify($_POST['apwd'],$data['a_password'])){
            $_SESSION['aid']   = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            header("location:index2.php");
            exit;
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
