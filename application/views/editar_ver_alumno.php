<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header"><?= $accion ?> Alumno</div>
        <div class="card-body">
            <form action="<?= site_url('Usuario_controller/registro'); ?>" method="post">

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input  id="nombre" class="form-control" name="nombre" placeholder="Nombre" <?php if ($accion == "ver") echo "readonly" ?> value="<?= $datos["datos"]["nombre"] ?>">
                                <label for="nombre">Nombre</label>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-label-group">

                                <input  id="apellidos" class="form-control" name="apellidos" placeholder="Apellidos" <?php if ($accion == "ver") echo "readonly" ?> value="<?= $datos["datos"]["apellidos"] ?>">
                                <label for="apellidos">Apellidos</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input  id="dni" class="form-control" name="dni" placeholder="DNI" <?php if ($accion == "ver") echo "readonly" ?> value="<?= $datos["datos"]["dni"] ?>">
                                <label for="dni">DNI</label>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-label-group">

                                <input  id="telefono" class="form-control" name="telefono" placeholder="Teléfono" <?php if ($accion == "ver") echo "readonly" ?>  value="<?= $datos["datos"]["telefono"] ?>">
                                <label for="telefono">Teléfono</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">

                    <div class="form-label-group">
                        <input  id="email" class="form-control" name="email" placeholder="email" <?php if ($accion == "ver") echo "readonly" ?>  value="<?= $datos["datos"]["email"] ?>">
                        <label for="email">Email</label>

                    </div>

                </div>


                <label for="">Aptitudes</label>
                <div class="form-group">
                    <div class="row" id="aptitudesAlumno">
                        <?php foreach ($datos["aptitudes"] as $value): ?>

                            <div class="col-md-4 col-6">

                                <button class="borraraptitud" >
                                    <span >×</span>
                                </button>
                                <?= $value["descripcion"] ?>
                            </div>

                        <?php endforeach; ?>

                    </div>
                    <div>
                        <button>Añadir Aptitudes</button>
                    </div>

                </div>

                <div class="form-group">
                    <div class="row" id="aptitudes">

                        <select class="form-control" id="slt_departamento" name="familia" >
                            <option value="">seleccione uno</option>
                            
                            
                        </select>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>