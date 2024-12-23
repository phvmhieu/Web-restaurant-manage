<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: white; /* Thay nền thành màu trắng */
        }

        .header {
            background-color: #FAF8F4; /* Thay đổi màu nền của header thành trắng */
            color: #333; /* Màu chữ đen nhẹ */
            padding: 10px 0;
        }

        .logo img {
            max-height: 80px;
        }

        .info-text {
            font-size: 1.2rem;
        }

        .highlight {
            color: #89B550; /* Màu xanh lá cho 'Queen FT' */
            font-weight: bold;
        }

        h1 {
            color: #333; /* Màu chữ nhà hàng */
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-md-3 text-center logo">
                    <img class="lazy img-fluid"
                        src="images/capture_footer.png"
                        alt="QUEEN FT">
                </div>
                <!-- Nhà hàng tên -->
                <div class="col-md-3 text-center">
                    <h1 class="text-uppercase fw-normal">Nhà Hàng <span class="highlight">Queen FT</span></h1>
                </div>
                <!-- Thông tin liên hệ -->
                <div class="col-md-6 text-md-end">
                    <div class="info-text">
                        <span><i class="bi bi-telephone-fill"></i> Hotline: <span class="highlight">0707969743</span></span>
                        <br>
                        <span><i class="bi bi-clock-fill"></i> Giờ mở cửa: 6h30 - 22h: hàng ngày</span>
                        <br>
                        <span>Địa chỉ: 96A Đ. Trần Phú, P. Mộ Lao, Hà Đông, Hà Nội</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
