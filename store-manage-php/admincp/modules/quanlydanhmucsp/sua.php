<div class="container mt-5">
    <h2 class="text-center mb-4">Sửa danh mục sản phẩm</h2>

    <form method="POST" action="modules/quanlydanhmucsp/xuly.php?id=<?php echo $_GET['id'] ?>" class="table-responsive">
        <?php
        $sql_sua_danhmucsp = "SELECT * FROM tbl_category WHERE id='$_GET[id]' LIMIT 1";
        $query_sua_danhmucsp = mysqli_query($mysqli, $sql_sua_danhmucsp);
        while ($dong = mysqli_fetch_array($query_sua_danhmucsp)) {
        ?>
            <div class="mb-3">
                <label for="tendanhmuc" class="form-label">Tên danh mục</label>
                <input type="text" class="form-control" id="tendanhmuc" value="<?php echo $dong['name'] ?>" name="tendanhmuc" required>
            </div>
            <div class="mb-3">
                <label for="thutu" class="form-label">Thứ tự</label>
                <input type="text" class="form-control" id="thutu" value="<?php echo $dong['ordinal'] ?>" name="thutu" required>
            </div>
            <button type="submit" name="suadanhmuc" class="btn btn-primary">Sửa danh mục sản phẩm</button>
        <?php
        }
        ?>
    </form>
</div>

<!-- Thêm link JS của Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
