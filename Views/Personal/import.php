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
            <form id="frmfilepersonal" class="needs-validation" enctype="multipart/form-data" novalidate>
                <!-- Page Heading -->
                <div class="cont_loader">
                    <div class="loader"></div>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="col-lg-8"><h1 class="h3 mb-0 text-gray-800">Importar Registros de Personal</h1></div>
                    <div class="col-lg-4 text-right">
                        <button id="btnImport" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" disabled title="Importar Registros" ><i class="fas fa-file-import fa-sm text-white-50"></i></button>
                        <button id="btnNew" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" disabled title="Nuevo registro"><i class="fas fa-file fa-sm text-white-50"></i></button>
                        <button id="btnSend" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" disabled title="Guardar registro"><i class="fas fa-save fa-sm text-white-50"></i></button>
                        <button id="btnExport" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Exportar Registros" ><i class="fas fa-file-export fa-sm text-white-50"></i></button>
                        <button id="btnSearch"class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Buscar registros" ><i class="fas fa-search fa-sm text-white-50"></i></button>
                    </div>
                </div>
                <!-- Content Row -->
                <div id="rowDatosBasicos" class="row rowTabs">
                    <div class="col-lg-12 d-flex">
                        <div class="file-input text-center">
                            <input  type="file" name="fileExcel" id="fileExcel" class="d-sm-inline-block btn btn-lg btn-link shadow-sm file-input__input" require/>
                            <label class="file-input__label" for="file-input">
                                <i class="zmdi zmdi-upload zmdi-hc-2x"></i>
                            </label>
                            <button id="btnSendFile" class="d-none d-sm-inline-block btn btn-lg btn-primary" title="Cargar Archivo"><i>Cargar Archivo</i></button>
                        </div>
                        <div class="text-center mt-5"></div>
                        <div class="col-md-3">
                            <div class="invalid-feedback">
                                Por favor, elije el archivo en formato válido.
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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

        $("#btnSearch").click(function(event) {
            event.preventDefault();
            window.location.href = "<?php echo URL; ?>Personal/list"; 
        });
        $("#btnExport").click(function(event) {
            event.preventDefault();
            window.location.href = "<?php echo URL; ?>Personal/exportFile"; 
        });

    })()

    $(document).ready(function(){
        
    $("#btnSendFile").click(function() {
        event.preventDefault();		
        var archivo = document.getElementById('fileExcel').value;
        var idxDot = archivo.lastIndexOf(".")+1;
        var extFile = archivo.substr(idxDot, archivo.length).toLowerCase();
        if(archivo.length==0){
            jQuery("#modalMessage").text('Por favor selecciona un archivo válido!');
            jQuery("#modalMessage").css({ 'color': 'red'});
            jQuery("#showGeneralModal")[0].click();
        }else{
            var formData = new FormData();
            var files = $("#fileExcel")[0].files[0];
            formData.append('file',files);

            $.ajax({
                type:"POST",
                url: "<?php echo URL; ?>Personal/uploadFile",
                data:formData,
                contentType:false,
                processData:false,
                async: false,
                success: function(response) {
                    console.log(response);
                    jQuery("#modalMessage").text('Archivo cargado correctamente!');
                    jQuery("#modalMessage").css({ 'color': 'green'});
                    jQuery("#showGeneralModal")[0].click();
                    jQuery('#btnAceptarModal').bind( "click", function() {
                        window.location.href = "<?php echo URL; ?>Personal/list"; 
                    });
                }
            });
        }
        return false;			
	});
    });

</script>



