<div class="main-panel">

    <div class="content-wrapper" id="content">
        <?php


        if (isset($_GET["route"])) {
            if (
                $_GET["route"] == "perfil" ||
                $_GET["route"] == "usuarios" ||
                $_GET["route"] == "categorias" ||
                $_GET["route"] == "productos" ||
                $_GET["route"] == "dashboard"
            ) {

                require_once "views/modules/" . $_GET["route"] . ".php";
            }
        }


        ?>
    </div>


    <?php
    require_once "views/modules/footer.php";
    ?>
    <!-- partial -->
</div>