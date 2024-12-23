<?php
$sql_product = "SELECT
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
$query_product = mysqli_query($mysqli, $sql_product);
?>


<h3 class="text-center my-4 fw-bold">Sản phẩm mới nhất</h3>

<div class="row product_list">
	<?php while ($row_product = mysqli_fetch_array($query_product)) { ?>
		<div class="col-md-4 col-lg-3 mb-4">
			<div class="card">
				<a class="nav-link" href="index.php?quanly=sanpham&id=<?php echo $row_product['product_id'] ?>">
					<img src="admincp/modules/quanlysp/uploads/<?php echo $row_product['photo'] ?>" class="card-img-top" alt="<?php echo $row_product['product_name']; ?>" style="height: 200px;">
					<div class="card-body">
						<p class="card-title title_product"><?php echo $row_product['product_name'] ?></p>
						<p class="card-text price_product">Giá:
							<?php echo number_format($row_product['price'], 0, ',', '.') . ' VND';
							?>
						</p>
					</div>
				</a>
			</div>
		</div>
	<?php } ?>
</div>