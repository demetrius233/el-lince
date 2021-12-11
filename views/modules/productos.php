<div class="card">
    <div class="card-body">

        <button type="button" class="btn btn-gradient-dark mb-3" data-toggle="modal" data-target="#modalAgregarProducto">Nuevo Producto</button>

        <table class="table table-bordered dt-responsive dataTable no-footer tablas">
            <thead class="text-primary">
                <tr>
                    <th style="width: 10px;">#</th>
                    <th> Código </th>
                    <th> Descripción </th>
                    <th> Categoría </th>
                    <th> Stock </th>
                    <th> Precio de Compra </th>
                    <th> Precio de Venta </th>
                    <th> Acciones </th>

                </tr>
            </thead>
            <tbody id="tablaBodyProductos">

                <?php
                $tabla = "productos";
                $productos = ModeloProductos::mdlMostrarProductos($tabla, null, null);

                foreach ($productos as $key => $value) :
                ?>

                    <tr>

                        <td><?php echo ($key + 1) ?></td>
                        <td><?php echo $value["codigo"] ?></td>
                        <td><?php echo $value["descripcion"] ?></td>
                        <td><?php echo $value["categoria"] ?></td>
                        <td>
                            <?php
                            if ($value["stock"] <= 10) {
                                echo  "<p class='btn btn-danger btn-sm'>" . $value['stock'] . "</p>";
                            } else if ($value["stock"] <= 15) {
                                echo  "<p class='btn btn-warning btn-sm'>" . $value['stock'] . "</p>";
                            } else {
                                echo  "<p class='btn btn-success btn-sm'>" . $value['stock'] . "</p>";
                            }
                            ?>


                        </td>
                        <td><?php echo $value["precio_compra"] ?> Bs</td>
                        <td><?php echo $value["precio_venta"] ?> Bs</td>



                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" data-toggle="modal" data-target="#modalEditarProducto" class="btn btn-dark p-2 btnActualizarProducto" idProducto="<?php echo $value["id"] ?>">
                                    <i class="mdi mdi-grease-pencil btnActualizarProducto" idProducto="<?php echo $value["id"] ?>"></i>
                                </button>
                                <button type="button" class="btn btn-gradient-danger p-2 eliminarProducto" idProducto="<?php echo $value["id"] ?>">
                                    <i class="mdi mdi-close-circle eliminarProducto" idProducto="<?php echo $value["id"] ?>"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>

<!-- MODAL CREAR PRODUCTO -->
<div class="modal fade" id="modalAgregarProducto" tabindex="-1" aria-labelledby="modalAgregarProducto" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group mb-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="mdi mdi-collage"></i>
                            </div>
                        </div>
                        <select class="form-control" id="categoriaProducto">
                            <option value="">-- Selecciona Categoría</option>
                            <?php
                            $tabla = "categorias";
                            $categorias = ModeloCategorias::mdlMostrarCategorias($tabla, null, null);
                            foreach ($categorias as $key => $value) :
                            ?>
                                <option value="<?php echo $value["id"] ?>">
                                    <?php echo $value["categoria"] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group mb-2">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="mdi mdi-barcode-scan"></i>
                            </div>
                        </div>
                        <input type="text" readonly class="form-control" value="0000" id="nuevoCodigo" placeholder="Código">
                    </div>


                </div>

                <div class="form-group mb-2">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="mdi mdi-parking "></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="nuevaDescripcion" placeholder="Descripción">
                    </div>


                </div>

                <div class="form-group mb-2">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="mdi mdi-check-decagram"></i>
                            </div>
                        </div>
                        <input type="number" class="form-control" id="nuevoStock" placeholder="Stock">
                    </div>


                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col pl-0">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="mdi mdi-clipboard-arrow-down" style="display: inline-block;transform: rotate(180deg)"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="precioCompra" placeholder="Precio de Compra">
                            </div>

                        </div>

                        <div class="col pr-0">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="mdi mdi-clipboard-arrow-down"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="precioVenta" placeholder="Precio de Venta">
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <a href="#" class="btn btn-primary" id="btnCrearProducto">Listo</a>
            </div>
        </div>
    </div>
</div>


<!-- MODAL EDITAR PRODUCTO -->
<div class="modal fade" id="modalEditarProducto" tabindex="-1" aria-labelledby="modalEditarProducto" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group mb-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="mdi mdi-collage"></i>
                            </div>
                        </div>
                        <select class="form-control" id="categoriaActualProducto">
                            <option value="">-- Selecciona Categoría</option>
                            <?php
                            $tabla = "categorias";
                            $categorias = ModeloCategorias::mdlMostrarCategorias($tabla, null, null);
                            foreach ($categorias as $key => $value) :
                            ?>
                                <option value="<?php echo $value["id"] ?>">
                                    <?php echo $value["categoria"] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group mb-2">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="mdi mdi-barcode-scan"></i>
                            </div>
                        </div>
                        <input type="text" readonly class="form-control" value="0000" id="codigoActualProducto">
                    </div>


                </div>

                <div class="form-group mb-2">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="mdi mdi-parking "></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="actualizarDescripcion" placeholder="Descripción">
                    </div>


                </div>

                <div class="form-group mb-2">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="mdi mdi-check-decagram"></i>
                            </div>
                        </div>
                        <input type="number" class="form-control" id="actualizarStock" placeholder="Stock">
                    </div>


                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col pl-0">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="mdi mdi-clipboard-arrow-down" style="display: inline-block;transform: rotate(180deg)"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="actualizarPrecioCompra">
                            </div>

                        </div>

                        <div class="col pr-0">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="mdi mdi-clipboard-arrow-down"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="actualizarPrecioVenta">
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <a href="#" class="btn btn-primary" id="btnActualizarProducto">Listo</a>
            </div>
        </div>
    </div>
</div>