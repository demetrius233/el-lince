<?php
if ($_SESSION["info"]["perfil"] !== "administrador") {
    header("location: dashboard");
}
?>
<div class="row">


    <div class="col-xl-5 ">
        <div class="card perfilFixed">
            <img src="views/assets/images/dashboard/img_2.jpg" class="card-img-top" alt="...">

            <div class="contenedor-img-perfil img-perfil2">

                <img src="views/assets/images/faces/face11.jpg" class="img-fluid" alt="...">

            </div>
            <div class="text-center">
                <h6 class="mt-2 mb-0">Andrés Ramos</h6>
                <small class="text-muted">Administrador</small>
            </div>
            <div class="card-body p-3">

                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->

                <ul class="list-group  mb-3">
                    <li class="list-group-item border-0">
                        <b>Usuarios</b> <a class="float-right">4</a>
                    </li>
                    <li class="list-group-item border-0">
                        <b>Productos</b> <a class="float-right">743</a>
                    </li>
                    <li class="list-group-item border-0">
                        <b>Categorías</b> <a class="float-right">5</a>
                    </li>
                </ul>

                <a href="#" class="btn btn-primary">Ver Usuarios</a>
            </div>
        </div>
    </div>

    <div class="col-xl-7 timeLine">
        <!-- Timeline -->
        <ul class="timeline">




            <?php
            $notificaciones = ModeloNotificaciones::traerUltimaNotificacion();
            /* echo "<pre>";
            var_dump($notificaciones);
            echo "</pre>"; */
            foreach ($notificaciones as $key => $value) :
            ?>

                <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                    <div class="timeline-arrow"></div>
                    <img src="<?php echo $value["foto"] ?>" class="rounded-circle" width="40" height="40">
                    <h2 class="h5 mb-0 ml-2 d-inline-block"><?php echo $value["nombre"] ?></h2>
                    <span class="small text-gray float-right">
                        <i class="fa fa-clock-o mr-1"></i>
                        <?php echo $value["fecha"] ?>
                    </span>
                    <p class="text-small mt-2 font-weight-light">
                        <?php echo $value["accion_breve"] ?>
                    </p>
                    <p>
                        SQL:
                        <span><?php echo $value["accion"] ?></span>
                    </p>
                </li>
            <?php endforeach; ?>





        </ul><!-- End -->
    </div>






</div>