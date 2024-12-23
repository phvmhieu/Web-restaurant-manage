<?php
// Truy vấn lấy tên danh mục
$sql_category = "SELECT name FROM tbl_category WHERE id = '" . $_GET['id'] . "' LIMIT 1";
$query_category = mysqli_query($mysqli, $sql_category);
$row_category = mysqli_fetch_array($query_category);

// Truy vấn lấy sản phẩm thuộc danh mục
$sql_product = "SELECT * FROM tbl_product WHERE tbl_product.id_category = '$_GET[id]' ORDER BY tbl_product.id DESC";

$query_product = mysqli_query($mysqli, $sql_product);
?>

<h3 class="text-center my-4 fw-bold">Danh mục sản phẩm: <?php echo $row_category['name']; ?></h3>

<div class="row product_list">
	<?php
	// Hiển thị danh sách sản phẩm
	while ($row_product = mysqli_fetch_array($query_product)) { ?>
		<div class="col-lg-3 mb-4">
			<div class="card">
				<a class="nav-link" href="index.php?quanly=sanpham&id=<?php echo $row_product['id'] ?>">
					<img src="admincp/modules/quanlysp/uploads/<?php echo $row_product['photo'] ?>" class="card-img-top" alt="<?php echo $row_product['name']; ?>" style="height: 200px;">
					<div class="card-body">
						<p class="card-title title_product">
							<?php
							echo $row_product['name'];
							?>
						</p>
						<p class="card-text price_product">
							Giá:
							<?php echo number_format($row_product['price'], 0, ',', '.') . ' VND';
							?>
						</p>
					</div>
				</a>
			</div>
		</div>
	<?php } ?>
</div>