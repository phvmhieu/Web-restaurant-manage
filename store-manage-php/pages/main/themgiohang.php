<?php
session_start();
include("../../admincp/config/config.php");

function removeFromCart($id)
{
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $cart_item) {
            if ($cart_item['id'] == $id) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                break;
            }
        }
    }
}

if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']);
    header("Location: ../../index.php?quanly=giohang");
    exit;
}

if (isset($_POST['update_id']) && isset($_POST['update_quantity'])) {
    $update_id = $_POST['update_id'];
    $action = $_POST['update_quantity'];
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $update_id) {
            if ($action == 'increase') {
                $item['quantity']++;
            } elseif ($action == 'decrease' && $item['quantity'] > 1) {
                $item['quantity']--;
            }
            break;
        }
    }
    header("Location: ../../index.php?quanly=giohang");
    exit();
}

// Thêm sản phẩm vào giỏ hàng
if (isset($_POST['themgiohang'])) {
    $id = $_GET['id'];
    $soluong = 1;

    $sql = "SELECT * FROM tbl_product WHERE id = '" . $id . "' LIMIT 1";
    $query_product = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query_product);

    if ($row) {
        $new_product = array(
            'name' => $row['name'],
            'id' => $id,
            'quantity' => $soluong,
            'price' => $row['price'],
            'photo' => $row['photo'],
            'code' => $row['code']
        );

        if (isset($_SESSION['cart'])) {
            $found = false;

            foreach ($_SESSION['cart'] as $key => $cart_item) {
                if ($cart_item['id'] == $id) {
                    $_SESSION['cart'][$key]['quantity'] += 1;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $_SESSION['cart'][] = $new_product;
            }
        } else {
            $_SESSION['cart'] = array($new_product);
        }
    }
    header("Location: ../../index.php?quanly=giohang");
    exit;
}

// Xóa sản phẩm khỏi giỏ hàng
if (isset($_POST['remove_id'])) {
    $remove_id = $_POST['remove_id'];
    removeFromCart($remove_id);

    // Trả về kết quả cho AJAX
    echo json_encode(['status' => 'success']);
    exit();
}


// Nếu yêu cầu lấy tổng giá trị giỏ hàng
if (isset($_POST['get_cart_summary']) && $_POST['get_cart_summary'] == true) {
    $totalPrice = 0;
    foreach ($_SESSION['cart'] as $item) {
        $totalPrice += $item['quantity'] * $item['price'];
    }

    // Trả về tổng giá trị giỏ hàng
    echo json_encode(['total' => number_format($totalPrice, 0, ',', '.') . ' VND']);
    exit();
}
