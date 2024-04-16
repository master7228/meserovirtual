<style type="text/css">
    .menu { float: left; width: 25%; background-color: #e3f2ff; }
    .menu img { min-width: 30%; max-width: 30%; margin: 5%; cursor: pointer; }
    .principal { 
        width: 60%;
        min-width: 60%;
        min-height: 50%;
        display: inline-flex;
        text-align: center; 
    }
    .visor {     
        min-width: 70%;
        text-align: center;
        width: 70%; 
    }
    .visor img { width: 50% }
    .rowImages{
        margin-left:0%;
    }
</style>
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

                    <form id="sede" class="needs-validation" novalidate>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <div class="col-lg-8"><h1 class="h3 mb-0 text-gray-800">SEDES</h1></div>
                                <div class="col-lg-4 text-right">
                                    <button type="submit" id="btnNew" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Nuevo registro" disabled><i class="fas fa-file fa-sm text-white-50"></i></button>
                                    <button id="btnSend" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Guardar registro"><i class="fas fa-save fa-sm text-white-50"></i></button>
                                    <button id="btnSearch" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Buscar registros" ><i class="fas fa-search fa-sm text-white-50"></i></button>
                                </div>
                        </div>

                        <div id="rowDatosBasicos" class="row rowTabs">

                            <div class="col-lg-12 d-flex">
                            
                                <div class="col-md-4 ">
                                    <label for="validationCustom01" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="sedenombre" name="sedenombre" value="<?php echo $array[0]['nombre']; ?>" required>
                                    <input type="hidden" class="form-control" id="sedeid" name="sedeid" value="<?php echo $array[0]['id']; ?>">
                                    <div class="invalid-feedback">
                                        Por favor, ingresa el nombre.
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <label for="validationCustom01" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" id="sededireccion" name="sededireccion" value="<?php echo $array[0]['direccion']; ?>" required>
                                    <div class="invalid-feedback">
                                        Por favor, ingresa la dirección.
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <label for="validationCustom01" class="form-label">Teléfono/Celular</label>
                                    <input type="number" class="form-control" id="sedetelefono" name="sedetelefono" value="<?php echo $array[0]['telefono']; ?>" required>
                                    <div class="invalid-feedback">
                                        Por favor, ingresa el teléfono ó Celular.
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
 

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

  // Bucle sobre ellos y evitar el envío
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
                    var sedeid = $.trim($("#sedeid").val());
                    var sedenombre = $.trim($("#sedenombre").val());
                    var sededireccion = $.trim($("#sededireccion").val());
                    var sedetelefono = $.trim($("#sedetelefono").val());

                    $.ajax({
                        type:"POST",
                        url: "<?php echo URL; ?>Sede/edit",
                        datatype: 'JSON',
                        data: {sedeid:sedeid, sedenombre: sedenombre, sededireccion:sededireccion, sedetelefono:sedetelefono },
                        success: function(response){
                            console.log(response);
                            /*if(response != 0){
                                console.log(response);
                                jQuery("#modalMessage").text('Registro actualizado correctamente!');
                                jQuery("#modalMessage").css({ 'color': 'green'});
                                jQuery("#showGeneralModal")[0].click();
                                jQuery('#btnAceptarModal').bind( "click", function() {
                                    window.location.href = "<?php echo URL; ?>Sede/list"; 
                                });
                            }else{
                                jQuery("#modalMessage").text('Esta sede ya existe con este nombre, valida por favor!');
                                jQuery("#modalMessage").css({ 'color': 'red'});
                                jQuery("#showGeneralModal")[0].click();
                            }*/
                        }
                    });
                }
                
            }, false)
            })

            $("#btnSearch").click(function() {
                event.preventDefault()
                window.location.href = "<?php echo URL; ?>Sede/list"; 
            });
            $("#btnNew").click(function() {
                event.preventDefault()
                window.location.href = "<?php echo URL; ?>Sede/create"; 
            });
            
    })()

</script>