<?php
$sql_sua_sp = "SELECT * FROM tbl_product WHERE id='$_GET[id]' LIMIT 1";
$query_sua_sp = mysqli_query($mysqli, $sql_sua_sp);
?>
<div class="container mt-5">
    <h2 class="text-center">Sửa sản phẩm</h2>
    <?php
    while ($row = mysqli_fetch_array($query_sua_sp)) {
    ?>
        <form method="POST" action="modules/quanlysp/xuly.php?id=<?php echo $row['id'] ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="tensanpham" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="tensanpham" name="tensanpham" value="<?php echo $row['name'] ?>">
            </div>

            <div class="mb-3">
                <label for="masp" class="form-label">Mã sản phẩm</label>
                <input type="text" class="form-control" id="masp" name="masp" value="<?php echo $row['code'] ?>">
            </div>

            <div class="mb-3">
                <label for="giasp" class="form-label">Giá sản phẩm</label>
                <input type="text" class="form-control" id="giasp" name="giasp" value="<?php echo $row['price'] ?>">
            </div>

            <div class="mb-3">
                <label for="soluong" class="form-label">Số lượng</label>
                <input type="text" class="form-control" id="soluong" name="soluong" value="<?php echo $row['quantity'] ?>">
            </div>

            <div class="mb-3">
                <label for="hinhanh" class="form-label">Hình ảnh sản phẩm</label>
                <input type="file" class="form-control" id="hinhanh" name="hinhanh">
                <img src="modules/quanlysp/uploads/<?php echo $row['photo'] ?>" class="mt-2" width="150px">
            </div>

            <div class="mb-3">
                <label for="tomtat" class="form-label">Tóm tắt</label>
                <textarea class="form-control" id="tomtat" rows="4" name="tomtat"><?php echo $row['name'] ?></textarea>
            </div>

            <div class="mb-3">
                <label for="noidung" class="form-label">Nội dung</label>
                <textarea class="form-control" id="noidung" rows="4" name="noidung"><?php echo $row['name'] ?></textarea>
            </div>

            <div class="mb-3">
                <label for="danhmuc" class="form-label">Danh mục sản phẩm</label>
                <select name="danhmuc" class="form-select" id="danhmuc">
                    <?php
                    $sql_danhmuc = "SELECT * FROM tbl_category ORDER BY id";
                    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                        if ($row_danhmuc["id"] == $row["id_category"]) { ?>
                            <option selected value="<?php echo $row_danhmuc['id'] ?>"><?php echo $row_danhmuc['name'] ?></option>
                        <?php
                        } else {
                        ?>
                            <option value="<?php echo $row_danhmuc['id'] ?>"><?php echo $row_danhmuc['name'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="tinhtrang" class="form-label">Tình trạng</label>
                <select name="tinhtrang" class="form-select" id="tinhtrang">
                    <?php
                    if ($row['status'] == '1') {
                    ?>
                        <option value="1" selected>Còn hàng</option>
                        <option value="0">Ẩn</option>
                    <?php
                    } else {
                    ?>
                        <option value="1">Còn hàng</option>
                        <option value="0" selected>Hết</option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" name="suasanpham" class="btn btn-success w-100">Sửa sản phẩm</button>
            </div>
        </form>
    <?php
    }
    ?>
</div>

<!-- Thêm link JS của Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
