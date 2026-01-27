<?php
// ตรวจสอบว่ามีการกดปุ่ม Submit (ปุ่มส่งใบสมัคร) หรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ดึงค่าทั้งหมดจาก $_POST
    $jobPosition = isset($_POST['jobPosition']) ? htmlspecialchars($_POST['jobPosition']) : 'ไม่ระบุ';
    $prefix = isset($_POST['prefix']) ? htmlspecialchars($_POST['prefix']) : 'ไม่ระบุ';
    $fullName = isset($_POST['fullName']) ? htmlspecialchars($_POST['fullName']) : 'ไม่ระบุ';
    $birthDate = isset($_POST['birthDate']) ? htmlspecialchars($_POST['birthDate']) : 'ไม่ระบุ';
    $educationLevel = isset($_POST['educationLevel']) ? htmlspecialchars($_POST['educationLevel']) : 'ไม่ระบุ';
    $skills = isset($_POST['skills']) ? htmlspecialchars($_POST['skills']) : 'ไม่มี';
    $experience = isset($_POST['experience']) ? htmlspecialchars($_POST['experience']) : 'ไม่มี';

    // ฟังก์ชันช่วยจัดรูปแบบวันที่ให้อ่านง่ายขึ้น (เป็นภาษาไทย)
    function formatThaiDate($dateStr) {
        if ($dateStr === 'ไม่ระบุ') return $dateStr;
        
        $timestamp = strtotime($dateStr);
        $day = date('d', $timestamp);
        $month = date('m', $timestamp);
        $year = date('Y', $timestamp) + 543; // แปลงเป็นปี พ.ศ.

        $thai_months = array(
            '01' => 'มกราคม', '02' => 'กุมภาพันธ์', '03' => 'มีนาคม', '04' => 'เมษายน',
            '05' => 'พฤษภาคม', '06' => 'มิถุนายน', '07' => 'กรกฎาคม', '08' => 'สิงหาคม',
            '09' => 'กันยายน', '10' => 'ตุลาคม', '11' => 'พฤศจิกายน', '12' => 'ธันวาคม'
        );
        return $day . ' ' . $thai_months[$month] . ' ' . $year;
    }

    $formattedBirthDate = formatThaiDate($birthDate);
    
    // สร้างตารางเพื่อแสดงผลข้อมูลที่ได้รับ
    echo '<div class="mt-5 p-4 border border-success rounded-3 bg-light">';
    echo '<h3 class="text-success mb-3">✅ ข้อมูลการสมัครงานที่ได้รับ</h3>';
    
    echo '<table class="table table-striped table-hover">';
    
    // ส่วนที่ 1: ตำแหน่งงาน
    echo '<tr><td colspan="2" class="table-primary"><strong>ข้อมูลตำแหน่งงาน</strong></td></tr>';
    echo '<tr><td style="width: 35%;"><strong>ตำแหน่งที่สมัคร</strong></td><td>' . $jobPosition . '</td></tr>';
    
    // ส่วนที่ 2: ข้อมูลส่วนตัวและการศึกษา
    echo '<tr><td colspan="2" class="table-primary"><strong>ข้อมูลส่วนตัวและการศึกษา</strong></td></tr>';
    echo '<tr><td><strong>ชื่อ-นามสกุล</strong></td><td>' . $prefix . ' ' . $fullName . '</td></tr>';
    echo '<tr><td><strong>วันเดือนปีเกิด</strong></td><td>' . $formattedBirthDate . '</td></tr>';
    echo '<tr><td><strong>ระดับการศึกษา</strong></td><td>' . $educationLevel . '</td></tr>';

    // ส่วนที่ 3: ข้อมูลเพิ่มเติม
    echo '<tr><td colspan="2" class="table-primary"><strong>ข้อมูลเพิ่มเติม</strong></td></tr>';
    echo '<tr><td><strong>ความสามารถพิเศษ</strong></td><td><pre class="m-0">' . $skills . '</pre></td></tr>';
    echo '<tr><td><strong>ประสบการณ์ทำงาน</strong></td><td><pre class="m-0">' . $experience . '</pre></td></tr>';
    
    echo '</table>';
    
    echo '<p class="text-center mt-3 text-muted">บริษัทจะติดต่อกลับภายใน 3 วันทำการ</p>';
    echo '</div>';
}
?>

</div>
</div>
</div>