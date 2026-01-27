<?php
include_once("connectdb.php");

if (isset($_POST['jobPosition'])) {

    $job_position     = $_POST['jobPosition'];
    $prefix           = $_POST['prefix'];
    $full_name        = $_POST['fullName'];
    $birth_date       = $_POST['birthDate'];
    $education_level  = $_POST['educationLevel'];
    $skills           = $_POST['skills'];
    $experience       = $_POST['experience'];
    $application_date = date("Y-m-d");

    $sql = "INSERT INTO applications
    (job_position, prefix, full_name, birth_date, education_level, skills, experience, application_date)
    VALUES
    ('$job_position','$prefix','$full_name','$birth_date','$education_level','$skills','$experience','$application_date')";

    mysqli_query($conn, $sql) or die("insert ไม่ได้");

    echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";
}
?>
<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ใบสมัครงาน | บริษัท PP (ปริมปริม) จำกัด</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    padding-top: 30px;
    background-color: #f4f7f6;
}
.application-form {
    background-color: #ffffff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
}
.form-heading {
    border-bottom: 2px solid #007bff;
    padding-bottom: 10px;
    margin-bottom: 30px;
    color: #007bff;
}
.accordion-item {
    margin-top: 15px;
}
</style>
</head>

<body>
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="application-form">

<h1 class="text-center form-heading">ใบสมัครงาน</h1>
<p class="text-center mb-4">บริษัท PP (ปริมปริม) จำกัด</p>

<form method="post" action="#">

<h5 class="mt-4 mb-3 text-secondary">1. ข้อมูลตำแหน่งงาน</h5>
<div class="mb-3">
<label class="form-label">ตำแหน่งที่ต้องการสมัคร <span class="text-danger">*</span></label>
<select class="form-select" name="jobPosition" required>
<option value="" disabled selected>--- เลือกตำแหน่งงานที่สนใจ ---</option>
<option value="Software_Engineer">วิศวกรซอฟต์แวร์</option>
<option value="Data_Analyst">นักวิเคราะห์ข้อมูล</option>
<option value="Marketing_Specialist">การตลาดดิจิทัล</option>
<option value="HR_Admin">บุคคลและธุรการ</option>
</select>
</div>

<h5 class="mt-5 mb-3 text-secondary">2. ข้อมูลส่วนตัว</h5>
<div class="row g-3">
<div class="col-md-3">
<label class="form-label">คำนำหน้าชื่อ</label>
<select class="form-select" name="prefix" required>
<option value="นาย">นาย</option>
<option value="นาง">นาง</option>
<option value="นางสาว">นางสาว</option>
</select>
</div>

<div class="col-md-9">
<label class="form-label">ชื่อ-นามสกุล</label>
<input type="text" class="form-control" name="fullName" required>
</div>

<div class="col-md-6">
<label class="form-label">วันเดือนปีเกิด</label>
<input type="date" class="form-control" name="birthDate" required>
</div>

<div class="col-md-6">
<label class="form-label">ระดับการศึกษาสูงสุด</label>
<select class="form-select" name="educationLevel" required>
<option value="" disabled selected>--- เลือกระดับการศึกษา ---</option>
<option value="ปวช">ปวช./ปวส.</option>
<option value="ปริญญาตรี">ปริญญาตรี</option>
<option value="ปริญญาโท">ปริญญาโท</option>
<option value="ปริญญาเอก">ปริญญาเอก</option>
</select>
</div>
</div>

<h5 class="mt-5 mb-3 text-secondary">3. ข้อมูลเพิ่มเติม (ไม่บังคับ)</h5>

<div class="accordion" id="accordionSections">

<div class="accordion-item">
<h2 class="accordion-header">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
🌟 ความสามารถพิเศษ/ทักษะอื่นๆ
</button>
</h2>
<div id="collapseOne" class="accordion-collapse collapse">
<div class="accordion-body">
<textarea class="form-control" name="skills" rows="3"></textarea>
</div>
</div>
</div>

<div class="accordion-item">
<h2 class="accordion-header">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
💼 ประสบการณ์ทำงาน
</button>
</h2>
<div id="collapseTwo" class="accordion-collapse collapse">
<div class="accordion-body">
<textarea class="form-control" name="experience" rows="5"></textarea>
</div>
</div>
</div>

</div>

<div class="d-grid gap-2 mt-5">
<button type="submit" class="btn btn-primary btn-lg">ส่งใบสมัคร</button>
<button type="reset" class="btn btn-outline-secondary">ล้างข้อมูลในฟอร์ม</button>
</div>

</form>
</div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
