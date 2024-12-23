<?php
include('../../config/config.php');

$tenloaisp = $_POST['tendanhmuc'];
$thutu = $_POST['thutu'];
if (isset($_POST['themdanhmuc'])) {
    // Them
    $sql_them = "INSERT INTO tbl_category(name, ordinal) VALUE('" . $tenloaisp . "', '" . $thutu . "')";
    mysqli_query($mysqli, $sql_them);
    header("Location:../../index.php?action=quanlydanhmucsanpham&query=them");
} else if (isset($_POST["suadanhmuc"])) {
    // Sua
    $sql_update = "UPDATE tbl_category SET name = '" . $tenloaisp . "', ordinal = '" . $thutu . "' WHERE id = $_GET[id]";
    mysqli_query($mysqli, $sql_update);
    header("Location:../../index.php?action=quanlydanhmucsanpham&query=them");
} else {
    $id = $_GET['id'];
    $sql_xoa = "DELETE FROM tbl_category WHERE id='" . $id . "'";
    mysqli_query($mysqli, $sql_xoa);
    header("Location:../../index.php?action=quanlydanhmucsanpham&query=them");
}
