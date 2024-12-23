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
WHERE tbl_product.id = '$_GET[id]'";

$query_product = mysqli_query($mysqli, $sql_product);
?>

<div class="container mt-5">
    <h3 class="text-center mb-4">Chi tiết sản phẩm</h3>
    <?php
    while ($row_product = mysqli_fetch_array($query_product)) {
    ?>
        <div class="row">
            <!-- Hình ảnh sản phẩm -->
            <div class="col-md-3">
                <div class="card shadow">
                    <img src="admincp/modules/quanlysp/uploads/<?php echo $row_product['photo'] ?>" class="card-img-top" alt="Tên món">
                </div>
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="col-md-8">
                <form method="POST" action="pages/main/themgiohang.php?id=<?php echo $row_product['product_id'] ?>">
                    <div class="detail-product">
                        <h4 class="text-primary">Tên món: <?php echo $row_product['product_name'] ?></h4>
                        <p><strong>Giá:</strong> <span class="text-danger">
                                <?php echo number_format($row_product['price'], 0, ',', '.') . ' VND';
                                ?>
                            </span></p>
                        <p><strong>Số lượng còn lại:</strong> <span class="text-success"><?php echo $row_product['quantity'] ?></span></p>
                        <p><strong>Mã sản phẩm:</strong> <?php echo $row_product['code'] ?></p>
                        <p><strong>Tóm tắt:</strong> <?php echo $row_product['summary'] ?></p>
                        <a><strong>Tình trạng:</strong> <span class="text-success">
                                <?php
                                if ($row_product['quantity'] > 0) {
                                ?>
                                    Còn hàng
                                <?php
                                } else {
                                ?>
                                    Hết hàng
                                <?php
                                }
                                ?>
                            </span></a>

                        <div class="mt-4">
                            <!-- Button submit -->
                            <button type="submit" name="themgiohang" class="btn btn-primary btn-lg me-2" <?php echo $row_product['quantity'] <= 0 ? 'disabled' : ''; ?>>
                                Thêm vào giỏ hàng
                            </button>

                            <!-- Button quay lại -->
                            <button type="button" class="btn btn-outline-secondary btn-lg" onclick="history.back()">
                                Quay lại
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<style>
    .card {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card-img-top {
        object-fit: cover;
        flex-grow: 1;
        width: 100%;
    }

    .col-md-6 {
        display: flex;
        flex-direction: column;
        height: 100%;
    }
</style>