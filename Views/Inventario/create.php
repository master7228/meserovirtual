<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <ul class="navbar-nav ml-auto">
                <div class="topbar-divider d-none d-sm-block"></div>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            <?php echo $datosUser[0]; ?>
                        </span>
                        <img class="img-profile rounded-circle"
                            src="<?php echo URL . VIEWS . DTF; ?>img/undraw_profile.svg">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Salir
                        </a>
                        <a class="dropdown-item" id="showGeneralModal" href="#" data-toggle="modal"
                            data-target="#generalModal" style="display:none">
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
                        <div class="col-lg-8">
                            <h1 class="h3 mb-0 text-gray-800">Inventarios</h1>
                        </div>
                        <div class="col-lg-4 text-right">
                            <button type="submit" id="btnNew"
                                class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Nuevo registro"
                                disabled><i class="fas fa-file fa-sm text-white-50"></i></button>
                            <button id="btnSend" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm"
                                title="Guardar registro"><i class="fas fa-save fa-sm text-white-50"></i></button>
                            <button id="btnSearch" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm"
                                title="Buscar registros"><i class="fas fa-search fa-sm text-white-50"></i></button>
                        </div>
                    </div>
                    <div id="rowDatosBasicos" class="row rowTabs">
                        <div class="col-lg-12 d-flex">
                            <div class="col-md-3 form-group ">
                                <label for="validationCustom01" class="form-label">Categoria</label>
                                <select id="invidcat" name="invidcat" class="form-control" required>
                                    <option value="">Seleccione la categoria</option>
                                    <?php
                                    foreach ($array[3] as $key => $value) {
                                        echo '<option value="' . $value[0] . '">' . utf8_encode($value[1]) . '</option>';
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, selecciona una categoria.
                                </div>
                            </div>
                            <div class="col-md-3 form-group ">
                                <label for="validationCustom01" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="invnombre" name="invnombre" required>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el nombre.
                                </div>
                            </div>
                            <div class="col-md-3 form-group ">
                                <label for="validationCustom01" class="form-label">Placa</label>
                                <input type="text" class="form-control" id="invplaca" name="invplaca" required>
                                <div class="invalid-feedback">
                                    Por favor, ingresa la placa.
                                </div>
                            </div>
                            <div class="col-md-3 form-group ">
                                <label for="validationCustom01" class="form-label">Serial</label>
                                <input type="text" class="form-control" id="invserial" name="invserial" required>
                                <div class="invalid-feedback">
                                    Por favor, ingrese el serial.
                                </div>
                            </div>
                        </div>
            <div class="col-lg-12 d-flex">
                <div class="col-md-3 form-group ">
                    <label for="validationCustom01" class="form-label">Empresa</label>
                    <select id="invidemp" name="invidemp" class="form-control" required>
                        <option value="">Seleccione la empresa</option>
                        <?php
                        foreach ($array[2] as $key => $value) {
                            echo '<option value="' . $value[0] . '">' . utf8_encode($value[1]) . '</option>';
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        Por favor, selecciona una empresa.
                    </div>
                </div>
                <div class="col-md-3 form-group ">
                    <label for="validationCustom01" class="form-label">Bodega</label>
                    <select id="invidbod" name="invidbod" class="form-control" required>
                        <option value="">Seleccione la bodega</option>
                        <?php
                        foreach ($array[4] as $key => $value) {
                            echo '<option value="' . $value[0] . '">' . utf8_encode($value[1]) . '</option>';
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        Por favor, selecciona una bodega.
                    </div>
                </div>
                <div class="col-md-3 form-group ">
                    <label for="validationCustom01" class="form-label">Proceso</label>
                    <select id="invidpro" name="invidpro" class="form-control" required>
                        <option value="">Seleccione un proceso</option>
                        <?php
                        foreach ($array[5] as $key => $value) {
                            echo '<option value="' . $value[0] . '">' . utf8_encode($value[2]) . '</option>';
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        Por favor, selecciona un proceso.
                    </div>
                </div>
                <div class="col-md-3 form-group ">
                    <label for="validationCustom01" class="form-label">Responsable</label>
                    <select id="invidper" name="invidper" class="form-control" required>
                        <option value="">Seleccione a un responsable</option>
                        <?php
                        foreach ($array[1] as $key => $value) {
                            echo '<option value="' . $value[0] . '">' . utf8_encode($value[30]) . '</option>';
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        Por favor, selecciona a un responsable.
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
                    } else {
                        event.preventDefault();
                        form.classList.add('was-validated');
                        var invidper = $.trim($("#invidper").val());
                        var invidemp = $.trim($("#invidemp").val());
                        var invidcat = $.trim($("#invidcat").val());
                        var invidbod = $.trim($("#invidbod").val());
                        var invidpro = $.trim($("#invidpro").val());
                        var invnombre = $.trim($("#invnombre").val());
                        var invplaca = $.trim($("#invplaca").val());
                        var invserial = $.trim($("#invserial").val());

                        $.ajax({
                            type: "POST",
                            url: "<?php echo URL; ?>Inventario/create",
                            data: { invidper: invidper, invidemp: invidemp, invidcat: invidcat, invidbod: invidbod, invidpro: invidpro, invnombre: invnombre, invplaca: invplaca, invserial: invserial},
                            success: function (response) {
                                console.log(response);
                                if (response != 0) {
                                    jQuery("#modalMessage").text('Registro creado correctamente!');
                                    jQuery("#modalMessage").css({ 'color': 'green' });
                                    jQuery("#showGeneralModal")[0].click();
                                    jQuery('#btnAceptarModal').bind("click", function () {
                                        window.location.href = "<?php echo URL; ?>Inventario/list";
                                    });
                                } else {
                                    jQuery("#modalMessage").text('Esta placa ya existe, valida por favor!');
                                    jQuery("#modalMessage").css({ 'color': 'red' });
                                    jQuery("#showGeneralModal")[0].click();
                                }
                            }
                        });
                    }

                }, false)
            })

        $("#btnSearch").click(function () { 
            event.preventDefault();
            window.location.href = "<?php echo URL; ?>Inventario/list";
        });
        $("#btnNew").click(function () {
            event.preventDefault();
            window.location.href = "<?php echo URL; ?>Inventario/create";
        });
    })()

</script>