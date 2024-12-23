<?php
$sql_danhmuc = "SELECT * FROM tbl_category ORDER BY id";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>

<div class="menu">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#89B550">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu và form tìm kiếm -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Trang chủ</a></li>
                    <?php
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                    ?>
                        <li class="nav-item"><a class="nav-link" href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id'] ?>">
                                <?php echo $row_danhmuc['name'] ?>
                            </a></li>
                    <?php
                    }
                    ?>
                    <li class="nav-item"><a class="nav-link" href="index.php?quanly=giohang">Giỏ hàng</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?quanly=tintuc">Tin tức</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?quanly=lienhe">Liên hệ</a></li>
                </ul>
                <!-- Form tìm kiếm -->
                <form class="d-flex" action="index.php" method="GET" style="max-width: 300px; margin-left: 10px;">
                    <input type="hidden" name="quanly" value="timkiem">
                    <input class="form-control me-2 rounded" type="search" name="keyword" placeholder="Tìm kiếm...">
                    <button class="btn btn-outline-primary rounded ml-1" type="submit">Tìm</button>
                </form>

            </div>
        </div>
    </nav>
</div>

<style>
    .navbar-nav .nav-link {
        color: white;
    }

    .navbar-nav .nav-link:hover {
        color: #ffcc00;
    }

    .btn-outline-primary {
        background-color: #ffcc00;
        border-color: #ffcc00;
        color: white;
    }

    .btn-outline-primary:hover {
        background-color: #e6b800; /* Màu nền vàng đậm khi hover */
        border-color: #e6b800; /* Màu viền vàng đậm khi hover */
    }
</style>
