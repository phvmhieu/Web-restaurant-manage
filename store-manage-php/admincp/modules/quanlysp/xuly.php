<?php
include('../../config/config.php');

$tensanpham = $_POST['tensanpham'];
$masp = $_POST['masp'];
$giasp = $_POST['giasp'];
$soluong = $_POST['soluong'];
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];
$danhmuc = $_POST['danhmuc'];
// xu ly hinh anh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];

// Thêm timestamp vào tên ảnh
if ($hinhanh != '') {
    $timestamp = time();
    $extension = pathinfo($hinhanh, PATHINFO_EXTENSION);
    $basename = pathinfo($hinhanh, PATHINFO_FILENAME);
    $hinhanh = $basename . '_' . $timestamp . '.' . $extension;
}

if (isset($_POST['themsanpham'])) {
    // Them
    $sql_them = "INSERT INTO tbl_product(name, code, price, quantity, photo, summary, content, status, id_category) VALUE('" . $tensanpham . "',
     '" . $masp . "', '" . $giasp . "', '" . $soluong . "', '" . $hinhanh . "', '" . $tomtat . "', '" . $noidung . "', '" . $tinhtrang . "', '" . $danhmuc . "')";
    mysqli_query($mysqli, $sql_them);

    move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
    header("Location:../../index.php?action=quanlysp&query=them");
} else if (isset($_POST["suasanpham"])) {
    $id = $_GET['id'];

    if ($hinhanh != '') {
        $sql_get_old_image = "SELECT photo FROM tbl_product WHERE id = '$id' LIMIT 1";
        $query_old_image = mysqli_query($mysqli, $sql_get_old_image);
        $row_old_image = mysqli_fetch_array($query_old_image);

        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
        $sql_update = "UPDATE tbl_product SET 
            name = '" . $tensanpham . "', 
            code = '" . $masp . "', 
            price = '" . $giasp . "', 
            quantity = '" . $soluong . "', 
            photo = '" . $hinhanh . "', 
            summary = '" . $tomtat . "', 
            content = '" . $noidung . "', 
            status = '" . $tinhtrang . "',
            id_category = '" . $danhmuc . "'
            WHERE id = '$id'";

        
        if (!empty($row_old_image['photo']) && file_exists('uploads/' . $row_old_image['photo'])) {
            unlink('uploads/' . $row_old_image['photo']);
        }
    } else {
        $sql_update = "UPDATE tbl_product SET 
            name = '" . $tensanpham . "', 
            code = '" . $masp . "', 
            price = '" . $giasp . "', 
            quantity = '" . $soluong . "', 
            summary = '" . $tomtat . "', 
            content = '" . $noidung . "', 
            status = '" . $tinhtrang . "',
            id_category = '" . $danhmuc . "'
            WHERE id = '$id'";
    }
    mysqli_query($mysqli, $sql_update);

    // Chuyển hướng sau khi cập nhật
    header("Location:../../index.php?action=quanlysp&query=them");
} else {
    $id = $_GET['id'];
    $spl = "SELECT * FROM tbl_product WHERE id = '$id' LIMIT 1";
    $query = mysqli_query($mysqli, $spl);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row['photo']);
    }
    $sql_xoa = "DELETE FROM tbl_product WHERE id='" . $id . "'";
    mysqli_query($mysqli, $sql_xoa);
    header("Location:../../index.php?action=quanlysp&query=them");
}
