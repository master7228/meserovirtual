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
                <form id="frmciudad" class="needs-validation" novalidate>
                    
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="col-lg-8"><h1 class="h3 mb-0 text-gray-800">Inventario</h1></div>
                        <div class="col-lg-4 text-right">
                            <button type="submit" id="btnNew" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Nuevo registro" disabled><i class="fas fa-file fa-sm text-white-50"></i></button>
                            <button id="btnSend" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Guardar registro"><i class="fas fa-save fa-sm text-white-50"></i></button>
                            <button id="btnSearch" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Buscar registros" ><i class="fas fa-search fa-sm text-white-50"></i></button>
                        </div>
                    </div>
                    <div class="row">
                        <?php $data = $array[0][0]; 
                        $categoria = $array[3];
                        $empresa = $array[2];
                        $bodega = $array[4];
                        $proceso = $array[5];
                        $personal = $array[1];
                        ?>
                        <div class="col-lg-12">    
                                <div class="col-md-12 d-flex ">
                                    <div class="col-md-3 form-group ">
                                        <label for="validationCustom01" class="form-label">Categoria</label>
                                        <select id="categoria" name="categoria" class="form-control" required>
                                            <option value="">Seleccione la categoria</option>
                                            <?php
                                                foreach ($categoria as $key => $value) {
                                                    if($value[0] == $data[2] ){
                                                        echo '<option value="'.$value[0].'" selected>'.utf8_encode($value[1]).'</option>'; 
                                                    }else{
                                                        echo '<option value="'.$value[0].'">'.utf8_encode($value[1]).'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Por favor, seleccione una categoria.
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group ">
                                        <label for="validationCustom01" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $data[0];  ?>" style="display:none" required>
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data[6];  ?>" required>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa el nombre.
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group ">
                                        <label for="validationCustom01" class="form-label">Placa</label>
                                        <input type="text" class="form-control" id="placa" name="placa" value="<?php echo utf8_encode($data[7]);  ?>" required>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa la placa.
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="validationCustom01" class="form-label">Serial</label>
                                        <input type="text" class="form-control" id="serial" name="serial" value="<?php echo $data[8];  ?>" required>
                                        <div class="invalid-feedback">
                                            Por favor, ingresa el serial.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex">
                                    <div class="col-md-3 form-group ">
                                        <label for="validationCustom01" class="form-label">Empresa</label>
                                        <select id="empresa" name="empresa" class="form-control" required>
                                            <option value="">Seleccione una empresa</option>
                                            <?php
                                                foreach ($empresa as $key => $value) {
                                                    if($value[0] == $data[3] ){
                                                        echo '<option value="'.$value[0].'" selected>'.utf8_encode($value[1]).'</option>'; 
                                                    }else{
                                                        echo '<option value="'.$value[0].'">'.utf8_encode($value[1]).'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Por favor, seleccione una empresa.
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group ">
                                        <label for="validationCustom01" class="form-label">Bodega</label>
                                        <select id="bodega" name="bodega" class="form-control" required>
                                            <option value="">Seleccione una bodega</option>
                                            <?php
                                                foreach ($bodega as $key => $value) {
                                                    if($value[0] == $data[4] ){
                                                        echo '<option value="'.$value[0].'" selected>'.utf8_encode($value[1]).'</option>'; 
                                                    }else{
                                                        echo '<option value="'.$value[0].'">'.utf8_encode($value[1]).'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Por favor, seleccione una bodega.
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group ">
                                        <label for="validationCustom01" class="form-label">Proceso</label>
                                        <select id="proceso" name="proceso" class="form-control" required>
                                            <option value="">Seleccione un proceso</option>
                                            <?php
                                                foreach ($proceso as $key => $value) {
                                                    if($value[0] == $data[5] ){
                                                        echo '<option value="'.$value[0].'" selected>'.utf8_encode($value[2]).'</option>'; 
                                                    }else{
                                                        echo '<option value="'.$value[0].'">'.utf8_encode($value[2]).'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Por favor, seleccione una zona.
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group ">
                                        <label for="validationCustom01" class="form-label">Responsable</label>
                                        <select id="personal" name="personal" class="form-control" required>
                                            <option value="">Seleccione un responsable</option>
                                            <?php
                                                foreach ($personal as $key => $value) {
                                                    if($value[0] == $data[1] ){
                                                        echo '<option value="'.$value[0].'" selected>'.utf8_encode($value[30]).'</option>'; 
                                                    }else{
                                                        echo '<option value="'.$value[0].'">'.utf8_encode($value[30]).'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Por favor, seleccione un responsable.
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
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                    form.classList.add('was-validated');
                }else{
                    event.preventDefault();
                    form.classList.add('was-validated');
                    var invid = $.trim($("#id").val());
                    var invidcat = $.trim($("#categoria").val());
                    var invidbod = $.trim($("#bodega").val());
                    var invidper = $.trim($("#personal").val());
                    var invidpro = $.trim($("#proceso").val());
                    var invidemp = $.trim($("#empresa").val());
                    var invnombre = $.trim($("#nombre").val());
                    var invplaca = $.trim($("#placa").val());
                    var invserial = $.trim($("#serial").val());
                    $.ajax({
                        type:"POST",
                        url: "<?php echo URL; ?>Inventario/edit",
                        data: {invid:invid, invidcat:invidcat, invidbod: invidbod, invidper:invidper, invidpro:invidpro, invidemp:invidemp,
                        invnombre:invnombre, invplaca:invplaca, invserial:invserial },
                        success: function(response){
                            if(response != 0){
                                jQuery("#modalMessage").text('Registro editado correctamente!');
                                jQuery("#modalMessage").css({ 'color': 'green'});
                                jQuery("#showGeneralModal")[0].click();
                                jQuery('#btnAceptarModal').bind( "click", function() {
                                    window.location.href = "<?php echo URL; ?>Inventario/list"; 
                                });
                            }else{
                                jQuery("#modalMessage").text('Esta placa ya existe, valida por favor!');
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
                window.location.href = "<?php echo URL; ?>Inventario/list"; 
            });
            $("#btnNew").click(function() {
                event.preventDefault();
                window.location.href = "<?php echo URL; ?>Inventario/create"; 
            });
})()

</script>