<div class="sidebar">
    <div class="list-group">
        <?php
        $sql_category = "SELECT * FROM tbl_category ORDER BY id DESC";
        $query_category = mysqli_query($mysqli, $sql_category);
        while ($row_category = mysqli_fetch_array($query_category)) {
        ?>
            <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_category['id'] ?>" class="list-group-item list-group-item-action">
                <?php echo $row_category['name'] ?>
            </a>
        <?php
        }
        ?>
    </div>
</div>