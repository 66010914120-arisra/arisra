<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pop Supermarket - Management</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { 
            font-family: 'Kanit', sans-serif; 
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 40px 0;
        }
        .main-card {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 30px;
        }
        .page-title {
            color: #2d3436;
            font-weight: 500;
            border-left: 5px solid #0984e3;
            padding-left: 15px;
            margin-bottom: 30px;
        }
        .table {
            border-radius: 12px;
            overflow: hidden;
        }
        thead th {
            background-color: #0984e3 !important;
            color: white !important;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: none;
        }
        .product-img {
            width: 45px;
            height: 45px;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .product-img:hover {
            transform: scale(1.5);
        }
        .amount-text {
            font-weight: 500;
            color: #2d3436;
        }
        .badge-category {
            padding: 8px 12px;
            border-radius: 8px;
            font-weight: 300;
            background: #e1f5fe;
            color: #01579b;
        }
        /* ปรับแต่ง DataTables Search Box */
        .dataTables_filter input {
            border-radius: 20px;
            padding: 8px 20px;
            border: 1px solid #dfe6e9;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="main-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="page-title">
                <i class="fa-solid fa-cart-shopping text-primary me-2"></i>
                สุพัตรา หาญกุดเลาะ (ปริม)
            </h2>
            <span class="text-muted">ระบบจัดการสต็อกสินค้า v2.0</span>
        </div>
        
        <div class="table-responsive">
            <table id="supermarketTable" class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th width="10%">ID</th>
                        <th>สินค้า</th>
                        <th>หมวดหมู่</th>
                        <th>วันที่สั่งซื้อ</th>
                        <th>ประเทศ</th>
                        <th class="text-end">จำนวนเงิน (฿)</th>
                        <th class="text-center">ตัวอย่าง</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include_once("connectdb.php");
                        $sql = "SELECT * FROM `popsupermarket` ";
                        $rs = mysqli_query($conn, $sql);
                        $total = 0;
                        while ($data = mysqli_fetch_array($rs)){
                            $total += $data['p_amount'];
                    ?>
                    <tr>
                        <td><span class="text-muted">#<?php echo $data['p_order_id'];?></span></td>
                        <td><strong><?php echo $data['p_product_name'];?></strong></td>
                        <td><span class="badge-category"><?php echo $data['p_category'];?></span></td>
                        <td><i class="fa-regular fa-calendar-days me-1 text-muted"></i> <?php echo date('d M Y', strtotime($data['p_date']));?></td>
                        <td><i class="fa-solid fa-location-dot me-1 text-danger"></i> <?php echo $data['p_country'];?></td>
                        <td class="text-end amount-text"><?php echo number_format($data['p_amount'], 2);?></td>
                        <td class="text-center">
                            <img src="img/<?php echo $data['p_product_name'];?>.jfif" 
                                 class="product-img"
                                 onerror="this.src='https://via.placeholder.com/100?text=Product'">
                        </td>
                    </tr>  
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr class="table-light">
                        <td colspan="5" class="text-end fw-bold">ยอดรวมยอดขายทั้งหมด:</td>
                        <td class="text-end text-primary fw-bold h5"><?php echo number_format($total, 2);?></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#supermarketTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/th.json"
            },
            "pageLength": 8,
            "order": [[ 0, "desc" ]],
            "drawCallback": function() {
                $('.dataTables_paginate > .pagination').addClass('pagination-sm');
            }
        });
    });
</script>

</body>
</html>