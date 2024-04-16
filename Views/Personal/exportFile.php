<div id="content-wrapper" class="d-flex flex-column">
<!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <div class="topbar-divider d-none d-sm-block"></div>
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $datosUser[0]; ?></span>
                        <img class="img-profile rounded-circle" src="<?php echo URL.VIEWS.DTF; ?>img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Salir
                        </a>
                        <a class="dropdown-item" id="showGeneralModal" href="#" data-toggle="modal" data-target="#generalModal" style="display:none">
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="col-lg-8"><h1 class="h3 mb-0 text-gray-800">Exportar Registros de Personal</h1></div>
                <div class="col-lg-4 text-right">
                    <button id="btnImport" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Importar Registros" ><i class="fas fa-file-import fa-sm text-white-50"></i></button>
                    <button id="btnNew" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Nuevo registro"><i class="fas fa-file fa-sm text-white-50"></i></button>
                    <button id="btnSend" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" disabled title="Guardar registro"><i class="fas fa-save fa-sm text-white-50"></i></button>
                    <button id="btnExport" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" disabled title="Exportar Registros" ><i class="fas fa-file-export fa-sm text-white-50"></i></button>
                    <button class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Buscar registros" ><i class="fas fa-search fa-sm text-white-50"></i></button>
                </div>
            </div>
                <!-- Content Row -->
            <div id="rowDatosBasicos" class="row rowTabs">
                <div class="col-lg-12 d-flex">
                    <h1>Exportar a Excel</h1>
                </div>
                <div class="col-lg-12 d-flex">
                    <p>El archivo Excel está listo para descargar. Haz clic en el botón para descargarlo:</p>
                </div>
                <form class="col-lg-12 d-flex">
                    <button id="btnDownFile" class="d-sm-inline-block btn btn-lg btn-primary" title="Exportar datos a Excel"><i>Exportar datos a Excel</i></button>
                </form>
            </div>           
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Startup Mesero Virtual 2023</span>
            </div>
        </div>
    </footer>
<!-- End of Footer -->
</div>

<script>
    (function () {
        'use strict'
        // Obtener todos los formularios a los que queremos aplicar estilos de validación de Bootstrap personalizados
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)

        $("#btnImport").click(function() {
            event.preventDefault();
            window.location.href = "<?php echo URL; ?>Personal/import"; 
        });
        $("#btnNew").click(function(){
            window.location.href = "<?php echo URL; ?>Personal/create"; 
        });
        $("#btnSearch").click(function(event) {
            event.preventDefault();
            window.location.href = "<?php echo URL; ?>Personal/list"; 
        });
    });

    $(document).ready(function(){
        
        $("#btnDownFile").click(function() {
            event.preventDefault();		
            
            $.ajax({
                type:"POST",
                url: "<?php echo URL; ?>Personal/exportData",
                success: function(response) {
                    console.log(response);
                    window.location.href = '../<?php echo LBS; ?>downloadFile.php?folder=gestionHumana&filename=reportePersonal&extension=xlsx';
                    // jQuery("#modalMessage").text('Descargando Documento.');
                    // jQuery("#modalMessage").css({ 'color': 'green'});
                    // jQuery("#showGeneralModal")[0].click();
                    // jQuery('#btnAceptarModal').bind( "click", function() {
                    //     window.location.href = "<?php //echo URL; ?>Personal/list"; 
                    // });

                   /* var link = document.createElement('a');
                    link.href = response;*/
                }
            });
        });
        function descargarExcel() {
            window.location.href = "<?php echo URL; ?>Personal/exportData"; 
        }
    });
</script>