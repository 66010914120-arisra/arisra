<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>สุพัตรา หาญกุดเลาะ(ปริม)</title>

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body{
        background:#f5f6fa;
    }
    .form-box{
        background:#fff;
        padding:30px;
        border-radius:12px;
        box-shadow:0 4px 10px rgba(0,0,0,0.1);
        margin-top:30px;
    }
</style>
</head>

<body>

<div class="container">
    <h1 class="text-center mt-4">ฟอร์มสมัครสมาชิก — สุพัตรา หาญกุดเลาะ (ปริม) -- ChatGPT</h1>

    <div class="col-md-6 mx-auto form-box">

        <form method="post" action="">

            <div class="mb-3">
                <label class="form-label">ชื่อ-สกุล</label>
                <input type="text" name="fullname" class="form-control" required autofocus>
            </div>

            <div class="mb-3">
                <label class="form-label">เบอร์โทร</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">ความสูง (ซม.)</label>
                <input type="number" name="height" class="form-control" step="5" min="100" max="220" required>
            </div>

            <div class="mb-3">
                <label class="form-label">สีที่ชอบ</label>
                <input type="color" name="color" class="form-control form-control-color">
            </div>

            <div class="mb-3">
                <label class="form-label">สาขาวิชา</label>
                <select name="major" class="form-select">
                    <option value="การบัญชี">การบัญชี</option>
                    <option value="การจัดการ">การจัดการ</option>
                    <option value="การตลาด">การตลาด</option>
                    <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                </select>
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
        if (isset($_POST['Submit'])){
            $fullname = $_POST['fullname'];
            $phone = $_POST['phone'];
            $height = $_POST['height'];
            $color = $_POST['color'];
            $major = $_POST['major'];

            echo "<div class='alert alert-success'>";
            echo "<strong>ผลลัพธ์การสมัครสมาชิก</strong><br>";
            echo "ชื่อ-สกุล : ".$fullname."<br>";
            echo "เบอร์โทร : ".$phone."<br>";
            echo "ความสูง : ".$height." ซม.<br>";
            echo "สีที่ชอบ : ".$color."<div style='width:40px;height:20px;background:{$color}'></div>";
            echo "สาขาวิชา : ".$major."<br>";
            echo "</div>";
        }
        ?>
    </div>

</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
