<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <!-- PERFIL -->
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="<?php echo $_SESSION["info"]["foto"] ?>" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2"><?php echo $_SESSION["info"]["usuario"] ?></span>
                    <?php
                    if ($_SESSION["info"]["perfil"] == "administrador") :
                    ?>
                        <span class="text-secondary text-small">Administrador</span>
                    <?php
                    else :
                    ?>
                        <span class="text-secondary text-small">Estándar</span>
                    <?php endif ?>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link dashboardLink" href="dashboard" id="dashboardLink">
                <span class="menu-title dashboardLink">Dashboard</span>
                <i class="mdi mdi-home menu-icon dashboardLink"></i>
            </a>
        </li>

        <?php

        if ($_SESSION["info"]["perfil"] == "administrador") :
        ?>

            <li class="nav-item">
                <a class="nav-link perfilLink" href="perfil" id="perfilLink">
                    <span class="menu-title perfilLink ">Mi Perfil</span>
                    <i class="mdi mdi-account-star menu-icon perfilLink "></i>
                </a>
            </li>

        <?php endif; ?>

        <li class="nav-item">
            <a class="nav-link usuariosLink" href="usuarios" id="usuariosLink">
                <span class="menu-title usuariosLink">Usuarios</span>
                <i class="mdi mdi-worker menu-icon usuariosLink"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link categoriasLink" href="categorias" id="categoriasLink">
                <span class="menu-title categoriasLink">Categorías</span>
                <i class="mdi  mdi-collage menu-icon categoriasLink"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link productosLink" href="productos" id="productosLink">
                <span class="menu-title productosLink">Productos</span>
                <i class="mdi mdi-parking menu-icon productosLink"></i>
            </a>
        </li>


        <!-- COLLAPSE -->
        <!--   <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Paginas Ejemplo</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="./pages/samples/blank-page.html"> Blank Page </a></li>
                    <li class="nav-item"> <a class="nav-link" href="./pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="./pages/samples/register.html"> Register </a></li>
                    <li class="nav-item"> <a class="nav-link" href="./pages/samples/error-404.html"> 404 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="./pages/samples/error-500.html"> 500 </a></li>
                </ul>
            </div>
        </li> -->


    </ul>
</nav>