<div class="container mt-5">
    <h2 class="text-center">Thêm danh mục sản phẩm</h2>
    <form method="POST" action="modules/quanlydanhmucsp/xuly.php">
        <div class="mb-3">
            <label for="tendanhmuc" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="tendanhmuc" name="tendanhmuc" required>
        </div>

        <div class="mb-3">
            <label for="thutu" class="form-label">Thứ tự</label>
            <input type="text" class="form-control" id="thutu" name="thutu" required>
        </div>

        <div class="mb-3">
            <button type="submit" name="themdanhmuc" class="btn btn-primary w-100">Thêm danh mục sản phẩm</button>
        </div>
    </form>
</div>

<!-- Thêm link JS của Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
