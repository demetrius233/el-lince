<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-home"></i>
        </span> Dashboard
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Ayuda <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
        </ul>
    </nav>
</div>

<?php

$totalUsuarios = ModeloUsuarios::totalUsuarios();
$totalCategorias = ModeloCategorias::totalCategorias();
$totalProductos = ModeloProductos::totalProductos();
?>

<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
                <img src="views/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Usuarios <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5"><?php echo $totalUsuarios ?></h2>
                <h6 class="card-text">Total de Usuarios</h6>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <img src="views/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Categorías <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5"><?php echo $totalCategorias ?></h2>
                <h6 class="card-text">Total de Categorías</h6>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
                <img src="views/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Productos <i class="mdi mdi-diamond mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5"><?php echo $totalProductos ?></h2>
                <h6 class="card-text">Total de Productos</h6>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Productos Salientes</h4>
                <canvas id="barChart" style="height:230px"></canvas>
            </div>
        </div>
    </div>

    <div class="col-xl-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Productos Entrantes</h4>
                <canvas id="entrantes" style="height:230px"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- CONTENEDOR DE TODOS LOS PRODUCTOS ENTRANTES Y SALIENTES -->
<div class="card p-4">
    <div class="row">


        <?php
        $totalProductosSalientes = ModeloProductos::totalProductosSalientes();
        $totalProductosEntrantes = ModeloProductos::totalProductosEntrantes();
        ?>
        <div class="col-6">
            <h4 class="text-center text-muted lead">Todos los productos salientes</h4>
            <div class="list-group">

                <?php
                foreach ($totalProductosSalientes as $key => $value) :
                    if ($value["producto"] == "inicio") continue;
                ?>
                    <a class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">Producto: <span><?php echo $value["producto"] ?></span></h6>
                            <small><?php echo $value["fecha"] ?></small>
                        </div>
                        <small class="mb-1">Se descontó <?php echo $value["cantidad"] ?> <?php echo $value["producto"] ?> del stock de inventario.</small>
                        <!-- <small>And some small print.</small> -->
                    </a>
                <?php endforeach; ?>
            </div>

        </div>

        <div class="col-6">
            <h4 class="text-center text-muted lead">Todos los productos entrantes</h4>

            <div class="list-group">
                <?php
                foreach ($totalProductosEntrantes as $key => $value) :
                    if ($value["producto"] == "inicio") continue;
                ?>
                    <a class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">Producto: <span><?php echo $value["producto"] ?></span></h6>
                            <small><?php echo $value["fecha"] ?></small>
                        </div>
                        <p class="mb-1">Se agregró <?php echo $value["cantidad"] ?> <?php echo $value["producto"] ?> del stock de inventario.</p>
                        <!-- <small>And some small print.</small> -->
                    </a>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>