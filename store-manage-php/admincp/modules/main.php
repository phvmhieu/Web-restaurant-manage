<div class="clear"></div>
<div class="main">
    <?php
    $temp = $_GET['action'] ?? '';
    $query = $_GET['query'] ??'';

    if ($temp == 'quanlydanhmucsanpham' && $query == 'them') {
        include("modules/quanlydanhmucsp/them.php");
        include("modules/quanlydanhmucsp/lietke.php");
    } elseif ($temp == "quanlydanhmucsanpham"&& $query == "sua") {
        include("modules/quanlydanhmucsp/sua.php");
    } elseif ($temp == "quanlysp"&& $query == "them") {
        include("modules/quanlysp/them.php");
        include("modules/quanlysp/lietke.php");
    } elseif ($temp == "quanlysp"&& $query == "sua") {
        include("modules/quanlysp/sua.php");
    } else {
        include("modules/dashboard.php");
    }
    ?>
</div>