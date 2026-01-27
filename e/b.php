<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ฟอร์มสมัครงาน - อริศรา พวงมาลัย(กุ๊ก)</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
  body{background:#f5f6fa}
  .box{
    background:#fff; padding:30px; border-radius:12px;
    box-shadow:0 4px 10px rgba(0,0,0,.1); margin-top:30px;
  }
</style>
</head>

<body>
<div class="container">
  <h1 class="text-center mt-4">ฟอร์มสมัครงาน</h1>
  <p class="text-center text-secondary mb-0">อริศรา พวงมาลัย(กุ๊ก)</p>

  <div class="col-md-6 mx-auto box">

    <form method="post" action="">
      <div class="mb-3">
        <label class="form-label">ชื่อ-สกุล</label>
        <input type="text" name="name" class="form-control" required autofocus>
      </div>

      <div class="mb-3">
        <label class="form-label">เบอร์โทร</label>
        <input type="text" name="phone" class="form-control" required pattern="^[0-9]{9,10}$" placeholder="เช่น 089xxxxxxx">
      </div>

      <div class="mb-3">
        <label class="form-label">อีเมล</label>
        <input type="email" name="email" class="form-control" required placeholder="เช่น you@email.com">
      </div>

      <div class="mb-3">
        <label class="form-label">ตำแหน่งที่สมัคร</label>
        <select name="position" class="form-select" required>
          <option value="">-- เลือกตำแหน่ง --</option>
          <option value="พนักงานหน้าร้าน">พนักงานหน้าร้าน</option>
          <option value="แอดมินเพจ">แอดมินเพจ</option>
          <option value="พนักงานทั่วไป">พนักงานทั่วไป</option>
          <option value="อื่นๆ">อื่นๆ</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">หมายเหตุ (ถ้ามี)</label>
        <textarea name="note" class="form-control" rows="3" placeholder="เช่น ว่างงานช่วงเสาร์-อาทิตย์"></textarea>
      </div>

      <div class="d-grid gap-2">
        <button type="submit" name="Submit" class="btn btn-primary">ส่งใบสมัคร</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
        <button type="button" class="btn btn-warning" onclick="window.print();">พิมพ์</button>
      </div>
    </form>

  </div>

  <div class="mt-4">
    <?php
    if(isset($_POST['Submit'])){
      $name     = trim($_POST['name'] ?? '');
      $phone    = trim($_POST['phone'] ?? '');
      $email    = trim($_POST['email'] ?? '');
      $position = trim($_POST['position'] ?? '');
      $note     = trim($_POST['note'] ?? '');

      include_once("connectdb.php");

      $sql  = "INSERT INTO job_apply (j_name, j_phone, j_email, j_position, j_note)
               VALUES (?, ?, ?, ?, ?)";
      $stmt = mysqli_prepare($conn, $sql) or die("เตรียมคำสั่งไม่ได้: ".mysqli_error($conn));

      mysqli_stmt_bind_param($stmt, "sssss", $name, $phone, $email, $position, $note);

      if(mysqli_stmt_execute($stmt)){
        echo "<script>alert('สมัครงานสำเร็จ');</script>";

        // แสดงสรุปแบบสั้นๆ
        $sn = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $sp = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
        $se = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $sj = htmlspecialchars($position, ENT_QUOTES, 'UTF-8');

        echo "<div class='col-md-6 mx-auto alert alert-success'>
                <strong>ส่งใบสมัครเรียบร้อย ✅</strong>
                ชื่อ-สกุล: {$sn}<br>
                เบอร์โทร: {$sp}<br>
                อีเมล: {$se}<br>
                ตำแหน่ง: {$sj}<br>
              </div>";
      }else{
        echo "<div class='col-md-6 mx-auto alert alert-danger'>
                บันทึกไม่สำเร็จ: ".htmlspecialchars(mysqli_error($conn), ENT_QUOTES, 'UTF-8')."
              </div>";
      }

      mysqli_stmt_close($stmt);
      mysqli_close($conn);
    }
    ?>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
