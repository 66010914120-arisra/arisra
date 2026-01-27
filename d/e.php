<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ใบสมัครงาน | บริษัท PP (ปริมปริม)   จำกัด</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    body {
        padding-top: 30px;
        background-color: #f4f7f6; /* สีพื้นหลังอ่อนๆ */
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
                <p class="text-center mb-4">บริษัท PP (ปริมปริม)  จำกัด </p>

                <form method="post" action="#">
                    <h5 class="mt-4 mb-3 text-secondary">1. ข้อมูลตำแหน่งงาน</h5>
                    <div class="mb-3">
                        <label for="jobPosition" class="form-label">ตำแหน่งที่ต้องการสมัคร <span class="text-danger">*</span></label>
                        <select class="form-select" id="jobPosition" name="jobPosition" required>
                            <option value="" disabled selected>--- เลือกตำแหน่งงานที่สนใจ ---</option>
                            <option value="Software_Engineer">วิศวกรซอฟต์แวร์ (Software Engineer)</option>
                            <option value="Data_Analyst">นักวิเคราะห์ข้อมูล (Data Analyst)</option>
                            <option value="Marketing_Specialist">ผู้เชี่ยวชาญด้านการตลาดดิจิทัล</option>
                            <option value="HR_Admin">เจ้าหน้าที่ฝ่ายบุคคลและธุรการ</option>
                        </select>
                    </div>

                    <h5 class="mt-5 mb-3 text-secondary">2. ข้อมูลส่วนตัว</h5>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="prefix" class="form-label">คำนำหน้าชื่อ <span class="text-danger">*</span></label>
                            <select class="form-select" id="prefix" name="prefix" required>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        
                        <div class="col-md-9">
                            <label for="fullName" class="form-label">ชื่อ-นามสกุล <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="fullName" name="fullName" required placeholder="เช่น สมชาย ใจดี">
                        </div>

                        <div class="col-md-6">
                            <label for="birthDate" class="form-label">วันเดือนปีเกิด <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="birthDate" name="birthDate" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="educationLevel" class="form-label">ระดับการศึกษาสูงสุด <span class="text-danger">*</span></label>
                            <select class="form-select" id="educationLevel" name="educationLevel" required>
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
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    🌟 ความสามารถพิเศษ/ทักษะอื่นๆ
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionSections">
                                <div class="accordion-body">
                                    <div class="mb-3">
                                        <textarea class="form-control" id="skills" name="skills" rows="3" placeholder="เช่น ภาษาโปรแกรมที่เชี่ยวชาญ (Python, Java), ภาษาต่างประเทศ (TOEIC Score), ทักษะการออกแบบ ฯลฯ"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    💼 ประสบการณ์ทำงาน
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionSections">
                                <div class="accordion-body">
                                    <div class="mb-3">
                                        <textarea class="form-control" id="experience" name="experience" rows="5" placeholder="ระบุประสบการณ์ทำงานที่ผ่านมาอย่างย่อ (ชื่อบริษัท, ตำแหน่ง, ระยะเวลา, ขอบเขตงานโดยย่อ)"></textarea>
                                    </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>