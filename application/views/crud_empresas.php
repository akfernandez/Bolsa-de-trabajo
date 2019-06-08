<div id="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Mantenimiento Profesores</div>
            <div class="card-body">
                <div class="table-responsive">
                    <a class="btn btn-primary" href="<?= site_url("Empresa_controller/mantenimientoEmpresa/crear") ?>" style="margin-bottom:  2%">Crear nuevo</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Razon Social</th>
                                <th>CIF</th>
                                <th>Email</th>
                                <th>Telefono Contacto</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Razon Social</th>
                                <th>CIF</th>
                                <th>Email</th>
                                <th>Telefono Contacto</th>
                                <th>Acciones</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($datos as $key => $value) : ?>

                                <tr>
                                    <td class="td_razon_social"><?= $value["razon_social"] ?></td>
                                    <td class="td_cif"><?= $value["cif"] ?></td>
                                    <td class="td_email"><?= $value["email"] ?></td>
                                    <td class="td_telefono_contacto"><?= $value["telefono_contacto"] ?></td>
                                    <td id="td<?= $value["id"] ?>">
                                        <a href="<?= site_url("Empresa_controller/mantenimientoEmpresa/editar/" . $value["id"]) ?>">Modificar</a>
                                        <a href="<?= site_url("Empresa_controller/mantenimientoEmpresa/ver/" . $value["id"]) ?>">Ver</a>
                                        <button data-toggle="modal" data-target="#borrarModal" onclick="eligidoBorrar(<?= $value["id"] ?>)">Borrar</button>
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</div>


<div class="modal fade" id="borrarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Seguro que quiere borrar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Usted va a borrar </div>
            <div class="modal-body">
                <table  class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Razon Social</th>
                            <th>CIF</th>
                            <th>Email</th>
                            <th>Telefono Contacto</th>


                        </tr>
                    </thead>
                    <tbody id="tbl_elegidoborrar_id"></tbody>
                </table>
            </div>
            <div class="modal-body">¿Esta seguro?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" id="btn_borrar_id" href="<?= site_url("Empresa_controller/mantenimientoEmpresa/borrar/") ?>">Borrar seleccionado</a>
            </div>
        </div>
    </div>
</div>

<script>
    function eligidoBorrar(id) {

        $("#tbl_elegidoborrar_id").html("")
        var tr = $("<tr/>", {

            html: '<td>' + $("#td" + id).siblings(".td_razon_social").html() + '</td>\n\
                           <td>' + $("#td" + id).siblings(".td_cif").html() + '</td>\n\
                           <td>' + $("#td" + id).siblings(".td_email").html() + '</td>\n\
                           <td>' + $("#td" + id).siblings(".td_telefono_contacto").html() + '</td>'


        })
        tr.appendTo("#tbl_elegidoborrar_id")

        $("#btn_borrar_id").attr("href", $("#btn_borrar_id").attr("href") + id)
    }
</script>