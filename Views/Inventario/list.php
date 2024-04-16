<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <ul class="navbar-nav ml-auto">
                <div class="topbar-divider d-none d-sm-block"></div>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $datosUser[0]; ?></span>
                        <img class="img-profile rounded-circle"
                            src="<?php echo URL.VIEWS.DTF; ?>img/undraw_profile.svg">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Salir
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="container-fluid">
            <?php if(!is_array($array[0]) && $array[0] == 2){ ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-md-12 ">
                            <h3>!Upss!, No tienes permisos para ingresar a este módulo, ponte en contacto con el administrador del sistema!</h3>
                        </div>
                    </div>
                </div>
            <?php }else{ ?>

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="col-lg-8"><h1 class="h3 mb-0 text-gray-800">Inventarios</h1></div>
                    <div class="col-lg-4 text-right">
                        <button id="btnNew" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Nuevo registro"><i class="fas fa-file fa-sm text-white-50"></i></button>
                        <button id="btnSend" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" disabled title="Guardar registro"><i class="fas fa-save fa-sm text-white-50"></i></button>
                        <button class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" disabled title="Buscar registros" ><i class="fas fa-search fa-sm text-white-50"></i></button>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Categoria</th>
                                        <th>Placa</th>
                                        <th>Serial</th>
                                        <th>Empresa</th>
                                        <th>Bodega</th>
                                        <th>Proceso</th>
                                        <th>Responsable</th>
                                        <th>Ver</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Categoria</th>
                                        <th>Placa</th>
                                        <th>Serial</th>
                                        <th>Empresa</th>
                                        <th>Bodega</th>
                                        <th>Proceso</th>
                                        <th>Responsable</th>
                                        <th>Ver</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                <?php
                                        foreach ($array as $key => $value) {
                                            echo '<tr class="odd gradeX">';
                                            echo '<td>'.$value[6].'</td>';
                                            echo '<td>'.utf8_encode($value[13]).'</td>';
                                            echo '<td>'.utf8_encode($value[7]).'</td>';
                                            echo '<td>'.utf8_encode($value[8]).'</td>';
                                            echo '<td>'.utf8_encode($value[12]).'</td>';
                                            echo '<td>'.utf8_encode($value[14]).'</td>';
                                            echo '<td>'.utf8_encode($value[15]).'</td>';
                                            echo '<td>'.utf8_encode($value[11]).'</td>';
                                            echo '<td class="text-center"><a href="'.URL.'Inventario/edit/'.$value[0].'"><img class="iconsList" src="'.URL.VIEWS.DTF.'img/view.png"></a></td>';
                                            echo '</tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Startup Mesero Virtual 2023</span>
            </div>
        </div>
    </footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();

        $("#btnNew").click(function(){
            window.location.href = "<?php echo URL; ?>Inventario/create";
        });


} );
</script>