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
                <div class="col-lg-8"><h1 class="h3 mb-0 text-gray-800">Lista de Personal</h1></div>
                <div class="col-lg-4 text-right">
                    <button id="btnImport" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Importar Registros" ><i class="fas fa-file-import fa-sm text-white-50"></i></button>
                    <button id="btnNew" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Nuevo registro"><i class="fas fa-file fa-sm text-white-50"></i></button>
                    <button id="btnSend" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" disabled title="Guardar registro"><i class="fas fa-save fa-sm text-white-50"></i></button>
                    <button id="btnExport" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Exportar Registros" ><i class="fas fa-file-export fa-sm text-white-50"></i></button>
                    <button class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" disabled title="Buscar registros" ><i class="fas fa-search fa-sm text-white-50"></i></button>
                </div> 
            </div>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <th style="display:none">Id</th>
                                    <th>Nombre Completo</th>
                                    <th>Tipo de Documento</th>
                                    <th>Documento</th>
                                    <th>Email</th>
                                    <th>Tipo de Sangre</th>
                                    <th>Proceso</th>
                                    <th>Sexo</th>                                    
                                    <th>Talla Camiseta</th>
                                    <th>Talla Pantalon</th>
                                    <th>Talla Zapatos</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Dirección</th>
                                    <th>Número Celular</th>
                                    <th>Número Teléfono</th>
                                    <th>Empresa</th>
                                    <th>Centro de Costos</th>
                                    <th>Area Funcional</th>
                                    <th>Contrato</th>
                                    <th>Nomina</th>
                                    <th>Sede</th>
                                    <th>Ciudad donde labora</th>
                                    <th>Departamento donde labora</th>
                                    <th>EPS</th>
                                    <th>AFP</th>
                                    <th>Caja Compensacion</th>
                                    <th>Fondo Cesantias</th>
                                    <th>En Caso de Accidente Avisar a</th>
                                    <th>Direccion Parentesco</th>
                                    <th>Telefono Parentesco</th>
                                    <th>Fecha de Ingreso</th>
                                    <th>Fecha de Fin Contrato</th>
                                    <th>Cargo</th>
                                    <th>Estado</th>
                                    <th>Fecha Retiro</th>
                                    <th>Ver</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="display:none">Id</th>
                                    <th>Nombre Completo</th>
                                    <th>Tipo de Documento</th>
                                    <th>Documento</th>
                                    <th>Email</th>
                                    <th>Tipo de Sangre</th>
                                    <th>Proceso</th>
                                    <th>Sexo</th>                                    
                                    <th>Talla Camiseta</th>
                                    <th>Talla Pantalon</th>
                                    <th>Talla Zapatos</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Dirección</th>
                                    <th>Número Celular</th>
                                    <th>Número Teléfono</th>
                                    <th>Empresa</th>
                                    <th>Centro de Costos</th>
                                    <th>Area Funcional</th>
                                    <th>Contrato</th>
                                    <th>Nomina</th>
                                    <th>Sede</th>
                                    <th>Ciudad donde labora</th>
                                    <th>Departamento donde labora</th>
                                    <th>EPS</th>
                                    <th>AFP</th>
                                    <th>Caja Compensacion</th>
                                    <th>Fondo Cesantias</th>
                                    <th>En Caso de Accidente Avisar a</th>
                                    <th>Direccion Parentesco</th>
                                    <th>Telefono Parentesco</th>
                                    <th>Fecha de Ingreso</th>
                                    <th>Fecha de Fin Contrato</th>
                                    <th>Cargo</th>
                                    <th>Estado</th>
                                    <th>Fecha Retiro</th>
                                    <th>Ver</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php if ($array[0]){
                                    foreach ($array as $key => $value) {
                                        echo '<tr class="odd gradeX">'; 
                                        echo '<td style="display:none">'.utf8_encode($value[0]).'</td>';
                                        echo '<td>'.utf8_encode($value[30]).'</td>'; //NOMBRE COMPLETO
                                        echo '<td>'.utf8_encode($value[47]).'</td>'; //TIPO DOCUMENTO
                                        echo '<td>'.utf8_encode($value[31]).'</td>'; //NUMERO DOCUMENTO
                                        echo '<td>'.utf8_encode($value[32]).'</td>'; //EMAIL EMPLEADO
                                        echo '<td>'.utf8_encode($value[48]).'</td>'; //TIPO SANGRE
                                        echo '<td>'.utf8_encode($value[46]).'</td>'; //PROCESO
                                        echo '<td>'.utf8_encode($value[19]).'</td>'; //SEXO
                                        echo '<td>'.utf8_encode($value[20]).'</td>'; //TALLA CAMISA
                                        echo '<td>'.utf8_encode($value[21]).'</td>'; //TALLA PANTALON
                                        echo '<td>'.utf8_encode($value[22]).'</td>'; //TALLA ZAPATOS
                                        $date1 = $value[35]->format('Y-m-d'); echo '<td>'.utf8_encode($date1).'</td>'; //FECHA NACIMIENTO
                                        echo '<td>'.utf8_encode($value[36]).'</td>'; //DIRECCION
                                        echo '<td>'.utf8_encode($value[34]).'</td>'; //CELULAR EMPLEADO
                                        echo '<td>'.utf8_encode($value[33]).'</td>'; //TELEFONO EMPLEADO
                                        echo '<td>'.utf8_encode($value[44]).'</td>'; //EMPRESA
                                        echo '<td>'.utf8_encode($value[60]).'</td>'; //CENTRO COSTOS
                                        echo '<td>'.utf8_encode($value[61]).'</td>'; //AREA FUNCIONAL
                                        echo '<td>'.utf8_encode($value[62]).'</td>'; //CONTRATO
                                        echo '<td>'.utf8_encode($value[59]).'</td>'; //NOMINA
                                        echo '<td>'.utf8_encode($value[45]).'</td>'; //SEDE
                                        echo '<td>'.utf8_encode($value[67]).'</td>'; //CIUDAD DONDE LABORA
                                        echo '<td>'.utf8_encode($value[68]).'</td>'; //DEPARTAMENTO DONDE LABORA
                                        echo '<td>'.utf8_encode($value[63]).'</td>'; //EPS
                                        echo '<td>'.utf8_encode($value[64]).'</td>'; //AFP
                                        echo '<td>'.utf8_encode($value[65]).'</td>'; //CAJA COMPENSACION
                                        echo '<td>'.utf8_encode($value[66]).'</td>'; //CESANTIAS
                                        echo '<td>'.utf8_encode($value[23]).'</td>'; //PARENTESCO
                                        echo '<td>'.utf8_encode($value[24]).'</td>'; //DIREC PARENTESCO
                                        echo '<td>'.utf8_encode($value[25]).'</td>'; //TEL PARENTESCO
                                        $date2 = $value[37]->format('Y-m-d'); echo '<td>'.utf8_encode($date2).'</td>'; //FECHA INGRESO
                                        $date3 = $value[38]->format('Y-m-d'); echo '<td>'.utf8_encode($date3).'</td>'; //FECHA FIN CONTRATO
                                        echo '<td>'.utf8_encode($value[43]).'</td>'; //CARGO
                                        echo '<td>'.utf8_encode($value[42]).'</td>'; //ESTADO
                                        $date4 = $value[39]->format('Y-m-d'); echo '<td>'.utf8_encode($date4).'</td>'; //FECHA RETIRO
                                        echo '<td class="text-center"><a href="'.URL.'Personal/edit/'.$value[0].'"><img class="iconsList" src="'.URL.VIEWS.DTF.'img/view.png"></a></td>';
                                        echo '</tr>';
                                    }}
                                    else{
                                        echo '<tr class="odd"><td valign="top" colspan="3" class="dataTables_empty">No se encontraron registros</td></tr>';
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

</div>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();

        $("#btnImport").click(function() {
            event.preventDefault();
            window.location.href = "<?php echo URL; ?>Personal/import"; 
        });
        $("#btnNew").click(function(){
            window.location.href = "<?php echo URL; ?>Personal/create"; 
        });
        $("#btnExport").click(function(){
            event.preventDefault();		
			window.location.href = "<?php echo URL; ?>Personal/exportFile"; 
        });
});
</script>