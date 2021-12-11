<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>El Lince</title>
    <link rel="stylesheet" href="views/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="views/assets/css/style.css">
    <link rel="stylesheet" href="views/plugins/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="views/plugins/responsive/responsive.bootstrap4.min.css">

    <!-- End layout styles -->
    <link rel="shortcut icon" href="views/assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <?php
        if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
            require_once "views/modules/navbar.php";
        ?>



            <div class="container-fluid page-body-wrapper">
                <?php
                require_once "views/modules/sidebar.php";
                require_once "views/modules/main.php";
                ?>

            </div>
        <?php } else {
            require_once "views/modules/login.php";
        } ?>
        <!-- FINAL page-body-wrapper  -->
    </div>

    <script src="views/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="views/plugins/jquery-3.6.0.min.js"></script>
    <script src="views/plugins/datatables.js"></script>
    <script src="views//assets/vendors/chart.js/Chart.min.js"></script>
    <script src="views/assets/js/off-canvas.js"></script>
    <script src="views/assets/js/hoverable-collapse.js"></script>
    <script src="views/plugins/responsive/responsive.bootstrap4.min.js"></script>
    <script src="views/plugins/responsive/dataTables.responsive.min.js"></script>


    <script src="views/js/sweetalert.min.js"></script>
    <script src="views/js/moment.min.js"></script>

    <script src="views/js/index.js" type="module"></script>



</body>

</html>