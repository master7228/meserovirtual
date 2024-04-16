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
                        <a class="dropdown-item" id="showGeneralModal" href="#" data-toggle="modal" data-target="#generalModal" style="display:none">
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
                    <form id="frmnomina" class="needs-validation" novalidate>
                    
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <div class="col-lg-8"><h1 class="h3 mb-0 text-gray-800">Editar Cesantia</h1></div>
                            <div class="col-lg-4 text-right">
                                <button type="submit" id="btnNew" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Nuevo registro" disabled><i class="fas fa-file fa-sm text-white-50"></i></button>
                                <button id="btnSend" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Guardar registro"><i class="fas fa-save fa-sm text-white-50"></i></button>
                                <button id="btnSearch" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Buscar registros" ><i class="fas fa-search fa-sm text-white-50"></i></button>
                            </div>
                        </div>
                        <div class="row">
                            <?php $data = $array[0];?>
                            <div class="col-lg-12">    
                                    <div class="col-md-12 ">
                                        <div class="col-md-4 form-group" style="display:none">
                                            <label for="validationCustom01" class="form-label">Código</label>
                                            <input type="int" class="form-control" id="idcesantia" name="idcesantia" value="<?php echo $data[0];  ?>" required>
                                        </div>
                                        <div class="col-md-4 form-group ">
                                            <label for="validationCustom01" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="cesantia" name="cesantia" value="<?php echo utf8_encode($data[1]);  ?>" required>
                                            <div class="invalid-feedback">
                                                Por favor, ingresa el nombre de la Cesantia.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <div class="col-md-4 form-group">
                                            <label for="validationCustom02" class="form-label">Descripción</label>
                                            <textarea class="form-control" id="desccesantia" name="desccesantia"><?php echo utf8_encode($data[2]);  ?></textarea>
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
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                    form.classList.add('was-validated');
                }else{
                    event.preventDefault();
                    form.classList.add('was-validated');
                    var idcesantia = $.trim($("#idcesantia").val());
                    var cesantia = $.trim($("#cesantia").val());
                    var desccesantia = $.trim($("#desccesantia").val());

                    $.ajax({
                        type:"POST",
                        url: "<?php echo URL; ?>Cesantias/edit",
                        data: {idcesantia:idcesantia, cesantia:cesantia, desccesantia:desccesantia},
                        success: function(response){
                            console.log(response);
                            if(response != 0){
                                jQuery("#modalMessage").text('Registro editado correctamente!');
                                jQuery("#modalMessage").css({ 'color': 'green'});
                                jQuery("#showGeneralModal")[0].click();
                                jQuery('#btnAceptarModal').bind( "click", function() {
                                    window.location.href = "<?php echo URL; ?>Cesantias/list"; 
                                });
                            }else{
                                jQuery("#modalMessage").text('Esta Cesantia ya existe con este nombre, valida por favor!');
                                jQuery("#modalMessage").css({ 'color': 'red'});
                                jQuery("#showGeneralModal")[0].click();
                            }
                        }
                    });
                }

            }, false)
            })

            $("#btnSearch").click(function() {
                event.preventDefault();
                window.location.href = "<?php echo URL; ?>Cesantias/list"; 
            });
            $("#btnNew").click(function() {
                event.preventDefault();
                window.location.href = "<?php echo URL; ?>Cesantias/create"; 
            });
})()

</script>