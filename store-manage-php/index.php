<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý quán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="container-fluid wrapper">
        <?php
        include("admincp/config/config.php");
        include("pages/header.php");
        include("pages/menu.php");
        include("pages/main.php");
        include("pages/footer.php");
        ?>
    </div>

    <!-- Nút liên hệ mạng xã hội -->
    <div class="wrap_network">
        <a class="btn-zalo btn-frame" target="_blank" href="https://zalo.me/0389026780">
            <div class="pulsation"></div>
            <div class="pulsation"></div>
            <i>
                <img alt="QUEEN FT" width="50" height="50"
                     src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Icon_of_Zalo.svg/120px-Icon_of_Zalo.svg.png">
            </i>
        </a>
        <a class="btn-phone btn-frame" href="tel:0389026780">
            <div class="pulsation"></div>
            <div class="pulsation"></div>
            <i>
                <img alt="QUEEN FT" width="50" height="50" src="images/telephone.svg">
            </i>
        </a>
        <a class="btn-chiduong btn-frame" target="_blank" href="https://maps.app.goo.gl/cxddPcDkQXZYABf97">
            <div class="pulsation"></div>
            <div class="pulsation"></div>
            <i>
                <img alt="QUEEN FT" width="50" height="50" src="images/maps.svg">
            </i>
        </a>
        <a class="btn-fanpage btn-frame" target="_blank" href="https://facebook.com/comnieucoffeequeenft">
            <div class="pulsation"></div>
            <div class="pulsation"></div>
            <i>
                <img alt="QUEEN FT" width="50" height="50" src="images/facebook.svg">
            </i>
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>

</html>
