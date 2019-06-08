<body class="bg-dark">

    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">
                <?php if ($accion == "crear"): ?>
                    Crear Aptitud
                <?php elseif ($accion == "editar"): ?>
                    Editar Aptitud
                <?php else: ?>
                    Ver Aptitud
                <?php endif; ?>
            </div>
            <div class="card-body">

                <form action="<?= site_url("Aptitud_controller/mantenimientoAptitud/".$accion."/".$datos["datosUsuario"]["id_aptitud"]) ?>" method="post">


                    <div class="form-group">
                        <div class="form-label-group">
                            <input  id="descripcion" class="form-control" name="descripcion" <?php echo ($accion == "ver" ? "readonly" : "") ?> placeholder="Descripción" value="<?= $datos["datosUsuario"]["descripcion"] ?>">
                            <label for="descripcion">Descripción</label>
                            <?php echo form_error('descripcion'); ?>
                        </div>
                    </div>


                    


                    <div class="form-group" id="div">

                        <div class="form-group" id="div">

                            <label for="slt_departamento">Departamento</label>
                            <select class="form-control" id="slt_departamento" name="familia" <?= $accion=="ver"?"disabled":""?> >
                                <option value="">seleccione uno</option>

                                <?php foreach ($datos["familias"] as $familia): ?>
                                <option value="<?php echo $familia["id_familia"] ?>" <?= $datos["datosUsuario"]["familia_id"] ==$familia["id_familia"]?"selected":"" ?>><?php echo $familia["familia"] ?> </option>
                                <?php endforeach; ?>

                            </select>
                            <?php echo form_error('familia'); ?>

                        </div>

                    </div>




                    <input type="hidden" name="guardar" value="guardar">
                    <?php if ($accion != "ver"): ?>
                        <button type="submit"  id="resgistro_sub" class="btn btn-primary btn-block" ><?= $accion == "editar" ? "Editar" : "Crear" ?> </button>
                    <?php else: ?>
                        <a   id="resgistro_sub" class="btn btn-primary btn-block" href="<?php echo site_url('Aptitud_controller/mantenimientoAptitud/editar/' . $datos["datosUsuario"]["id_aptitud"]) ?>"><?= "Modificar datos" ?> </a>
                    <?php endif; ?>

                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="login.html">Login Page</a>
                    <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>


