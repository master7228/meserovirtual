<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <ul class="navbar-nav ml-auto">

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
                <form id="personal" class="needs-validation" novalidate>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="col-lg-8">
                            <h1 class="h3 mb-0 text-gray-800">Crear Personal</h1>
                        </div>
                        <div class="col-lg-4 text-right">
                            <button id="btnImport" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Importar Registros" ><i class="fas fa-file-import fa-sm text-white-50"></i></button>
                            <button id="btnNew" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" disabled title="Nuevo registro"><i class="fas fa-file fa-sm text-white-50"></i></button>
                            <button id="btnSend" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Guardar registro"><i class="fas fa-save fa-sm text-white-50"></i></button>
                            <button id="btnExport" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Exportar Registros" ><i class="fas fa-file-export fa-sm text-white-50"></i></button>
                            <button id="btnSearch"class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Buscar registros" ><i class="fas fa-search fa-sm text-white-50"></i></button>
                        </div>
                    </div>
                        <!-- Content Row -->
                    <div id="rowDatosBasicos" class="row rowTabs">
                        <div class="col-lg-12 d-flex">
                            <div class="col-md-3 form-group">
                                <label for="validationCustom01" class="form-label">Primer Apellido</label>
                                <input type="text" class="form-control" id="primerapellido" name="primerapellido" onkeyup="PasarValor();" required>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el primer apellido.
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom01" class="form-label">Segundo Apellido</label>
                                    <input type="text" class="form-control" id="segundoapellido" name="segundoapellido" onkeyup="PasarValor();" value=" ">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom01" class="form-label">Primer Nombre</label>
                                <input type="text" class="form-control" id="primernombre" name="primernombre" onkeyup="PasarValor();" required>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el primer nombre.
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom01" class="form-label">Segundo Nombre</label>
                                <input type="text" class="form-control" id="segundonombre" name="segundonombre" onkeyup="PasarValor();" value=" ">
                            </div>
                            <div class="col-md-3 form-group" style="display:none">
                                <label for="validationCustom01" class="form-label">Nombre Completo</label>
                                <input type="text" class="form-control" id="nombrecompleto" name="nombrecompleto" readonly>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <div class="col-md-3 form-group">
                                <label for="validationCustom02" class="form-label">Tipo de Documento</label>
                                <select id="tipodocumento" name="tipodocumento" class="form-control" required>
                                    <option value="">Seleccione el tipo de documento</option>
                                    <?php
                                        foreach ($array[5] as $key => $value) {
                                            echo '<option value="'.$value[0].'">'.utf8_encode($value[2]).'</option>';
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, selecciona el tipo de documento.
                                </div>
                            </div>
                            <div class="col-md-3 form-group ">
                                <label for="validationCustom01" class="form-label">Numero de Documento</label>
                                <input type="text" class="form-control" id="numerodocumento" name="numerodocumento" required>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el numero de documento
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom02" class="form-label">Tipo de sangre</label>
                                <select id="tiposangre" name="tiposangre" class="form-control" required>
                                    <option value="">Seleccione el tipo de sangre</option>
                                    <?php
                                        foreach ($array[6] as $key => $value) {
                                            echo '<option value="'.$value[0].'">'.utf8_encode($value[1]).'</option>';
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el tipo de sangre
                                </div>
                            </div>
                            <div class="col-md-3 form-group ">
                                <label for="validationCustom01" class="form-label">Correo Electronico</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el correo electronico
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <div class="col-md-3 form-group">
                                <label for="validationCustom02" class="form-label">Cargo al que pertenece</label>
                                <select id="cargo" name="cargo" class="form-control" required>
                                    <option value="">Seleccione el cargo</option>
                                    <?php
                                        foreach ($array[1] as $key => $value) {
                                            echo '<option value="'.$value[0].'">'.utf8_encode($value[2]).'</option>';
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el cargo al que pertenece
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom02" class="form-label">Sede a la que pertenece</label>
                                <select id="sedenombre" name="sedenombre" class="form-control" required>
                                    <option value="">Seleccione la sede</option>
                                    <?php
                                        foreach ($array[3] as $key => $value) {
                                            echo '<option value="'.$value[0].'">'.utf8_encode($value[4]).'</option>';
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa la sede a la que pertenece
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom02" class="form-label">Nomina</label>
                                <select id="nomina" name="nomina" class="form-control" required>
                                    <option value="">Seleccione la nomina</option>
                                    <?php
                                        foreach ($array[8] as $key => $value) {
                                            echo '<option value="'.$value[0].'">'.utf8_encode($value[1]).'</option>';
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa la nomina a la que pertenece
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom02" class="form-label">Contrato</label>
                                <select id="contrato" name="contrato" class="form-control" required>
                                    <option value="">Seleccione el Contrato</option>
                                    <?php
                                        foreach ($array[11] as $key => $value) {
                                            echo '<option value="'.$value[0].'">'.utf8_encode($value[1]).'</option>';
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el Contrato
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <div class="col-md-3 form-group">
                                <label for="validationCustom01" class="form-label">Jefe Inmediato</label>
                                <select id="jefeinmediato" name="jefeinmediato" class="form-control" required>
                                    <option value="">Seleccione el jefe inmediato</option>
                                    <?php
                                        foreach ($array[7] as $key => $value) {
                                            echo '<option value="'.$value[0].'">'.utf8_encode($value[30]).'</option>';
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el jefe inmediato
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom02" class="form-label">Proceso al que pertenece</label>
                                <select id="proceso" name="proceso" class="form-control" required>
                                    <option value="">Seleccione el proceso</option>
                                    <?php
                                        foreach ($array[4] as $key => $value) {
                                            echo '<option value="'.$value[0].'">'.utf8_encode($value[2]).'</option>';
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el proceso al que pertenece
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom02" class="form-label">Empresa a la que pertenece</label>
                                <select id="empresa" name="empresa" class="form-control" required>
                                    <option value="">Seleccione la empresa</option>
                                    <?php
                                        foreach ($array[2] as $key => $value) {
                                            echo '<option value="'.$value[0].'">'.utf8_encode($value[1]).'</option>';
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa la empresa a la que pertenece
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom02" class="form-label">Estado</label>
                                <select id="estado" name="estado" class="form-control" required>
                                    <option value="">Seleccione el estado</option>
                                    <?php
                                        foreach ($array[0] as $key => $value) {
                                            echo '<option value="'.$value[0].'">'.utf8_encode($value[1]).'</option>';
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el estado
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <div class="col-md-3 form-group">
                                <label for="validationCustom01" class="form-label">Ciudad</label>
                                <select id="ciudad" name="ciudad" class="form-control" required>
                                    <option value="">Seleccione la Ciudad</option>
                                    <?php
                                        foreach ($array[16] as $key => $value) {
                                            echo '<option value="'.$value[0].'">'.utf8_encode($value[2]).'</option>';
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa la Ciudad
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom01" class="form-label">Departamento</label>
                                <select id="departamento" name="departamento" class="form-control" required>
                                    <option value="">Seleccione el Departamento</option>
                                    <?php
                                        foreach ($array[17] as $key => $value) {
                                            echo '<option value="'.$value[0].'">'.utf8_encode($value[2]).'</option>';
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el Departamento
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom01" class="form-label">Direccion Empleado</label>
                                <input type="text" class="form-control" id="direccionempleado" name="direccionempleado" required>
                                <div class="invalid-feedback">
                                    Por favor, ingresa la Direccion del empleado.
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom01" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento">
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <div class="col-md-3 form-group">
                                <label for="validationCustom02" class="form-label">Sexo con el que se identifica</label>
                                <select id="sexo" name="sexo" class="form-control" required>
                                    <option value="">Seleccione el sexo</option>
                                    <option value="MASCULINO">MASCULINO</option>
                                    <option value="FEMENINO">FEMENINO</option>
                                    <option value="OTRO">OTRO</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el sexo con el que se identifica
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom01" class="form-label">Celular</label>
                                <input type="number" class="form-control" id="celular" name="celular" min="0" required>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el numero de celular
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom01" class="form-label">Telefono</label>
                                <input type="number" class="form-control" id="telefono" name="telefono" min="0">
                                <div class="invalid-feedback">
                                    Por favor, ingresa el numero de telefono
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom02" class="form-label">EPS</label>
                                <select id="eps" name=eps" class="form-control" required>
                                    <option value="">Seleccione la EPS</option>
                                    <?php
                                        foreach ($array[12] as $key => $value) {
                                            echo '<option value="'.$value[0].'">'.utf8_encode($value[1]).'</option>';
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa la EPS
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <div class="col-md-3 form-group">
                                <label for="validationCustom02" class="form-label">AFP</label>
                                <select id="afp" name="afp" class="form-control" required>
                                    <option value="">Seleccione el AFP</option>
                                    <?php
                                        foreach ($array[13] as $key => $value) {
                                            echo '<option value="'.$value[0].'">'.utf8_encode($value[1]).'</option>';
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el AFP
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom02" class="form-label">Caja de Compensacion</label>
                                <select id="cajacomp" name="cajacomp" class="form-control" required>
                                    <option value="">Seleccione la Caja de Compensacion</option>
                                    <?php
                                        foreach ($array[14] as $key => $value) {
                                            echo '<option value="'.$value[0].'">'.utf8_encode($value[1]).'</option>';
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa la Caja de Compensacion
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom02" class="form-label">Fondo de Cesantias</label>
                                <select id="fondocesa" name="fondocesa" class="form-control" required>
                                    <option value="">Seleccione el Fondo de Cesantias</option>
                                    <?php
                                        foreach ($array[15] as $key => $value) {
                                            echo '<option value="'.$value[0].'">'.utf8_encode($value[1]).'</option>';
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el Fondo de Cesantias
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom01" class="form-label">Talla Camisa</label>
                                <select id="tcamisa" name="tcamisa" class="form-control" required>
                                    <option value="">Seleccione la Talla</option>
                                    <option value="XXS">XXS</option>
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa la talla de la Camisa.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <div class="col-md-3 form-group">
                                <label for="validationCustom01" class="form-label">Talla Pantalon</label>
                                <select id="tpantalon" name="tpantalon" class="form-control" required>
                                    <option value="">Seleccione la Talla</option>
                                    <option value="XXS">XXS</option>
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa la talla del Pantalon.
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom01" class="form-label">Talla Zapatos</label>
                                <select id="tzapatos" name="tzapatos" class="form-control" required>
                                    <option value="">Seleccione la Talla</option>
                                    <option value="US 5">US 5</option>
                                    <option value="US 5.5">US 5.5</option>
                                    <option value="US 6">US 6</option>
                                    <option value="US 6.5">US 6.5</option>
                                    <option value="US 7">US 7</option>
                                    <option value="US 7.5">US 7.5</option>
                                    <option value="US 8">US 8</option>
                                    <option value="US 8.5">US 8.5</option>
                                    <option value="US 9">US 9</option>
                                    <option value="US 9.5">US 9.5</option>
                                    <option value="US 10">US 10</option>
                                    <option value="US 10.5">US 10.5</option>
                                    <option value="US 11">US 11</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa la talla de los Zapatos.
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom01" class="form-label">Fecha de Ingreso</label>
                                <input type="date" class="form-control" id="fechaingreso" name="fechaingreso" required>
                                <div class="invalid-feedback">
                                    Por favor, ingresa la fecha de ingreso
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom01" class="form-label">Fecha de Retiro</label>
                                <input type="date" class="form-control" id="fecharetiro" name="fecharetiro">
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <div class="col-md-3 form-group">
                                <label for="validationCustom01" class="form-label">Fecha Fin contrato</label>
                                <input type="date" class="form-control" id="fechafinc" name="fechafinc" required>
                                <div class="invalid-feedback">
                                    Por favor, ingresa la Fecha de Finalizacion del Contrato.
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom02" class="form-label">Area Funcional</label>
                                <select id="areafun" name="areafun" class="form-control" required>
                                    <option value="">Seleccione el Area Funcional</option>
                                    <?php
                                        foreach ($array[10] as $key => $value) {
                                            echo '<option value="'.$value[0].'">'.utf8_encode($value[3]).'</option>';
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el Area Funcional
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom02" class="form-label">Centro de Costos</label>
                                <select id="ccostos" name="ccostos" class="form-control" required>
                                    <option value="">Seleccione el centro de costos</option>
                                    <?php
                                        foreach ($array[9] as $key => $value) {
                                            echo '<option value="'.$value[0].'">'.utf8_encode($value[1]).'</option>';
                                        }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el centro de costos
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom01" class="form-label">Nombre Parentesco</label>
                                <input type="text" class="form-control" id="nombreparent" name="nombreparent" required>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el nombre de un parentesco.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <div class="col-md-3 form-group">
                                <label for="validationCustom01" class="form-label">Direccion Parentesco</label>
                                <input type="text" class="form-control" id="direcparent" name="direcparent" required>
                                <div class="invalid-feedback">
                                    Por favor, ingresa la Direccion Parentesco.
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="validationCustom01" class="form-label">Telefono Parentesco</label>
                                <input type="text" class="form-control" id="telparent" name="telparent"  min="0" required>
                                <div class="invalid-feedback">
                                    Por favor, ingresa el Telefono Parentesco.
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
                     
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Startup Mesero Virtual 2023</span>
                </div>
            </div>
        </footer>

    </div>
</div>
<!-- End of Content Wrapper -->

<script>
    function PasarValor(){
        document.getElementById("nombrecompleto").value = document.getElementById("primerapellido").value+' '+document.getElementById("segundoapellido").value+' '+document.getElementById("primernombre").value+' '+document.getElementById("segundonombre").value;
    }

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
                    
                    var primer_apellido = $.trim($("#primerapellido").val()); //OK
                    var segundo_apellido = $.trim($("#segundoapellido").val()); //OK
                    var primer_nombre = $.trim($("#primernombre").val()); //OK
                    var segundo_nombre = $.trim($("#segundonombre").val()); //OK
                    var nombre_completo = $.trim($("#nombrecompleto").val()); //OK

                    var id_tipo_documento = $.trim($("#tipodocumento").val()); //OK
                    var numero_documento = $.trim($("#numerodocumento").val()); //OK
                    var id_tipo_sangre = $.trim($("#tiposangre").val()); //OK
                    var email = $.trim($("#email").val()); //OK

                    var id_cargo = $.trim($("#cargo").val()); //OK
                    var id_sede = $.trim($("#sedenombre").val()); //OK
                    var id_nomina = $.trim($("#nomina").val()); //OK
                    var id_contrato = $.trim($("#contrato").val()); //OK

                    var id_jefe_inmediato = $.trim($("#jefeinmediato").val()); //OK
                    var id_proceso = $.trim($("#proceso").val()); //OK
                    var id_empresa = $.trim($("#empresa").val()); //OK
                    var id_estado = $.trim($("#estado").val()); //OK

                    var id_ciudad = $.trim($("#ciudad").val()); //OK
                    var id_departamento = $.trim($("#departamento").val()); //OK
                    var direccion = $.trim($("#direccionempleado").val()); //OK
                    var fecha_nacimiento = $.trim($("#fechanacimiento").val()); //OK

                    var sexo = $.trim($("#sexo").val()); //OK
                    var celular = $.trim($("#celular").val()); //OK
                    var telefono = $.trim($("#telefono").val()); //OK
                    var id_eps = $.trim($("#eps").val()); //OK
                    
                    var id_afp = $.trim($("#afp").val()); //OK
                    var id_caja_compensacion = $.trim($("#cajacomp").val()); //OK
                    var id_fondo_cesantias = $.trim($("#fondocesa").val()); //OK
                    var talla_camisa = $.trim($("#tcamisa").val()); //OK

                    var talla_pantalon = $.trim($("#tpantalon").val()); //OK
                    var talla_zapatos = $.trim($("#tzapatos").val()); //OK
                    var fecha_ingreso = $.trim($("#fechaingreso").val()); //OK
                    var fecha_retiro = $.trim($("#fecharetiro").val()); //OK

                    var fecha_fin_contrato = $.trim($("#fechafinc").val()); //OK
                    var id_area_funcional = $.trim($("#areafun").val()); //OK
                    var id_centro_costos = $.trim($("#ccostos").val()); //OK
                    var parentesco = $.trim($("#nombreparent").val()); //OK

                    var direccion_parentesco = $.trim($("#direcparent").val()); //OK
                    var telefono_parentesco = $.trim($("#telparent").val()); //OK

                    $.ajax({
                        type:"POST",
                        url: "<?php echo URL; ?>Personal/create",
                        data: {
                            id_estado:id_estado,
                            id_cargo:id_cargo,
                            id_centro_costos:id_centro_costos,
                            id_empresa:id_empresa,
                            id_sede:id_sede,
                            id_proceso:id_proceso,
                            id_tipo_documento:id_tipo_documento,
                            id_tipo_sangre:id_tipo_sangre,
                            id_nomina:id_nomina,
                            id_area_funcional:id_area_funcional,
                            id_contrato:id_contrato,
                            id_jefe_inmediato:id_jefe_inmediato,
                            id_ciudad:id_ciudad,
                            id_departamento:id_departamento,
                            id_eps:id_eps,
                            id_afp:id_afp,
                            id_caja_compensacion:id_caja_compensacion,
                            id_fondo_cesantias:id_fondo_cesantias,
                            nombre_parentesco:parentesco,
                            direccion_parentesco:direccion_parentesco,
                            telefono_parentesco:telefono_parentesco,
                            primer_apellido:primer_apellido,
                            segundo_apellido:segundo_apellido,
                            primer_nombre:primer_nombre,
                            segundo_nombre:segundo_nombre,
                            nombre_completo:nombre_completo,
                            numero_documento:numero_documento,
                            sexo:sexo,
                            email:email,
                            telefono:telefono,
                            celular:celular,
                            fecha_nacimiento:fecha_nacimiento,
                            direccion:direccion,
                            talla_camisa:talla_camisa,
                            talla_pantalon:talla_pantalon,
                            talla_zapatos:talla_zapatos,
                            fecha_ingreso:fecha_ingreso,
                            fecha_fin_contrato:fecha_fin_contrato,
                            fecha_retiro:fecha_retiro 
                        },
                        success: function(response){
                            console.log(response);
                           if(response != 0){
                                jQuery("#modalMessage").text('Registro creado correctamente!');
                                jQuery("#modalMessage").css({ 'color': 'green'});
                                jQuery("#showGeneralModal")[0].click();
                                jQuery('#btnAceptarModal').bind( "click", function() {
                                    window.location.href = "<?php echo URL; ?>Personal/list"; 
                                });
                            }else{
                                jQuery("#modalMessage").text('Este personal ya existe con este documento, valida por favor!');
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
                window.location.href = "<?php echo URL; ?>Personal/list"; 
            });
            $("#btnImport").click(function() {
                event.preventDefault();
                window.location.href = "<?php echo URL; ?>Personal/import"; 
            });
            $("#btnNew").click(function() {
                event.preventDefault();
                window.location.href = "<?php echo URL; ?>Personal/create"; 
            });
            $("#btnExport").click(function(){
                event.preventDefault();		
                window.location.href = "<?php echo URL; ?>Personal/exportFile"; 
            });
})()

</script>