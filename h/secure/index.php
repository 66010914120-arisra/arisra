<?php
session_start();
$error = "";
?>
<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>Login | อริศรา พวงมาลัย(กุ๊ก)</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
:root{
    --main:#0d6efd;
}
body{
    min-height:100vh;
    background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
    font-family: 'Segoe UI', system-ui;
}
.login-card{
    max-width:420px;
    border-radius:20px;
    border:none;
}
.form-control{
    border-radius:14px;
}
.btn-login{
    border-radius:14px;
    padding:12px;
}
.toggle-pass{
    cursor:pointer;
}
</style>
</head>

<body class="d-flex justify-content-center align-items-center">

<div class="card shadow-lg login-card w-100">
<div class="card-body p-4">

<div class="text-center mb-4">
    <h3 class="fw-bold">🔐 ระบบหลังบ้านร้านหมูกะทะ</h3>
    <p class="text-muted mb-0">อริศรา พวงมาลัย (กุ๊ก)</p>
</div>

<?php if($error!=""){ ?>
<div class="alert alert-danger text-center py-2">
    <?php echo $error; ?>
</div>
<?php } ?>

<form method="post">

    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="auser" class="form-control" required autofocus placeholder="ชื่อผู้ใช้">
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <div class="input-group">
            <input type="password" name="apwd" id="pwd" class="form-control" required placeholder="รหัสผ่าน">
            <span class="input-group-text toggle-pass" onclick="togglePwd()">👁</span>
        </div>
    </div>

    <button type="submit" name="Submit" class="btn btn-dark w-100 btn-login">
        เข้าสู่ระบบ
    </button>

</form>

<div class="text-center mt-3 text-muted" style="font-size:13px;">
    © Admin System 2026
</div>

</div>
</div>

<script>
function togglePwd(){
    let p = document.getElementById("pwd");
    p.type = (p.type === "password") ? "text" : "password";
}
</script>

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
            $error = "❌ รหัสผ่านไม่ถูกต้อง";
        }
    }else{
        $error = "❌ ไม่พบชื่อผู้ใช้";
    }
}
?>

</body>
</html>
