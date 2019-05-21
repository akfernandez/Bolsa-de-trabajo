<body class="bg-dark">

    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Registrate</div>
            <div class="card-body">
                <form action="<?= site_url('Usuario_controller/registro'); ?>" method="post">

                    <div class="form-group">
                        <div class="form-label-group">
                            <input  id="userName" class="form-control" name="username" placeholder="Nombre Usuario" value="<?= set_value("username") ?>">
                            <label for="userName">Nombre Usuario</label>
                            <?php echo form_error('username'); ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Contraseña" value="<?= set_value("pass") ?>">
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
                                    <input type="text" id="firstName" class="form-control" name="nombre" placeholder="Nombre"  autofocus="autofocus" value="<?= set_value("nombre") ?>">
                                    <label for="firstName">Nombre</label>
                                    <?php echo form_error('nombre'); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="LastName" class="form-control" name="apellidos" placeholder="Apellidos" value="<?= set_value("apellidos") ?>">
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
                                    <input type="text" id="dni" class="form-control" name="dni" placeholder="DNI" value="<?= set_value("dni") ?>">
                                    <label for="dni">DNI</label>
                                    <?php echo form_error('dni'); ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="telefono" class="form-control" name="telefono" placeholder="Teléfono" value="<?= set_value("telefono") ?>">
                                    <label for="telefono">Teléfono</label>
                                    <?php echo form_error('telefono'); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input  id="inputEmail" class="form-control" name="email" placeholder="Email" value="<?= set_value("email") ?>">
                            <label for="inputEmail">Email</label>
                            <?php echo form_error('email'); ?>
                        </div>
                    </div>


                    <div class="form-group" id="div">
                        
                        <label for="slt_departamento">Departamento</label>
                        <select class="form-control" id="slt_departamento" name="familia" >
                            <option value="">seleccione uno</option>
                            
                            <?php foreach ($familias->result() as $familia): ?>
                                <option value="<?php echo $familia->id_familia ?>" <?php if( set_value("familia")==$familia->id_familia)echo "selected" ?>><?php echo $familia->familia ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('familia'); ?>

                    </div>


                    <label for="">Aptitudes</label>
                    <div class="form-group">
                        <div class="row" id="aptitudes">

                        </div>
                        <?php echo form_error('aptitudes[]'); ?>
                    </div>
                    
                    <input type="hidden" id="aptitudeselegidas" value="<?php
                    if($aptitudes){
                    foreach ($aptitudes as $key => $value) {
     
 
                    echo $value.",";
                    }
                    
                    }
                     ?>"/>
                    
                    <button type="submit"  id="resgistro_sub" class="btn btn-primary btn-block" >Registrarse</button>
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="login.html">Login Page</a>
                    <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>
