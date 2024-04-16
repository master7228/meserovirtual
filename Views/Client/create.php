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
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php //echo $datosUser[0]; ?></span>
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
                <form id="frmclients" class="needs-validation" novalidate>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="col-lg-8"><h1 class="h3 mb-0 text-gray-800">Crear Cliente</h1></div>
                        <div class="col-lg-4 text-right">
                            <button type="submit" id="btnNew" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Nuevo registro" disabled><i class="fas fa-file fa-sm text-white-50"></i></button>
                            <button id="btnSend" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Guardar registro"><i class="fas fa-save fa-sm text-white-50"></i></button>
                            <button id="btnSearch" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Buscar registros" ><i class="fas fa-search fa-sm text-white-50"></i></button>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12 d-flex"><h5 class="h5">Datos del cliente</h5></div>
                        <div class="col-lg-12">
                            
                                <div class="col-md-12 d-flex ">
                                    <div class="col-md-4 form-group ">
                                        <label for="validationCustom01" class="form-label">Razón Social</label>
                                        <input type="text" class="form-control" id="business_name" name="business_name" required>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa la razón social.
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group ">
                                        <label for="validationCustom01" class="form-label">Nit</label>
                                        <input type="text" class="form-control" id="nit" name="nit" required>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa el nit.
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group ">
                                        <label for="validationCustom01" class="form-label">Correo</label>
                                        <input type="text" class="form-control" id="email" name="email" required>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa el correo.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex">
                                    <div class="col-md-4 form-group ">
                                        <label for="validationCustom01" class="form-label">Nombre Representante Legal</label>
                                        <input type="text" class="form-control" id="legal_representative_name" name="legal_representative_name" required>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa el nombre del presentante legal.
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group ">
                                        <label for="validationCustom01" class="form-label">Apellidos Representante Legal </label>
                                        <input type="text" class="form-control" id="legal_representative_lastname" name="legal_representative_lastname" required>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa el apellido del representante legal.
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group ">
                                        <label for="validationCustom01" class="form-label">Dirección</label>
                                        <input type="text" class="form-control" id="address" name="address" required>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa el nombre.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex ">
                                    <div class="col-md-4 form-group ">
                                        <label for="validationCustom01" class="form-label">Teléfono</label>
                                        <input type="text" class="form-control" id="phone" name="phone" required>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa el nombre del presentante legal.
                                        </div>
                                    </div>
                                </div>
                                <hr class="hr hr-blurry" />
                                <div class="col-md-12 d-flex"><h5 class="h5">Datos del usuario</h5></div>
                                <div class="col-md-12 d-flex">
                                    <div class="col-md-4 form-group ">
                                        <label for="validationCustom01" class="form-label">Nombre Usuario</label>
                                        <input type="text" class="form-control" id="nameuser" name="nameuser" required>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa el nombre del Usuario.
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group ">
                                        <label for="validationCustom01" class="form-label">Apellidos Usuario </label>
                                        <input type="text" class="form-control" id="lastnameuser" name="lastnameuser" required>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa los apellidos del Usuario.
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group ">
                                        <label for="validationCustom01" class="form-label">Nombre empresa login</label>
                                        <input type="text" class="form-control" id="namelogin" name="namelogin" readonly>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa el nombre.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex ">
                                <div class="col-md-4 form-group ">
                                        <label for="validationCustom01" class="form-label">Usuario </label>
                                        <input type="text" class="form-control" id="user" name="user" required>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa el Usuario.
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group ">
                                        <label for="validationCustom01" class="form-label">Contraseña</label>
                                        <input type="text" class="form-control" id="password" name="password" required>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa la contraseña.
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group ">
                                        <label for="validationCustom01" class="form-label">Base de datos</label>
                                        <input type="text" class="form-control" id="db" name="db" readonly>
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
  var forms = document.querySelectorAll('.needs-validation')
  Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    console.log(form.checkValidity());
                    event.preventDefault()
                    event.stopPropagation()
                    form.classList.add('was-validated')
                }else{
                    event.preventDefault()
                    
                    form.classList.add('was-validated')
                    var business_name = $.trim($("#business_name").val());
                    var nit = $.trim($("#nit").val());
                    var email = $.trim($("#email").val());
                    var legal_representative_name = $.trim($("#legal_representative_name").val());
                    var legal_representative_lastname = $.trim($("#legal_representative_lastname").val());
                    var address = $.trim($("#address").val());
                    var phone = $.trim($("#phone").val());
                    var nameuser = $.trim($("#nameuser").val());
                    var lastnameuser = $.trim($("#lastnameuser").val());
                    var namelogin = $.trim($("#namelogin").val());
                    var user = $.trim($("#user").val());
                    var password = $.trim($("#password").val());
                    var db = $.trim($("#db").val());


                    $.ajax({
                        type:"POST",
                        url: "<?php echo URL; ?>Client/create",
                        data: {
                            business_name: business_name, 
                            nit:nit, 
                            email:email,
                            legal_representative_name:legal_representative_name,
                            legal_representative_lastname:legal_representative_lastname,
                            address:address,
                            phone:phone,
                            nameuser:nameuser,
                            lastnameuser:lastnameuser,
                            namelogin:namelogin,
                            user:user,
                            password:password,
                            db:db},
                        success: function(response){
                            console.log(response);
                            /*if(response != 0){
                                jQuery("#modalMessage").text('Registro creado correctamente!');
                                jQuery("#modalMessage").css({ 'color': 'green'});
                                jQuery("#showGeneralModal")[0].click();
                                jQuery('#btnAceptarModal').bind( "click", function() {
                                    window.location.href = "<?php echo URL; ?>Client/list"; 
                                });
                            }else{
                                jQuery("#modalMessage").text('Esta zona ya existe con este código, valida por favor!');
                                jQuery("#modalMessage").css({ 'color': 'red'});
                                jQuery("#showGeneralModal")[0].click();
                            }*/
                        }
                    });
                }
                
            }, false)
            })

            $("#btnSearch").click(function() {
                event.preventDefault();
                window.location.href = "<?php echo URL; ?>Client/list"; 
            });
            $("#btnNew").click(function() {
                event.preventDefault();
                window.location.href = "<?php echo URL; ?>Client/create"; 
            });

            $("#nit").change(function(){
                $("#db").val($("#nit").val().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, ''));
            })
            $("#business_name").change(function(){
                $("#namelogin").val($("#business_name").val().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '').toLowerCase().trim());
            })
})()

</script>