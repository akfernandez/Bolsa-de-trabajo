<body class="bg-dark">

    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">
                <?php if ($accion == "crear"): ?>
                    Crear Empresa
                <?php elseif ($accion == "editar"): ?>
                    Editar Empresa
                <?php else: ?>
                    Ver Empresa
                <?php endif; ?>
            </div>
            <div class="card-body">

                <form action="<?= site_url("Empresa_controller/mantenimientoEmpresa/" . $accion . "/" . $datos["datosUsuario"]["id_empresa"]) ?>" method="post">


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

                            <!--                            <div class="col-md-6">
                                                            <div class="form-label-group">
                                                                <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" >
                                                                <label for="confirmPassword">Confirm password</label>
                                                            </div>
                                                        </div>-->
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="razon_social" class="form-control" name="razon_social" placeholder="Razon Social" <?php echo ($accion == "ver" ? "readonly" : "") ?> autofocus="autofocus" value="<?= $datos["datosUsuario"]["razon_social"] ?>">
                                    <label for="razon_social">Razon Social</label>
                                    <?php echo form_error('razon_social'); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="telefono_contacto" class="form-control" name="telefono_contacto" <?php echo ($accion == "ver" ? "readonly" : "") ?> placeholder="Telefono Contacto" value="<?= $datos["datosUsuario"]["telefono_contacto"] ?>">
                                    <label for="telefono_contacto">Telefono Contacto</label>
                                    <?php echo form_error('telefono_contacto'); ?>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="cif" class="form-control" name="cif" <?php echo ($accion == "ver" ? "readonly" : "") ?> placeholder="CIF" value="<?= $datos["datosUsuario"]["cif"] ?>">
                                    <label for="cif">CIF</label>
                                    <?php echo form_error('cif'); ?>
                                </div>
                            </div>
                            
                                <div class="col-md-6">
                                    <div class="form-label-group">
                                        <input type="text" id="nombre_recursos_humanos" class="form-control" name="nombre_recursos_humanos" <?php echo ($accion == "ver" ? "readonly" : "") ?> placeholder="CIF" value="<?= $datos["datosUsuario"]["nombre_recursos_humanos"] ?>">
                                        <label for="nombre_recursos_humanos">Nombre Recursos Humanos</label>
                                        <?php echo form_error('cif'); ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input  id="direccion" class="form-control" name="direccion" <?php echo ($accion == "ver" ? "readonly" : "") ?> placeholder="Dirección" value="<?= $datos["datosUsuario"]["direccion"] ?>">
                                <label for="direccion">Dirección</label>
                                <?php echo form_error('direccion'); ?>
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
                            <a   id="resgistro_sub" class="btn btn-primary btn-block" href="<?php echo site_url('Empresa_controller/mantenimientoEmpresa/editar/' . $datos["datosUsuario"]["id_empresa"]) ?>"><?= "Modificar datos" ?> </a>
                        <?php endif; ?>

                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="login.html">Login Page</a>
                    <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>


