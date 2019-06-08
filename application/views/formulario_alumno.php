<body class="bg-dark">

    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Registrate</div>
            <div class="card-body">

                <form action="<?= site_url("Alumno_controller/mantenimientoAlumno/".$accion."/".$datos["datosUsuario"]["id_alumno"]) ?>" method="post">


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
                                    <input type="text" id="dni" class="form-control" name="dni" <?php echo ($accion == "ver" ? "readonly" : "") ?> placeholder="DNI" value="<?= $datos["datosUsuario"]["dni"] ?>">
                                    <label for="dni">DNI</label>
                                    <?php echo form_error('dni'); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="telefono" class="form-control" name="telefono" <?php echo ($accion == "ver" ? "readonly" : "") ?> placeholder="Teléfono" value="<?= $datos["datosUsuario"]["telefono"] ?>">
                                    <label for="telefono">Teléfono</label>
                                    <?php echo form_error('telefono'); ?>
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

                    <?php if ($accion != "ver"): ?>
                        <div class="form-group" id="div">

                            <label for="slt_departamento">Departamento</label>
                            <select class="form-control" id="slt_departamento" name="familia" >
                                <option value="0">seleccione uno</option>

                                <?php foreach ($datos["familias"] as $familia): ?>
                                    <option value="<?php echo $familia["id_familia"] ?>" ><?php echo $familia["familia"] ?> </option>
                                <?php endforeach; ?>

                            </select>
                            <?php echo form_error('familia'); ?>

                        </div>
                    <?php endif; ?>

                    <?php if ($accion != "ver"): ?>
                        <label for="">Aptitudes</label> 
                        <div class="form-group">
                            <div class="row" id="aptitudes">

                            </div>
                            <?php echo form_error('aptitudes'); ?>
                        </div>

                    <?php endif; ?>

                    <div class="form-group" >

                        <label for="slt_departamento">Aptitudes seleccionadas</label>
                        <div id="aptitudesseleccionadas" class="row">

                        </div>

                    </div>
                    <input type="hidden" name="guardar" value="guardar">
                    <?php if ($accion != "ver"): ?>
                        <button type="submit"  id="resgistro_sub" class="btn btn-primary btn-block" ><?php if($accion=="registro") echo "Registrarse"; elseif($accion=="crear") echo "Crear"; else echo "Modificar";?> </button>
                    <?php else: ?>
                        <a   id="resgistro_sub" class="btn btn-primary btn-block" href="<?php echo site_url('Alumno_controller/mantenimientoAlumno/editar/' . $datos["datosUsuario"]["id_alumno"])?>"><?= "Modificar datos" ?> </a>
                    <?php endif; ?>
                    <input type="hidden" id="inp_ap_id" name="aptitudes" value=<?= $datos["aptitudes"] ?>>
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="login.html">Login Page</a>
                    <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>


