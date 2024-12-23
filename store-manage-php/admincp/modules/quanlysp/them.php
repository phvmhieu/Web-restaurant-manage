<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <!-- Thêm link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Thêm sản phẩm</h2>

        <!-- Form thêm sản phẩm -->
        <form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="tensanpham" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="tensanpham" name="tensanpham">
            </div>

            <div class="mb-3">
                <label for="masp" class="form-label">Mã sản phẩm</label>
                <input type="text" class="form-control" id="masp" name="masp">
            </div>

            <div class="mb-3">
                <label for="giasp" class="form-label">Giá sản phẩm</label>
                <input type="text" class="form-control" id="giasp" name="giasp">
            </div>

            <div class="mb-3">
                <label for="soluong" class="form-label">Số lượng</label>
                <input type="text" class="form-control" id="soluong" name="soluong">
            </div>

            <div class="mb-3">
                <label for="hinhanh" class="form-label">Hình ảnh sản phẩm</label>
                <input type="file" class="form-control" id="hinhanh" name="hinhanh">
            </div>

            <div class="mb-3">
                <label for="tomtat" class="form-label">Tóm tắt</label>
                <textarea class="form-control" id="tomtat" rows="4" name="tomtat"></textarea>
            </div>

            <div class="mb-3">
                <label for="noidung" class="form-label">Nội dung</label>
                <textarea class="form-control" id="noidung" rows="4" name="noidung"></textarea>
            </div>

            <div class="mb-3">
                <label for="danhmuc" class="form-label">Danh mục sản phẩm</label>
                <select name="danhmuc" class="form-select" id="danhmuc">
                    <?php
                    $sql_danhmuc = "SELECT * FROM tbl_category ORDER BY id";
                    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                    ?>
                        <option value="<?php echo $row_danhmuc['id'] ?>"><?php echo $row_danhmuc['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="tinhtrang" class="form-label">Tình trạng</label>
                <select name="tinhtrang" class="form-select" id="tinhtrang">
                    <option value="1">Còn hàng</option>
                    <option value="0">Hết</option>
                </select>
            </div>

            <button type="submit" name="themsanpham" class="btn btn-primary">Thêm sản phẩm</button>
        </form>
    </div>

    <!-- Thêm link JS của Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
