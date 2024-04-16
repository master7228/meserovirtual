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
                        <a class="dropdown-item" id="showGeneralModal" href="#" data-toggle="modal" data-target="#generalModal">
                        
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
                <form id="frmzona" class="needs-validation" novalidate>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="col-lg-8"><h1 class="h3 mb-0 text-gray-800">Zonas</h1></div>
                        <div class="col-lg-4 text-right">
                            <button type="submit" id="btnNew" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Nuevo registro"><i class="fas fa-file fa-sm text-white-50"></i></button>
                            <button id="btnSend" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Guardar registro"><i class="fas fa-save fa-sm text-white-50"></i></button>
                            <button id="btnSearch" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Buscar registros" ><i class="fas fa-search fa-sm text-white-50"></i></button>
                        </div>
                        
                        
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <?php $data = $array[0]; ?>
                                <div class="col-md-12 ">
                                    <div class="col-md-4 form-group ">
                                        <label for="validationCustom01" class="form-label">Código</label>
                                        <input type="text" class="form-control" id="zonid" name="zonid" value="<?php echo $data[0] ?>" style="display:none">
                                        <input type="text" class="form-control" id="zoncodigo" name="zoncodigo" required value="<?php echo $data[1] ?>">
                                        <div class="invalid-feedback">
                                            Por favor, ingresa el código.
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group ">
                                        <label for="validationCustom01" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="zonnombre" name="zonnombre" required value="<?php echo $data[2] ?>">
                                        <div class="invalid-feedback">
                                            Por favor, ingresa el nombre.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="col-md-4 form-group">
                                        <label for="validationCustom02" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="zondescripcion" name="zondescripcion"><?php echo $data[3] ?></textarea>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa la descripción.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
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
                    var zoncodigo = $.trim($("#zoncodigo").val());
                    var zonnombre = $.trim($("#zonnombre").val());
                    var zondescripcion = $.trim($("#zondescripcion").val());
                    var zonid = $.trim($("#zonid").val());

                    $.ajax({
                        type:"POST",
                        url: "<?php echo URL; ?>Zona/edit",
                        data: {zonid:zonid, zoncodigo: zoncodigo, zonnombre:zonnombre, zondescripcion:zondescripcion},
                        success: function(response){
                            console.log(response);
                            if(response != 0){
                                jQuery("#modalMessage").text('Registro editado correctamente!');
                                jQuery("#modalMessage").css({ 'color': 'green'});
                                jQuery("#showGeneralModal")[0].click();
                                
                                jQuery('#btnAceptarModal').bind( "click", function() {
                                    window.location.href = "<?php echo URL; ?>Zona/list"; 
                                });
                            }else{
                                jQuery("#modalMessage").text('Este zona ya existe con este código, valida por favor!');
                                jQuery("#modalMessage").css({ 'color': 'red'});
                                jQuery("#showGeneralModal")[0].click();
                            }
                        }
                    });
                }
                
            }, false)
            })

            $("#btnSearch").click(function() {
                event.preventDefault()
                window.location.href = "<?php echo URL; ?>Zona/list"; 
            });
            $("#btnNew").click(function() {
                event.preventDefault()
                window.location.href = "<?php echo URL; ?>Zona/create"; 
            });
})()

</script>