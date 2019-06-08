<body class="bg-dark">

    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">
                <?php if ($accion == "crear"): ?>
                    Crear Familia
                <?php elseif ($accion == "editar"): ?>
                    Editar Familia
                <?php else: ?>
                    Ver Familia
                <?php endif; ?>
            </div>
            <div class="card-body">

                <form action="<?= site_url("Familia_controller/mantenimientoFamilia/" . $accion . "/" . $datos["datosUsuario"]["id_familia"]) ?>" method="post">


                    <div class="form-group">
                        <div class="form-label-group">
                            <input  id="familia" class="form-control" name="familia" <?php echo ($accion == "ver" ? "readonly" : "") ?> placeholder="Familia" value="<?= $datos["datosUsuario"]["familia"] ?>">
                            <label for="familia">Familia</label>
                            <?php echo form_error('familia'); ?>
                        </div>
                    </div>


                    

                    <input type="hidden" name="guardar" value="guardar">
                    <?php if ($accion != "ver"): ?>
                        <button type="submit"  id="resgistro_sub" class="btn btn-primary btn-block" ><?= $accion == "editar" ? "Editar" : "Crear" ?> </button>
                    <?php else: ?>
                        <a   id="resgistro_sub" class="btn btn-primary btn-block" href="<?php echo site_url('Familia_controller/mantenimientoFamilia/editar/' . $datos["datosUsuario"]["id_familia"]) ?>"><?= "Modificar datos" ?> </a>
                    <?php endif; ?>

                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="login.html">Login Page</a>
                    <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>


