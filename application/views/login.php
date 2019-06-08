

<body class="bg-dark">

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Iniciar sesión</div>
            <div class="card-body">
                <form action="<?= site_url('Usuario_controller/login'); ?>" method="post">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input  id="userName" class="form-control" name="username" placeholder="Nombre Usuario" value="<?= set_value("username") ?>">
                            <label for="userName">Nombre Usuario</label>
                            <?php echo form_error('username'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Contraseña" value="<?= set_value("pass") ?>">
                            <label for="inputPassword">Contraseña</label>
                            <?php echo form_error('pass'); ?>
                        </div>
                    </div>
                    <!--          <div class="form-group">
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" value="remember-me">
                                    Remember Password
                                  </label>
                                </div>
                              </div>-->

                    <button type="submit" class="btn btn-primary btn-block" >Iniciar sesion</button>
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="register.html">Register an Account</a>
                    <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>


