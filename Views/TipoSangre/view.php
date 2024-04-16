<!-- Content Wrapper -->
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
            <?php var_dump($array); ?>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $datosUser[0]; ?></span>
                    <img class="img-profile rounded-circle"
                        src="<?php echo URL.VIEWS.DTF; ?>img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Salir
                    </a>
                    <a class="dropdown-item" id="showGeneralModal" href="#" data-toggle="modal" data-target="#generalModal">
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <form id="frmzona" class="needs-validation" novalidate>
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="col-lg-8"><h1 class="h3 mb-0 text-gray-800">Tipo Sangre</h1></div>
                <div class="col-lg-4 text-right">
                    <button type="submit" id="btnNew" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Nuevo registro" disabled><i class="fas fa-file fa-sm text-white-50"></i></button>
                    <button id="btnSend" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Guardar registro"><i class="fas fa-save fa-sm text-white-50"></i></button>
                    <button id="btnSearch" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Buscar registros" ><i class="fas fa-search fa-sm text-white-50"></i></button>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-12">  
                        <div class="col-md-12 ">
                            <div class="col-md-4 form-group ">
                                <label for="validationCustom01" class="form-label">Tipo</label>
                                <input type="text" class="form-control" id="santipo" name="santipo" required>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el tipo.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="col-md-4 form-group">
                                <label for="validationCustom02" class="form-label">Descripción</label>
                                <textarea class="form-control" id="sandescripcion" name="sandescripcion"></textarea>
                                <div class="invalid-feedback">
                                    Por favor, ingresa la descripción.
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Enviar formulario</button>
                        </div>
                    </div>
                </div>
            </div>
    <!-- /.container-fluid -->
    </form>
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
<!-- End of Content Wrapper -->

<script>
    (function () {
  'use strict'

  // Obtener todos los formularios a los que queremos aplicar estilos de validación de Bootstrap personalizados
  var forms = document.querySelectorAll('.needs-validation')
  Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                console.log(form);
                if (!form.checkValidity()) {
                    console.log(form.checkValidity());
                    event.preventDefault()
                    event.stopPropagation()
                    form.classList.add('was-validated')
                }else{
                    event.preventDefault()
                    
                    form.classList.add('was-validated')
                    var santipo = $.trim($("#santipo").val());
                    var sandescripcion = $.trim($("#sandescripcion").val());

                    $.ajax({
                        type:"POST",
                        url: "<?php echo URL; ?>TipoSangre/create",
                        data: {santipo: santipo, sandescripcion:sandescripcion},
                        success: function(response){
                            console.log(response);
                            if(response != 0){
                                jQuery("#modalMessage").text('Registro creado correctamente!')
                                jQuery("#showGeneralModal")[0].click();
                            //alert("Customer success!");
                            //document.location = "<?php //echo URL; ?>Customer/create";
                            }else{
                                jQuery("#modalMessage").text('Este tipo de sangre ya existe, valida por favor!')
                                jQuery("#showGeneralModal")[0].click();
                            }
                        }
                    });
                }
                
            }, false)
            })

            $("#btnSearch").click(function() {
                event.preventDefault()
                window.location.href = "<?php echo URL; ?>TipoSangre/list"; 
            });
            $("#btnNew").click(function() {
                event.preventDefault()
                window.location.href = "<?php echo URL; ?>TipoSangre/create"; 
            });
})()

</script>