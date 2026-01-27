<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>อริศรา พวงมาลัย(กุ๊ก)</title>

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
  body{
    min-height:100vh;
    background:
      radial-gradient(900px 500px at 10% 10%, rgba(13,110,253,.16), transparent 60%),
      radial-gradient(900px 500px at 90% 20%, rgba(32,201,151,.14), transparent 55%),
      linear-gradient(180deg,#f8fafc,#eef2ff);
    color:#0f172a;
  }
  .form-box{
    background:rgba(255,255,255,.95);
    padding:28px;
    border-radius:16px;
    border:1px solid rgba(15,23,42,.08);
    box-shadow:0 14px 34px rgba(15,23,42,.12);
    margin-top:26px;
  }
  h1{ font-weight:800; letter-spacing:-.4px; }
  .subtitle{ color:#64748b; margin-top:-.5rem; }
  .form-label{ font-weight:700; }
  .form-control,.form-select{
    border-radius:12px;
    border:1px solid rgba(15,23,42,.14);
    padding:.65rem .9rem;
  }
  .form-control:focus,.form-select:focus{
    border-color:rgba(13,110,253,.55);
    box-shadow:0 0 0 .25rem rgba(13,110,253,.12);
  }
  .form-control-color{ width:100%; height:44px; padding:.35rem; border-radius:12px; }
  .btn{ border-radius:12px; font-weight:700; padding:.7rem 1rem; }
  .btn-primary{
    border:none;
    background:linear-gradient(90deg,#0d6efd,#20c997);
    box-shadow:0 10px 18px rgba(13,110,253,.18);
  }
  .btn:hover{ transform:translateY(-1px); }
  .btn:active{ transform:translateY(0); }
  .result-card{
    background:rgba(255,255,255,.95);
    border:1px solid rgba(15,23,42,.08);
    border-radius:16px;
    box-shadow:0 12px 26px rgba(15,23,42,.10);
    padding:18px;
  }
  .swatch{
    width:42px;height:20px;border-radius:10px;
    border:1px solid rgba(15,23,42,.12);
    display:inline-block;vertical-align:middle;margin-left:.5rem;
  }
</style>
</head>

<body>
<div class="container">
  <div class="text-center mt-4">
    <h1 class="mb-1">ฟอร์มสมัครสมาชิก</h1>
    <div class="subtitle">อริศรา พวงมาลัย(กุ๊ก) — ChatGPT</div>
  </div>

  <div class="col-md-6 mx-auto form-box">
    <form method="post" action="" class="needs-validation" novalidate>

      <div class="mb-3">
        <label class="form-label">ชื่อ-สกุล</label>
        <input type="text" name="fullname" class="form-control" required autofocus>
        <div class="invalid-feedback">กรุณากรอกชื่อ-สกุล</div>
      </div>

      <div class="mb-3">
        <label class="form-label">เบอร์โทร</label>
        <input type="text" name="phone" class="form-control" required pattern="^[0-9]{9,10}$" placeholder="เช่น 089xxxxxxx">
        <div class="invalid-feedback">กรุณากรอกเบอร์โทรให้ถูกต้อง (9–10 หลัก)</div>
      </div>

      <div class="mb-3">
        <label class="form-label">ความสูง (ซม.)</label>
        <input type="number" name="height" class="form-control" step="1" min="100" max="220" required placeholder="เช่น 160">
        <div class="invalid-feedback">กรุณากรอกความสูงระหว่าง 100–220 ซม.</div>
      </div>

      <div class="mb-3">
        <label class="form-label">สีที่ชอบ</label>
        <input type="color" name="color" class="form-control form-control-color" value="#0d6efd">
      </div>

      <div class="mb-3">
        <label class="form-label">สาขาวิชา</label>
        <select name="major" class="form-select" required>
          <option value="">-- เลือกสาขา --</option>
          <option value="การบัญชี">การบัญชี</option>
          <option value="การจัดการ">การจัดการ</option>
          <option value="การตลาด">การตลาด</option>
          <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
        </select>
        <div class="invalid-feedback">กรุณาเลือกสาขาวิชา</div>
      </div>

      <div class="d-grid gap-2">
        <button type="submit" name="Submit" class="btn btn-primary">สมัครสมาชิก</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
        <button type="button" class="btn btn-info text-white" onclick="window.location='http://www.msu.ac.th';">Go to MSU</button>
        <button type="button" class="btn btn-warning" onclick="window.print();">พิมพ์</button>
      </div>

    </form>
  </div>

  <div class="mt-4">
    <?php
    if (isset($_POST['Submit'])) {

      $fullname = trim($_POST['fullname'] ?? '');
      $phone    = trim($_POST['phone'] ?? '');
      $height   = (int)($_POST['height'] ?? 0);
      $color    = trim($_POST['color'] ?? '');
      $major    = trim($_POST['major'] ?? '');

      if ($fullname=='' || $phone=='' || $height==0 || $major=='') {

        echo "<div class='col-md-6 mx-auto result-card border-start border-4 border-warning'>
                <div class='fw-bold mb-1'>กรอกข้อมูลไม่ครบ</div>
                <div class='text-secondary'>เช็คชื่อ เบอร์โทร ความสูง และสาขาอีกครั้งนะ</div>
              </div>";

      } else {

        include_once("connectdb.php");

        // ✅ ต้องตรงกับคอลัมน์ใน phpMyAdmin: r_height
        $sql  = "INSERT INTO register (r_name, r_phone, r_height, r_color, r_major) VALUES (?,?,?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);

        if(!$stmt){
          die("เตรียมคำสั่งไม่ได้: ".mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "ssiss", $fullname, $phone, $height, $color, $major);

        if(mysqli_stmt_execute($stmt)){

          // ✅ เด้งเตือนสำเร็จ
          echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";

          // ✅ โชว์ผลลัพธ์แบบปลอดภัย
          $safe_name  = htmlspecialchars($fullname, ENT_QUOTES, 'UTF-8');
          $safe_phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
          $safe_major = htmlspecialchars($major, ENT_QUOTES, 'UTF-8');
          $safe_color = htmlspecialchars($color, ENT_QUOTES, 'UTF-8');

          echo "<div class='col-md-6 mx-auto result-card border-start border-4 border-success'>
                  <div class='fw-bold mb-2'>บันทึกข้อมูลสำเร็จ ✅</div>
                  <div>ชื่อ-สกุล: <span class='fw-semibold'>{$safe_name}</span></div>
                  <div>เบอร์โทร: <span class='fw-semibold'>{$safe_phone}</span></div>
                  <div>ความสูง: <span class='fw-semibold'>{$height}</span> ซม.</div>
                  <div>สีที่ชอบ: <span class='fw-semibold'>{$safe_color}</span>
                    <span class='swatch' style='background:{$safe_color}'></span>
                  </div>
                  <div>สาขาวิชา: <span class='fw-semibold'>{$safe_major}</span></div>
                </div>";

        } else {

          echo "<div class='col-md-6 mx-auto result-card border-start border-4 border-danger'>
                  <div class='fw-bold mb-1'>บันทึกข้อมูลไม่สำเร็จ ❌</div>
                  <div class='text-secondary'>".htmlspecialchars(mysqli_error($conn), ENT_QUOTES, 'UTF-8')."</div>
                </div>";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
      }
    }
    ?>
  </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap validation -->
<script>
(()=>{const f=document.querySelectorAll('.needs-validation');
[...f].forEach(x=>x.addEventListener('submit',e=>{if(!x.checkValidity()){e.preventDefault();e.stopPropagation()}x.classList.add('was-validated')}))})();
</script>

</body>
</html>
