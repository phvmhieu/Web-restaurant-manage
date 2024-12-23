<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý</title>
    <!-- Thêm link tới Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .admincp_list {
            list-style-type: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap; /* Đảm bảo các phần tử sẽ xuống dòng khi không đủ chỗ */
            gap: 10px; /* Khoảng cách giữa các phần tử */
            justify-content: center; /* Căn giữa các phần tử trong container */
        }

        .admincp_list li a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #000;
            background-color: #FFCC00;
            border-radius: 5px;
            transition: background-color 0.3s;
            flex: 1; /* Mỗi thẻ sẽ chiếm 1 không gian bằng nhau */
            text-align: center;
        }

        .admincp_list li a:hover {
            background-color: #e6b800; /* Màu tối hơn khi hover */
        }

        .admincp_list li a:active {
            background-color: #d9a100; /* Màu khi nhấn */
        }
    </style>
</head>

<body>

    <div class="container mt-4">
        <ul class="admincp_list">
            <li><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm</a></li>
            <li><a href="index.php?action=quanlysp&query=them">Quản lý sản phẩm</a></li>
        </ul>
    </div>

    <!-- Thêm link tới Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
