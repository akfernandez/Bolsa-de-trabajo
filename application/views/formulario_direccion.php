<body class="bg-dark">

    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">
                <?php if ($accion == "crear"): ?>
                    Crear Dirección
                <?php elseif ($accion == "editar"): ?>
                    Editar Dirección
                <?php else: ?>
                    Ver Dirección
                <?php endif; ?>
            </div>
            <div class="card-body">

                <form action="<?= site_url("Direccion_controller/mantenimientoDireccion/" . $accion . "/" . $datos["datosUsuario"]["id_direccion"]) ?>" method="post">


                    <div class="form-group">
                        <div class="form-label-group">
                            <input  id="userName" class="form-control" name="username" <?php echo ($accion == "ver" ? "readonly" : "") ?> placeholder="Nombre Usuario" value="<?= $datos["datosUsuario"]["nombre_usuario"] ?>">
                            <label for="userName">Nombre Usuario</label>
                            <?php echo form_error('username'); ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" class="form-control" name="pass" <?php echo ($accion == "ver" ? "readonly" : "") ?> placeholder="Contraseña" value="<?= $datos["datosUsuario"]["password"] ?>">
                                    <label for="inputPassword">Contraseña</label>
                                    <?php echo form_error('pass'); ?>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="firstName" class="form-control" name="nombre" placeholder="Nombre" <?php echo ($accion == "ver" ? "readonly" : "") ?> autofocus="autofocus" value="<?= $datos["datosUsuario"]["nombre"] ?>">
                                    <label for="firstName">Nombre</label>
                                    <?php echo form_error('nombre'); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="LastName" class="form-control" name="apellidos" <?php echo ($accion == "ver" ? "readonly" : "") ?> placeholder="Apellidos" value="<?= $datos["datosUsuario"]["apellidos"] ?>">
                                    <label for="LastName">Apellidos</label>
                                    <?php echo form_error('apellidos'); ?>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="telefono" class="form-control" name="telefono" placeholder="Nombre" <?php echo ($accion == "ver" ? "readonly" : "") ?> autofocus="autofocus" value="<?= $datos["datosUsuario"]["telefono"] ?>">
                                    <label for="telefono">Teléfono</label>
                                    <?php echo form_error('telefono'); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="cargo" class="form-control" name="cargo" <?php echo ($accion == "ver" ? "readonly" : "") ?> placeholder="Cargo" value="<?= $datos["datosUsuario"]["cargo"] ?>">
                                    <label for="cargo">Cargo</label>
                                    <?php echo form_error('cargo'); ?>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="dni" class="form-control" name="dni" <?php echo ($accion == "ver" ? "readonly" : "") ?> placeholder="DNI" value="<?= $datos["datosUsuario"]["dni"] ?>">
                                    <label for="dni">DNI</label>
                                    <?php echo form_error('dni'); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input  id="inputEmail" class="form-control" name="email" <?php echo ($accion == "ver" ? "readonly" : "") ?> placeholder="Email" value="<?= $datos["datosUsuario"]["email"] ?>">
                            <label for="inputEmail">Email</label>
                            <?php echo form_error('email'); ?>
                        </div>
                    </div>

                    <input type="hidden" name="guardar" value="guardar">
                    <?php if ($accion != "ver"): ?>
                        <button type="submit"  id="resgistro_sub" class="btn btn-primary btn-block" ><?= $accion == "editar" ? "Editar" : "Crear" ?> </button>
                    <?php else: ?>
                        <a   id="resgistro_sub" class="btn btn-primary btn-block" href="<?php echo site_url('Direccion_controller/mantenimientoDireccion/editar/' . $datos["datosUsuario"]["id_direccion"]) ?>"><?= "Modificar datos" ?> </a>
                    <?php endif; ?>

                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="login.html">Login Page</a>
                    <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>


