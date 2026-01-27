<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Premium Dashboard - Pop Supermarket</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --glass-bg: rgba(255, 255, 255, 0.9);
        }
        
        body { 
            font-family: 'Kanit', sans-serif; 
            background: #f0f2f5;
            background-image: radial-gradient(#d1d9e6 1px, transparent 1px);
            background-size: 20px 20px;
            padding: 40px 0;
            color: #2d3436;
        }

        .dashboard-container {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            border: 1px solid rgba(255,255,255,0.3);
            box-shadow: 0 20px 50px rgba(0,0,0,0.1);
            padding: 40px;
            overflow: hidden;
        }

        .section-title {
            font-weight: 600;
            letter-spacing: 1px;
            color: #4834d4;
            border-bottom: 2px solid #efefef;
            padding-bottom: 10px;
            margin-bottom: 25px;
        }

        /* ตารางสไตล์มินิมอล */
        .custom-table {
            border-radius: 15px;
            overflow: hidden;
            border: none;
        }
        .custom-table thead {
            background: var(--primary-gradient);
            color: white;
        }
        .custom-table th { padding: 15px; font-weight: 400; border: none; }
        .custom-table td { padding: 15px; background: white; border-bottom: 1px solid #f8f9fa; }
        
        .amount-highlight {
            font-weight: 600;
            color: #e84393;
            font-size: 1.2rem;
        }

        /* ตกแต่ง Card กราฟ */
        .chart-card {
            background: white;
            border-radius: 20px;
            padding: 20px;
            transition: transform 0.3s ease;
            box-shadow: 0 10px 20px rgba(0,0,0,0.03);
            height: 100%;
        }
        .chart-card:hover { transform: translateY(-5px); }
    </style>
</head>

<body>

<div class="container">
    <div class="dashboard-container">
        <div class="row mb-5">
            <div class="col-md-8">
                <h1 class="display-5 fw-bold" style="color: #2d3436;">Market Analysis</h1>
                <p class="text-muted"><i class="fa-solid fa-user-circle me-2"></i>ผู้ดูแลระบบ: สุพัตรา หาญกุดเลาะ (ปริม)</p>
            </div>
            <div class="col-md-4 text-md-end">
                <div class="badge bg-primary p-3 rounded-4 shadow-sm">
                    <i class="fa-solid fa-calendar me-2"></i> ข้อมูลอัปเดตวันนี้
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5 mb-4">
                <h4 class="section-title"><i class="fa-solid fa-table me-2"></i>ยอดรวมรายประเทศ</h4>
                <div class="table-responsive">
                    <table class="table custom-table">
                        <thead>
                            <tr>
                                <th>ประเทศ</th>
                                <th class="text-end">ยอดรวมสุทธิ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include_once("connectdb.php");
                                $sql = "SELECT p_country, SUM(p_amount) AS total FROM `popsupermarket` GROUP BY p_country ORDER BY total DESC;";
                                $rs = mysqli_query($conn, $sql);
                                $countries = []; $totals = [];
                                while ($data = mysqli_fetch_array($rs)){
                                    $countries[] = $data['p_country'];
                                    $totals[] = $data['total'];
                            ?>
                            <tr>
                                <td><i class="fa-solid fa-earth-asia me-2 text-primary"></i><?php echo $data['p_country'];?></td>
                                <td class="text-end amount-highlight">฿<?php echo number_format($data['total'], 0);?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-7">
                <h4 class="section-title"><i class="fa-solid fa-chart-pie me-2"></i>การแสดงผลเชิงภาพ</h4>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="chart-card">
                            <canvas id="barChart" height="150"></canvas>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="chart-card text-center">
                            <h6 class="text-muted mb-3">สัดส่วนยอดขายรวม</h6>
                            <div style="max-width: 300px; margin: 0 auto;">
                                <canvas id="pieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctxBar = document.getElementById('barChart').getContext('2d');
    const ctxPie = document.getElementById('pieChart').getContext('2d');

    // สร้าง Gradient สำหรับกราฟแท่ง
    const gradient = ctxBar.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, '#6c5ce7');
    gradient.addColorStop(1, '#a29bfe');

    const labelData = <?php echo json_encode($countries); ?>;
    const valueData = <?php echo json_encode($totals); ?>;

    // Bar Chart
    new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: labelData,
            datasets: [{
                label: 'ยอดขายรวม (฿)',
                data: valueData,
                backgroundColor: gradient,
                borderRadius: 10,
                hoverBackgroundColor: '#4834d4'
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { display: false } },
                x: { grid: { display: false } }
            }
        }
    });

    // Pie Chart
    new Chart(ctxPie, {
        type: 'doughnut', // ใช้ Doughnut จะดูทันสมัยกว่า Pie ปกติ
        data: {
            labels: labelData,
            datasets: [{
                data: valueData,
                backgroundColor: ['#fd79a8', '#fab1a0', '#00cec9', '#0984e3', '#6c5ce7'],
                borderWidth: 5,
                borderColor: '#ffffff'
            }]
        },
        options: {
            cutout: '70%', // ทำให้ตรงกลางกลวงเป็นวงแหวน
            plugins: {
                legend: { position: 'bottom', labels: { usePointStyle: true, padding: 20 } }
            }
        }
    });
</script>

</body>
</html>