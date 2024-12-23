<div class="container mt-5">
    <h2 class="text-center mb-4">Liệt kê danh mục sản phẩm</h2>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Quản lý</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_lietke_danhmucsp = "SELECT * FROM tbl_category ORDER BY ordinal DESC";
            $query_lietke_danhmucsp = mysqli_query($mysqli, $sql_lietke_danhmucsp);
            $i = 0;
            while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td>
                        <a href="modules/quanlydanhmucsp/xuly.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm">Xóa</a>
                        <a href="?action=quanlydanhmucsanpham&query=sua&id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>