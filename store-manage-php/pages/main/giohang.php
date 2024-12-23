<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Thêm jQuery -->
    <style>
        .cart-table img {
            width: 100%;
            height: 100px;
            object-fit: cover;
        }

        .cart-table td {
            text-align: center;
            vertical-align: middle;
        }

        .cart-summary {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .cart-summary .total {
            font-size: 20px;
            font-weight: bold;
        }

        .cart-summary .checkout-btn {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .cart-summary .checkout-btn:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Giỏ hàng</h2>
        <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        ?>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" scope="col">Ảnh</th>
                        <th class="text-center" scope="col">Tên sản phẩm</th>
                        <th class="text-center" scope="col">Số lượng</th>
                        <th class="text-center" scope="col">Đơn giá</th>
                        <th class="text-center" scope="col">Tổng giá</th>
                        <th class="text-center" scope="col">Quản lý</th>
                    </tr>
                </thead>
                <tbody class="cart-table">
                    <?php
                    $totalPrice = 0;
                    foreach ($_SESSION['cart'] as $item) {
                        $totalPrice += $item['quantity'] * $item['price'];
                    ?>
                        <tr data-product-id="<?php echo $item['id']; ?>">
                            <td><img src="admincp/modules/quanlysp/uploads/<?php echo $item['photo']; ?>" alt="<?php echo $item['name']; ?>"></td>
                            <td><?php echo $item['name']; ?></td>
                            <td>
                                <form method="POST" class="update-form">
                                    <input type="hidden" name="update_id" value="<?php echo $item['id']; ?>">
                                    <button type="button" class="btn btn-warning btn-sm update-btn" data-action="decrease">-</button>
                                    <span class="quantity"><?php echo $item['quantity']; ?></span>
                                    <button type="button" class="btn btn-warning btn-sm update-btn" data-action="increase">+</button>
                                </form>
                            </td>
                            <td><?php echo number_format($item['price'], 0, ',', '.'); ?> VND</td>
                            <td class="total-price"><?php echo number_format($item['quantity'] * $item['price'], 0, ',', '.'); ?> VND</td>
                            <td class="text-center">
                                <form method="POST" action="pages/main/themgiohang.php">
                                    <input type="hidden" name="remove_id" value="<?php echo $item['id']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm remove_id" data-action="delete">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="cart-summary d-flex flex-column align-items-center justify-content-center">
                <div class="total" style="font-size: 20px; font-weight: bold; margin-bottom: 10px;">
                    Tổng giá: <span class="total-price"><?php echo number_format($totalPrice, 0, ',', '.'); ?> VND</span>
                </div>
                <form method="POST" action="pages/main/themgiohang.php">
                    <button type="submit" name="clear_cart" class="btn btn-danger btn-sm" style="margin-bottom: 10px;">Xóa tất cả</button>
                </form>
                <a href="checkout.php" class="checkout-btn" style="text-decoration: none; padding: 10px 20px; background-color: #28a745; color: #fff; border-radius: 5px;">
                    Thanh toán
                </a>
            </div>
        <?php
        } else {
            echo "<p class='text-center'>Giỏ hàng của bạn hiện đang trống.</p>";
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Xu lý sự kiện xóa sản phẩm
            $(".remove_id").on("click", function(e) {
                e.preventDefault();  // Ngừng hành động mặc định của form
                var form = $(this).closest("form");
                var productId = form.find("input[name='remove_id']").val();

                $.ajax({
                    url: "pages/main/themgiohang.php",
                    method: "POST",
                    data: {
                        remove_id: productId
                    },
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.status == 'success') {
                            form.closest("tr").remove();  // Xóa dòng trong bảng
                            updateCartSummary();  // Cập nhật lại tổng giá trị giỏ hàng
                        } else {
                            alert("Có lỗi xảy ra khi xóa sản phẩm.");
                        }
                    },
                    error: function() {
                        alert("Lỗi kết nối đến server.");
                    }
                })
            });

            $(".update-btn").on("click", function() {
                var action = $(this).data("action");
                var form = $(this).closest("form");
                var productId = form.find("input[name='update_id']").val();
                var quantityElement = form.find(".quantity");
                var totalPriceElement = $(this).closest("tr").find(".total-price");

                $.ajax({
                    url: "pages/main/themgiohang.php",
                    method: "POST",
                    data: {
                        update_id: productId,
                        update_quantity: action
                    },
                    success: function(response) {
                        var currentQuantity = parseInt(quantityElement.text());
                        if (action === "increase") {
                            quantityElement.text(currentQuantity + 1);
                        } else if (action === "decrease" && currentQuantity > 1) {
                            quantityElement.text(currentQuantity - 1);
                        }

                        var newTotalPrice = parseInt(quantityElement.text()) * parseInt(totalPriceElement.closest("tr").find("td:nth-child(4)").text().replace(/[^0-9]/g, ''));
                        totalPriceElement.text(newTotalPrice.toLocaleString() + " VND");

                        updateCartSummary();
                    }
                });
            });

            function updateCartSummary() {
                var total = 0;
                $(".total-price").each(function() {
                    total += parseInt($(this).text().replace(/[^0-9]/g, ''));
                });

                $(".total").text("Tổng giá: " + total.toLocaleString() + " VND");
            }
        });
    </script>
</body>

</html>
