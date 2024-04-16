
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
                            
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="sedenombre" name="sedenombre" required>
                                    <div class="invalid-feedback">
                                        Por favor, ingresa el nombre.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" id="sededireccion" name="sededireccion" required>
                                    <div class="invalid-feedback">
                                        Por favor, ingresa la dirección.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Teléfono/Celular</label>
                                    <input type="number" class="form-control" id="sedetelefono" name="sedetelefono" required>
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
                    var sedenombre = $.trim($("#sedenombre").val());
                    var sededireccion = $.trim($("#sededireccion").val());
                    var sedetelefono = $.trim($("#sedetelefono").val());

                    $.ajax({
                        type:"POST",
                        url: "<?php echo URL; ?>Sede/create",
                        datatype: 'JSON',
                        data: {sedenombre: sedenombre, sededireccion:sededireccion, sedetelefono:sedetelefono },
                        success: function(response){
                            if(response != 0){
                                jQuery("#modalMessage").text('Registro creado correctamente!');
                                jQuery("#modalMessage").css({ 'color': 'green'});
                                jQuery("#showGeneralModal")[0].click();
                                jQuery('#btnAceptarModal').bind( "click", function() {
                                    window.location.href = "<?php echo URL; ?>Sede/list";
                                });
                            }else{
                                jQuery("#modalMessage").text('Esta sede ya existe con este nombre, valida por favor!');
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
                window.location.href = "<?php echo URL; ?>Sede/list"; 
            });
            $("#btnNew").click(function() {
                event.preventDefault()
                window.location.href = "<?php echo URL; ?>Sede/create"; 
            });
            
    })()

$(document).ready(function(){
    if($("#access").val() != 0){
    
    $("#sededepartamento").on('change', function () {
        $("#sededepartamento option:selected").each(function () {
            elegido=$(this).val();
            $.ajax({
                type:"POST",
                url: "<?php echo URL; ?>Ciudad/getDataByDep",
                datatype: 'JSON',
                data: {id_departamento:elegido},
                success: function(response){
                    if(response != 0){
                        data = JSON.parse(response);
                        $('#sedeciudad  option').remove(); 
                        $("#sedeciudad").append($("<option></option>").html("Seleccione la ciudad"));
                        for (let index = 0; index < data.length; index++) {
                            const element = data[index];
                            $("#sedeciudad").append($("<option></option>").val((JSON.parse(element))[0]).html((JSON.parse(element))[2])); 
                        }
                    }else{
                        jQuery("#modalMessage").text('No se encontraron ciudades para este departamento, valida por favor!');
                        jQuery("#modalMessage").css({ 'color': 'red'});
                        jQuery("#showGeneralModal")[0].click();
                    }
                }
            });	
        });
    });

            $("#imagenesInternas").on('change', function() {				
				var formData = new FormData();
				var files = $('#imagenesInternas')[0].files[0];
				formData.append('file',files);
                formData.append('sedeid',$('#sedeid').val());
                formData.append('folder','internas');
				$.ajax({
					url: "<?php echo URL; ?>Sede/uploadImage",
					type: 'POST',
					data: formData,
					contentType: false,
					processData: false,
					async: false,
					success: function(response) {
                        console.log(response);
						if (response.slice(0, 7) != "[ERROR]") {
                            loadImagesInternas();
						} else {
                            loadImagesInternas();
                        }
					}
				});
				return false;
			});

            $("#imagenesExternas").on('change', function() {				
				var formData = new FormData();
				var files = $('#imagenesExternas')[0].files[0];
				formData.append('file',files);
                formData.append('sedeid',$('#sedeid').val());
                formData.append('folder','externas');
				$.ajax({
					url: "<?php echo URL; ?>Sede/uploadImage",
					type: 'POST',
					data: formData,
					contentType: false,
					processData: false,
					async: false,
					success: function(response) {
                        console.log(response);
						if (response.slice(0, 7) != "[ERROR]") {
                            loadImagesExternas();
						} else {
                            loadImagesExternas(); 
                        }
					}
				});
				return false;
			});

            
            $("#filesCertificados").on('change', function() {				
				var formData = new FormData();
				var files = $('#filesCertificados')[0].files[0];
				formData.append('file',files);
                formData.append('sedeid',$('#sedeid').val());
                formData.append('folder','certificados');
				$.ajax({
					url: "<?php echo URL; ?>Sede/uploadCertificados",
					type: 'POST',
					data: formData,
					contentType: false,
					processData: false,
					async: false,
					success: function(response) {
                        console.log(response);
						if (response.slice(0, 7) != "[ERROR]") {
                            console.log('siiii');
                            loadFilesCertificaciones();
						} else {
                            console.log('noooo');
                        }
					}
				});
				return false;
			});

            $("#tabdatosbasicos").click(function() {
                event.preventDefault();
                $("#tabdatosbasicos").addClass("active");
                $("#rowDatosBasicos").show();
                $("#tabimagenes").removeClass("active");
                $("#tabcertificados").removeClass("active");
                $("#rowImages").hide();
                $("#rowCertificados").hide();
            });

            $("#tabimagenes").click(function() {
                event.preventDefault();
                $("#tabimagenes").addClass("active");
                $("#rowImages").show();
                $("#tabdatosbasicos").removeClass("active");
                $("#tabcertificados").removeClass("active");
                $("#rowDatosBasicos").hide();
                $("#rowCertificados").hide();
                
            });

            $("#tabcertificados").click(function() {
                event.preventDefault();
                $("#rowCertificados").addClass("active");
                $("#rowCertificados").show();
                $("#tabdatosbasicos").removeClass("active");
                $("#tabimagenes").removeClass("active");
                $("#rowDatosBasicos").hide();
                $("#rowImages").hide();
                
            });

            $("#tabdatosbasicos")[0].click();

            if($("#sedeid").val() != 0){
                loadImagesInternas();
                loadImagesExternas();
                loadFilesCertificaciones();
            }
        }
            
});
</script>