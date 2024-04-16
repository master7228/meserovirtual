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
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["datauser"]['client_business_name'].' - '; echo $_SESSION["datauser"]['admin_name']; ?></span>
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="col-lg-8"><h1 class="h3 mb-0 text-gray-800">Sedes</h1></div>
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
                                            <th>Direccion</th>
                                            <th>Teléfono</th>
                                            <th>Ver</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Direccion</th>
                                            <th>Teléfono</th>
                                            <th>Ver</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php 
                                        if($array[0]!=0){
                                            foreach ($array as $key => $value) {
                                                echo '<tr class="odd gradeX">'; 
                                                echo '<td>'.$value['nombre'].'</td>';
                                                echo '<td>'.$value['direccion'].'</td>';
                                                echo '<td>'.$value['telefono'].'</td>';
                                                echo '<td class="text-center"><a href="'.URL.'Sede/edit/'.$value['id'].'"><img class="iconsList" src="'.URL.VIEWS.DTF.'img/view.png"></a></td>';
                                                echo '</tr>';
                                            } 
                                        }else{
                                            echo '<tr class="odd"><td valign="top" colspan="5" class="dataTables_empty">No se encontraron registros</td></tr>';
                                        }
                                            
                                        ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Startup Mentes Brillantes 2023</span>
            </div>
        </div>
    </footer>
</div>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();

        $("#btnNew").click(function(){
            window.location.href = "<?php echo URL; ?>Sede/create"; 
        });


} );
</script>