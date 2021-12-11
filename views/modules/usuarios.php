<?php

/* session_destroy();
$_SESSION = []; */

?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Administrar Usuarios</h4>

        <button type="button" data-toggle="modal" id="btnModalCrearUsuario" data-target="#modalCrearUsuario" class="btn btn-gradient-dark ">
            Crear Usuario
        </button>

        <div class="contenedor-usuarios">


            <?php
            $tabla = "usuarios";
            $usuarios = ModeloUsuarios::mdlMostrarUsuarios($tabla, null, null);
            foreach ($usuarios as $usuario) :
            ?>

                <div class="lista-usuario">
                    <div class="info-usuario py-2 text-center">
                        <img src="<?php echo $usuario["foto"] ?>" class="rounded-circle" alt="image" width="40" />

                        <div class="flex-grow-1 px-3">
                            <p class="m-0"><?php echo $usuario["nombre"] ?></p>
                            <small class="text-muted"><?php echo $usuario["usuario"] ?></small>
                        </div>

                        <div class="px-3">
                            <p class="m-0 estadoUsuario1 <?php echo $usuario["estado"] ? "activo" : "" ?>" estado="<?php echo $usuario["estado"] ? "0" : "1" ?>" idUsuario="<?php echo $usuario["id"] ?>"></p>
                            <small class="text-muted">
                                <?php if ($usuario["perfil"] == "administrador") {
                                    echo "Administrador";
                                } else {
                                    echo "Estándar";
                                } ?>
                            </small>
                        </div>
                    </div>

                    <div class="acciones-usuario">
                        <button type="button" data-toggle="modal" idUsuario="<?php echo $usuario["id"] ?>" data-target="#modalEditarUsuario" class="btn btn-gradient-info btn-rounded btn-icon cargarUsuarioActualizar">
                            <i class="mdi mdi-grease-pencil cargarUsuarioActualizar" idUsuario="<?php echo $usuario["id"] ?>"></i>

                        </button>


                        <button type="button" estado="<?php echo $usuario["estado"] ? "0" : "1" ?>" idUsuario="<?php echo $usuario["id"] ?>" class="btn btn-gradient-danger btn-rounded btn-icon eliminarUsuario">
                            <i class="mdi mdi-close-circle eliminarUsuario" estado="<?php echo $usuario["estado"] ? "0" : "1" ?>" idUsuario="<?php echo $usuario["id"] ?>"></i>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>








</div>

<!-- MODAL CREAR USUARIO -->
<div class="modal fade" id="modalCrearUsuario" tabindex="-1" aria-labelledby="modalCrearUsuario" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data">

                    <div class="form-group mb-2">
                        <div class="contenedor-img-perfil icon-formulario" id="dropZone">
                            <input type="file" class="d-none" name="" id="nuevaFotoUsuario">
                            <img src="views/img/default/user-default.jpg" class="img-fluid previsualizaIMG" alt="...">
                            <i class="mdi mdi-camera icon-camera"></i>
                        </div>
                    </div>

                    <div class="form-group mb-2">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="mdi mdi-account-star"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="nuevoNombre" placeholder="Escriba su nombre aquí">
                        </div>


                    </div>

                    <div class="form-group mb-2">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="mdi mdi-account-key"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="nuevoUsuario" placeholder="Escriba su usuario aquí">
                        </div>


                    </div>

                    <div class="form-group mb-2">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="mdi mdi mdi-lock"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="nuevoPassword" placeholder="Escriba su password aquí">
                        </div>

                    </div>

                    <div class="form-group mb-2">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="mdi mdi-vector-polygon"></i>
                                </div>
                            </div>
                            <select class="form-control" name="" id="nuevoPerfil">
                                <option value="">-- Seleccionar Perfil --</option>
                                <option value="administrador">Administrador</option>
                                <option value="estandar">Estándar</option>
                            </select>
                        </div>



                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-primary" id="btnCrearUsuario">Listo</button>
            </div>
        </div>
    </div>
</div>


<!-- MODAL EDITAR USUARIO -->
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" aria-labelledby="modalEditarUsuario" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data">

                    <div class="form-group mb-2">
                        <div class="contenedor-img-perfil icon-formulario" id="dropZoneActualizar">
                            <input type="hidden" id="fotoActual">
                            <input type="file" class="d-none" name="" id="actualizarFotoUsuario">
                            <img src="views/img/default/user-default.jpg" class="img-fluid previsualizaIMGFormActualizar" id="tagImgActual" alt="...">
                            <i class="mdi mdi-camera icon-camera"></i>
                        </div>
                    </div>

                    <div class="form-group mb-2">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="mdi mdi-account-star"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="actualizarNombre">
                        </div>


                    </div>

                    <div class="form-group mb-2">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="mdi mdi-account-key"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" disabled readonly id="actualizarUsuario">
                        </div>


                    </div>

                    <div class="form-group mb-2">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="mdi mdi mdi-lock"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="actualizarPassword">
                        </div>

                    </div>

                    <div class="form-group mb-2">

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="mdi mdi-vector-polygon"></i>
                                </div>
                            </div>
                            <select class="form-control" name="" id="actualizarPerfil">
                                <option value="">-- Seleccionar Perfil --</option>
                                <option value="administrador">Administrador</option>
                                <option value="estandar">Estándar</option>
                            </select>
                        </div>



                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnActualizarUsuario">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>