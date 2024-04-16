
<div class="container">
<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Bienvenido a Mesero Virtual!</h1>
                                
                            </div>
                            <form method="post" class="user needs-validation" novalidate>
                                <div class="form-group">
                                    <input type="text" name="usuario" id="usuario" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Usuario" required>
                                    <div class="invalid-feedback">
                                            Por favor, ingresa el usuario.
                                        </div>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="clave" id="clave" class="form-control form-control-user"  placeholder="Contraseña" required>
                                    <div class="invalid-feedback">
                                            Por favor, ingresa la contraseña.
                                        </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="empresa" id="empresa" class="form-control form-control-user"  placeholder="Empresa" required>
                                    <div class="invalid-feedback">
                                            Por favor, ingresa la empresa.
                                        </div>
                                </div>
                                <input class="btn btn-primary btn-user btn-block" type="submit" value="Entrar">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>

<!-- General Modal-->
<div class="modal fade" id="generalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Notificación</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div id="modalMessage" class="modal-body"></div>
                    <div id="modal-footer" class="modal-footer">
                        <button id="btnAceptarModal" class="btn btn-primary" type="button" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
        </div>
    </div>
    <a class="dropdown-item" id="showGeneralModal" href="#" data-toggle="modal" data-target="#generalModal" style="display:none">

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
                    var usuario = $.trim($("#usuario").val());
                    var clave = $.trim($("#clave").val());
                    var empresa = $.trim($("#empresa").val());

                    $.ajax({
                        type:"POST",
                        url: "<?php echo URL; ?>Login/signin",
                        data: {user:usuario, password:clave, empresa:empresa},
                        success: function(response){
                           if(response != 0){
                                if(response == 1){
                                    jQuery("#modalMessage").text('Usuario inactivo, póngase en contacto con el administrador por favor!');
                                    jQuery("#modalMessage").css({ 'color': 'red'});
                                    jQuery("#showGeneralModal")[0].click(); 
                                }else{
                                    
                                    window.location.href ='<?php echo URL; ?>'+response+'';
                                }
                            }else{
                                jQuery("#modalMessage").text('Usuario, contraseña ó empresa incorrecta, valida por favor!');
                                jQuery("#modalMessage").css({ 'color': 'red'});
                                jQuery("#showGeneralModal")[0].click();
                            }
                        }
                    });
                }

            }, false)
            })
})()

</script>