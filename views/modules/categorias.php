<div class="row py-2" style="background-color: white;">
    <div class="col-md-12">

        <button type="button" class="btn btn-gradient-dark mb-2" data-toggle="modal" data-target="#modalAgregarCategoria">Nueva Categoría</button>

        <table class="table table-bordered dt-responsive dataTable no-footer">
            <thead class=" text-primary">
                <tr>
                    <th style="width: 10px;">#</th>
                    <th> Categoría </th>
                    <th> Acciones </th>

                </tr>
            </thead>
            <tbody id="tablaBodyCategorias">

                <?php
                $tabla = "categorias";
                $categorias = ModeloCategorias::mdlMostrarCategorias($tabla, null, null);

                foreach ($categorias as $key => $value) :
                ?>
                    <tr>
                        <td> <?php echo ($key + 1) ?></td>
                        <td> <?php echo $value["categoria"] ?> </td>

                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" data-toggle="modal" data-target="#modalEditarCategoria" class="btn btn-dark p-2 btnActualizarCategoria" idCategoria="<?php echo $value["id"] ?>">
                                    <i class="mdi mdi-grease-pencil btnActualizarCategoria" idCategoria="<?php echo $value["id"] ?>"></i>
                                </button>
                                <button type="button" class="btn btn-gradient-danger p-2 eliminarCategoria" idCategoria="<?php echo $value["id"] ?>">
                                    <i class="mdi mdi-close-circle eliminarCategoria" idCategoria="<?php echo $value["id"] ?>"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>



        </table>
    </div>
</div>

<!-- MODAL CREAR CATEGORIA -->
<div class="modal fade" id="modalAgregarCategoria" tabindex="-1" aria-labelledby="modalAgregarCategoria" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Categoría</h5>
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
                        <input type="text" class="form-control" id="nuevaCategoria" placeholder="Escriba el nombre de la categoría">
                    </div>


                </div>


            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <a href="#" class="btn btn-primary" id="btnCrearCategoria">Listo</a>
            </div>
        </div>
    </div>
</div>

<!-- MODAL EDITAR CATEGORIA -->
<div class="modal fade" id="modalEditarCategoria" tabindex="-1" aria-labelledby="modalEditarCategoria" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Categoría</h5>
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
                        <input type="text" class="form-control" id="actualizarCategoria">
                    </div>


                </div>


            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <a href="#" class="btn btn-primary" id="btnActualizarCategoria">Listo</a>
            </div>
        </div>
    </div>
</div>