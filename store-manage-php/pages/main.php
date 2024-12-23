<div id="main">
    <?php
    // Sidebar
    include("sidebar/sidebar.php");
    ?>
    <div class="maincontent">
        <?php
        $temp = $_GET['quanly'] ?? '';

        if ($temp == 'danhmucsanpham') {
            include("main/danhmuc.php");
        } elseif ($temp == 'giohang') {
            include("main/giohang.php");
        } elseif ($temp == 'tintuc') {
            include("main/tintuc.php");
        } elseif ($temp == 'lienhe') {
            include("main/lienhe.php");
        } elseif ($temp == 'sanpham') {
            include("main/sanpham.php");
        } else {
            include("main/index.php");
        }
        ?>
    </div>
</div>
