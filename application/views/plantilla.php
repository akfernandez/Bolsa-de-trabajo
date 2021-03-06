

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Bolsa de trabajo </title>

        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url(); ?>assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        <!-- Page level plugin CSS-->
        <link href="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap4.css" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">

    </head>

    <?php
            
            $ci = get_instance();
            $ci->load->model("Session_model");
            $esta_dentro = $ci->Session_model->esta_dentro();
            $tipo = $ci->Session_model->get_tipo_usuario();
            
            ?>
    <!-- CABECERA-->
    <body id="page-top">

        <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

            <a class="navbar-brand mr-1" href="index.html">Bolsa de trabajo</a>

            <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Buscador  -->
            <!--    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>-->

            <div class="input-group"></div>

            <!-- Accines posibles navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <!--      <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-bell fa-fw"></i>
                          <span class="badge badge-danger">9+</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </li>-->
                <!--      <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-envelope fa-fw"></i>
                          <span class="badge badge-danger">7</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </li>-->
                <?php if (!$esta_dentro) : ?>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="<?php echo site_url("Usuario_controller/login") ?>" id="userDropdown" >

                        iniciar sesion
                    </a>

                </li>

                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="<?php echo site_url("Alumno_controller/mantenimientoAlumno/registro") ?>" id="userDropdown" >

                        registrarse
                    </a>

                </li>
                
                <?php endif; ?>



                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Editar</a>
                        <!--          <a class="dropdown-item" href="#">Activity Log</a>-->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Cerrar Sesion</a>
                    </div>
                </li>
            </ul>

        </nav>
        <!--FIN CABECERA-->

        <div id="wrapper">

            <!-- BARRA LATERAL -->
            <ul class="sidebar navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Inicio</span>
                    </a>
                </li>
                <a class="dropdown-item" href="<?php echo site_url("Alumno_controller/crud_alumno") ?>">aaaaaaa</a>
                <?php if($esta_dentro):?>
                <?php if ($tipo != "a" && $tipo !="e") : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Administracion</span>
                    </a>
                    
                    
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <h6 class="dropdown-header">Mantenimientos</h6>
                        <a class="dropdown-item" href="<?= site_url("Alumno_controller/crud_alumno") ?>">Alumnos</a>
                        <a class="dropdown-item" href="<?= site_url("Aptitud_controller/crud_aptitud") ?>">Aptitudes</a>
                        
                         <?php if ($tipo== "d") : ?>
                        
                        <a class="dropdown-item" href="<?= site_url("Empresa_controller/crud_empresa") ?>">Empresas</a>
                        <a class="dropdown-item" href="<?= site_url("Profesor_controller/crud_profesor") ?>">Profesores</a>
                        <a class="dropdown-item" href="<?= site_url("Direccion_controller/crud_direccion") ?>">Direccion</a>
                        <a class="dropdown-item" href="<?= site_url("Familia_controller/crud_familia") ?>">Familias</a>
                        
                        
<!--                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header">Other Pages:</h6>
                        <a class="dropdown-item" href="404.html">404 Page</a>
                        <a class="dropdown-item" href="blank.html">Blank Page</a>-->
                        <?php endif; ?>
                    </div>
                    <?php endif;?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="charts.html">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Charts</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tables.html">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Tables</span></a>
                </li>
                <?php endif;?>
            </ul>
            <!--FIN BARRA LATERAL-->
           
            <?= $cuerpo ?>
           
            <!-- /.content-wrapper -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © Your Website 2019</span>
                    </div>
                </div>
            </footer>
        </div>
        <!-- /#wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Seguro que quiere salir?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Selecciona "cerrar sesion" para abandonar la aplicación</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-primary" href="<?php echo site_url("Usuario_controller/cerrar_sesion") ?>">Cerrar sesion</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url(); ?>assets/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url(); ?>assets/jquery-easing/jquery.easing.min.js"></script>

        <!-- Page level plugin JavaScript-->
        <script src="<?php echo base_url(); ?>assets/chart.js/Chart.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap4.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js"></script>

        <!-- Demo scripts for this page-->
        <script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/renderDOM.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/util.js"></script>
       


    </body>

</html>
