<div class="container mt-5">
  <h2 class="text-center mb-4">Liệt kê danh mục sản phẩm</h2>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Giá sản phẩm</th>
        <th>Số lượng</th>
        <th>Danh mục</th>
        <th>Mã sản phẩm</th>
        <th>Tóm tắt</th>
        <th>Tình trạng</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql_lietke_sp = "SELECT 
                tbl_product.id AS product_id, 
                tbl_product.name AS product_name, 
                tbl_product.photo, 
                tbl_product.price, 
                tbl_product.quantity, 
                tbl_category.name AS category_name, 
                tbl_product.code, 
                tbl_product.summary, 
                tbl_product.status 
            FROM tbl_product 
            JOIN tbl_category ON tbl_product.id_category = tbl_category.id 
            ORDER BY tbl_product.id DESC";
      $query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);

      $i = 0;
      while ($row = mysqli_fetch_array($query_lietke_sp)) {
        $i++;
      ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $row['product_name'] ?></td>
          <td><img src="modules/quanlysp/uploads/<?php echo $row['photo'] ?>" width="150px" class="img-fluid"></td>
          <td><?php echo number_format($row['price'], 0, ',', '.') ?> VND</td>
          <td><?php echo $row['quantity'] ?></td>
          <td><?php echo $row['category_name'] ?></td>
          <td><?php echo $row['code'] ?></td>
          <td><?php echo $row['summary'] ?></td>
          <td>
            <?php if ($row['status'] == 1) {
              echo 'Còn hàng';
            } else {
              echo 'Hết hàng';
            }
            ?>
          </td>
          <td>
            <a href="modules/quanlysp/xuly.php?id=<?php echo $row['product_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xóa</a>
            <a href="?action=quanlysp&query=sua&id=<?php echo $row['product_id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>

<!-- Thêm link JS của Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>