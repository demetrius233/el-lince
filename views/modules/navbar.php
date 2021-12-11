<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="./index.html"><img src="views/assets/images/logo.png" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="./index.html"><img src="views/assets/images/logo-mini.svg" alt="logo" /></a>
    </div>

    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>


        <ul class="navbar-nav navbar-nav-right">


            <?php

            if ($_SESSION["info"]["perfil"] == "administrador") :
            ?>

                <!-- Mensajes -->
                <li class="nav-item dropdown" id="notificaciones">
                    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="count-symbol bg-danger"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <h6 class="p-3 mb-0">Notificaciones</h6>
                        <div class="dropdown-divider"></div>


                        <div id="contenedorNotificaciones">
                            <?php
                            $notificaciones = ModeloNotificaciones::traerUltimaNotificacion();
                            foreach ($notificaciones as $key => $value) :
                            ?>

                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="<?php echo $value["foto"] ?>" alt="image" class="profile-pic notificaciones-img" />
                                    </div>
                                    <div class=" preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="preview-subject  ellipsis mb-1 font-weight-normal  noticaciones-accion">
                                            <?php echo $value["accion_breve"] ?>
                                        </h6>
                                        <p class="text-gray mb-0">Hace un momento</p>
                                    </div>
                                </a>

                                <div class="dropdown-divider"></div>

                            <?php endforeach; ?>
                        </div>


                        <h6 class="p-3 mb-0 text-center">Ver todas </h6>
                    </div>
                </li>

            <?php endif; ?>


            <!-- PERFIL USER -->
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
                        <img src="<?php echo $_SESSION["info"]["foto"] ?>" alt="image">
                        <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1 text-black"><?php echo $_SESSION["info"]["nombre"] ?></p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="mdi mdi-cached mr-2 text-success"></i> Mi Perfil </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" id="cerrarSesion">
                        <i class="mdi mdi-logout mr-2 text-primary"></i> Salir </a>
                </div>
            </li>

            <!-- CERRAR SESIÓN -->
            <li class="nav-item nav-logout d-none d-lg-block">
                <a class="nav-link" href="#">
                    <i class="mdi mdi-power"></i>
                </a>
            </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>