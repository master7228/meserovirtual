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
                <form id="bancocampanas" class="needs-validation" novalidate>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <div class="col-lg-8"><h1 class="h3 mb-0 text-gray-800">Banco de Campañas</h1></div>
                                <div class="col-lg-4 text-right">
                                    <button type="submit" id="btnNew" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Nuevo registro" disabled><i class="fas fa-file fa-sm text-white-50"></i></button>
                                    <button id="btnSend" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Guardar registro"><i class="fas fa-save fa-sm text-white-50"></i></button>
                                    <button id="btnSearch" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Buscar registros" ><i class="fas fa-search fa-sm text-white-50"></i></button>
                                </div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a id="tabDatosBasicos" class="nav-link active" aria-current="page" href="#">Datos básicos</a>
                            </li>
                            <li class="nav-item">
                                <a id="tabImagenes" class="nav-link disabled" href="#">Imágenes</a>
                            </li>
                        </ul>
                        <div id="rowDatosBasicos" class="row rowTabs" style="display:none">
                            <div class="col-md-12 d-flex">
                                <div class="col-md-4 form-group">
                                    <label for="validationCustom02" class="form-label">Categoría</label>
                                    <input type="hidden" class="form-control" id="bcid" name="bcid">
                                    <select id="bccategoria" name="bccategoria" class="form-control" required>
                                        <option value="0">Selecciona una categoría</option>
                                        <option>Electrodomésticos</option>
                                        <option>Tecnología</option>
                                        <option>Muebles</option>
                                        <option>Ropa</option>
                                        <option>Calzado</option>
                                    </select>
                                </div>
                            </div>
                            <div id="rowDatosCateogria" class="col-md-12 form-group" style="display:block">
                            </div>

                        </div>
                        <div id="rowImagenes" class="row rowTabs" style="display:none">
                            <div class="row w-100">
                                <div class="col-12">
                                    <div class="form-group w-25">
                                    <input class="form-control" type="file" id="imagesCampanas" name="imagesCampanas" accept="image/png, image/jpg, image/jpeg, image/pjpeg, image/gif">
                                    </div>
                                    <div class="card shadow mb-4">

                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Eliminar</th>
                                                        <th>Descargar</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Eliminar</th>
                                                        <th>Descargar</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody id="tbodyImages">

                                                </tbody>
                                            </table>
                                        </div>
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

   function loadImages(){
        $.ajax({
            type:"POST",
            url: "<?php echo URL; ?>BancoCampana/loadImages",
            datatype: 'JSON',
            data: {id:$('#bcid').val()},
            success: function(response){
                console.log(response);
              $("#tbodyImages").empty();
                if(response != 0){
                    data = JSON.parse(response);
                    data.forEach(element => {
                        console.log(element);
                        var urlImage = '../'+element.replace(/['"]+/g, '');
                        console.log(urlImage);
                        var arrayUrl = urlImage.split('/');
                        var dirRef = '../<?php echo LBS; ?>download.php?imagename='+arrayUrl[arrayUrl.length -1].replace(/%20/g, " ")+'&id='+$('#bcid').val();
                        $('#tbodyImages').append('<tr><td class="w-75 p-3"><a href='+urlImage+' target=_blank>'+arrayUrl[arrayUrl.length -1].replace(/%20/g, " ")+'</a></td><td class="text-center"><a onclick="eliminarImage(\''+arrayUrl[arrayUrl.length -1].replace(/%20/g, " ")+'\','+$('#bcid').val()+')"><img src="../Views/Default/img/trash.png" style="width: 32px; height: 32px;"></a></td><td class="text-center"><a href="'+dirRef+'" target=_blank><img src="../Views/Default/img/download.png" style="width: 32px; height: 32px;"></a></td><tr>');
                       
                    });
                }
            }
        });
    }

    
    function eliminarImage(fileName, id){
        event.preventDefault();
       jQuery("#modalMessage").text('Está segur@ de eliminar esta imágen!');
        jQuery("#modalMessage").css({ 'color': '#858796'});
        jQuery("#modal-footer button").remove();
        if ($("#btnCancelarModal").length === 0 ) {
            jQuery("#modal-footer").append('<button id="btnCancelarModal" class="btn btn-primary" type="button" data-dismiss="modal">Cancelar</button>');
        }
        var tempIdModal = fileName.replace(/\s+/g, '').replace(/\./g, "").replace(/-/g, "")+id;
        jQuery("#modal-footer").append('<button id="btnAceptarModal'+tempIdModal+'" class="btn btn-primary" type="button" data-dismiss="modal">Aceptar</button>');
        jQuery("#showGeneralModal")[0].click();
        jQuery('#btnAceptarModal'+tempIdModal+'').bind( "click", function() {
            $.ajax({
                url: "<?php echo URL; ?>BancoCampana/deleteImage",
                type: 'POST',
                datatype: 'JSON',
                data: {fileName: fileName, id:id},
                success: function(response) {
                    if (response == 1) {
                        loadImages();
                    } else {
                        loadImages();
                    }
                }
            });
        });
        jQuery('#btnCancelarModal').bind( "click", function() {

        });
    }

    (function () {
  'use strict'

  // Obtener todos los formularios a los que queremos aplicar estilos de validación de Bootstrap personalizados
  var forms = document.querySelectorAll('.needs-validation')

  // Bucle sobre ellos y evitar el envío
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
                    var bccategoria = $.trim($("#bccategoria").val());
                    var bcsku = $("#bcsku")[0] ? $.trim($("#bcsku").val()) : 'N/A';
                    var bcnombre = $.trim($("#bcnombre").val());
                    var bcreferencia = $("#bcreferencia")[0]?$.trim($("#bcreferencia").val()):'N/A';
                    var bcmarca = $("#bcmarca")[0]?$.trim($("#bcmarca").val()):'N/A';
                    var bcunidades = $("#bcunidades")[0]?$.trim($("#bcunidades").val()):'N/A';
                    var bcdimensiones = $("#bcdimensiones")[0]?$.trim($("#bcdimensiones").val()):'N/A';
                    var bcmedidas = $("#bcmedidas")[0]?$.trim($("#bcmedidas").val()):'N/A';
                    var bcconsumo_energetico = $("#bcconsumo_energetico")[0]?$.trim($("#bcconsumo_energetico").val()):'N/A';
                    var bclitros = $("#bclitros")[0]?$.trim($("#bclitros").val()):'N/A';
                    var bcclasificacion_energetica = $("#bcclasificacion_energetica")[0]?$.trim($("#bcclasificacion_energetica").val()):'N/A';
                    var bcaccesorios = $("#bcaccesorios")[0]?$.trim($("#bcaccesorios").val()):'N/A';
                    var bcpulgadas = $("#bcpulgadas")[0]?$.trim($("#bcpulgadas").val()):'N/A';
                    var bcprocesador = $("#bcprocesador")[0]?$.trim($("#bcprocesador").val()):'N/A';
                    var bcram = $("#bcram")[0]?$.trim($("#bcram").val()):'N/A';
                    var bccapacidad = $("#bccapacidad")[0]?$.trim($("#bccapacidad").val()):'N/A';
                    var bccamara = $("#bccamara")[0]?$.trim($("#bccamara").val()):'N/A';
                    var bcbateria = $("#bcbateria")[0]?$.trim($("#bcbateria").val()):'N/A';
                    var bcdualsim = $("#bcdualsim")[0]?$.trim($("#bcdualsim").val()):'N/A';
                    var bcsistemaOperativo = $("#bcsistemaOperativo")[0]?$.trim($("#bcsistemaOperativo").val()):'N/A';
                    var bchibrido = $("#bchibrido")[0]?$.trim($("#bchibrido").val()):'N/A';
                    var bccasacliente = $("#bccasacliente")[0]?$.trim($("#bccasacliente").val()):'N/A';
                    var bcmulticolor = $("#bcmulticolor")[0]?$.trim($("#bcmulticolor").val()):'N/A';
                    var bcfirme = $("#bcfirme")[0]?$.trim($("#bcfirme").val()):'N/A';
                    var bctalla = $("#bctalla")[0]?$.trim($("#bctalla").val()):'N/A';
                    var bcdescripcion = $("#bcdescripcion")[0]?$.trim($("#bcdescripcion").val()):'N/A';

                    $.ajax({
                        type:"POST",
                        url: "<?php echo URL; ?>BancoCampana/create",
                        datatype: 'JSON',
                        data: {bcsku:bcsku, bcnombre:bcnombre, bcreferencia:bcreferencia, bcmarca:bcmarca, bcunidades:bcunidades, bcaccesorios:bcaccesorios, bctalla:bctalla, bccategoria:bccategoria, bcdimensiones:bcdimensiones, bcmedidas:bcmedidas, bcconsumo_energetico:bcconsumo_energetico, bclitros:bclitros, bcclasificacion_energetica:bcclasificacion_energetica, bcpulgadas:bcpulgadas, bcprocesador:bcprocesador, bcram:bcram, bccapacidad:bccapacidad, bccamara:bccamara, bcbateria:bcbateria, bcdualsim:bcdualsim, bcsistemaOperativo:bcsistemaOperativo, bchibrido:bchibrido, bcfirme:bcfirme, bccasacliente:bccasacliente, bcmulticolor:bcmulticolor, bcdescripcion:bcdescripcion },
                        success: function(response){
                            console.log(response);
                            if(response != 0){
                                jQuery("#modalMessage").text('Registro creado correctamente!');
                                jQuery("#modalMessage").css({ 'color': 'green'});
                                jQuery("#showGeneralModal")[0].click();
                                jQuery('#btnAceptarModal').bind( "click", function() {
                                    $.ajax({
                                        type:"POST",
                                        url: "<?php echo URL; ?>BancoCampana/getDataOneBancoCampana",
                                        datatype: 'JSON',
                                        data: {bcnombre: $.trim($("#bcnombre").val())},
                                        success: function(response){
                                            var data = JSON.parse(response);
                                            console.log(data);
                                            $("#bcid").val(data[0][0]);
                                            $("#bcid").change();
                                            $("#tabImagenes").removeClass("disabled");
                                            $("#bcsku").prop("disabled",true);
                                            $("#bcnombre").prop("disabled",true);
                                            $("#bcreferencia").prop("disabled",true);
                                            $("#bcmarca").prop("disabled",true);
                                            $("#bcunidades").prop("disabled",true);
                                            $("#bcaccesorios").prop("disabled",true);
                                            $("#bctalla").prop("disabled",true);
                                            $("#bccategoria").prop("disabled",true);
                                            $("#bcdimensiones").prop("disabled",true);
                                            $("#bcmedidas").prop("disabled",true);
                                            $("#bcconsumo_energetico").prop("disabled",true);
                                            $("#bclitros").prop("disabled",true);
                                            $("#bcclasificacion_energetica").prop("disabled",true);
                                            $("#bcpulgadas").prop("disabled",true);
                                            $("#bcprocesador").prop("disabled",true);
                                            $("#bcram").prop("disabled",true);
                                            $("#bccapacidad").prop("disabled",true);
                                            $("#bccamara").prop("disabled",true);
                                            $("#bcbateria").prop("disabled",true);
                                            $("#bcdualsim").prop("disabled",true);
                                            $("#bcsistemaOperativo").prop("disabled",true);
                                            $("#bchibrido").prop("disabled",true);
                                            $("#bcfirme").prop("disabled",true);
                                            $("#bccasacliente").prop("disabled",true);
                                            $("#bcmulticolor").prop("disabled",true);
                                            $("#bcdescripcion").prop("disabled",true);
                                            $("#btnSend").prop("disabled",true);
                                        }
                                    });
                                });
                            }else{
                                jQuery("#modalMessage").text('Esta campaña ya existe con este nombre, valida por favor!');
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
                window.location.href = "<?php echo URL; ?>BancoCampana/list"; 
            });
            $("#btnNew").click(function() {
                event.preventDefault()
                window.location.href = "<?php echo URL; ?>BancoCampana/create"; 
            });
            
    })()

$(document).ready(function(){

    
    $("#bccategoria").on('change', function() {
        if($("#bccategoria").val() == 'Electrodomésticos'){
        }else{
            $('#rowDatosCateogria').empty();
        }

        switch ($("#bccategoria").val()) {
            case 'Electrodomésticos':
                $('#rowDatosCateogria').empty();
                $('#rowDatosCateogria').append('<div class="col-lg-12 d-flex"><div class="col-md-3 "><label for="validationCustom01" class="form-label">Nombre</label><input type="text" class="form-control" id="bcnombre" name="bcnombre" required><div class="invalid-feedback">Por favor, ingresa el nombre.</div></div><div class="col-md-3 "><label for="validationCustom01" class="form-label">Marca</label><input type="text" class="form-control" id="bcmarca" name="bcmarca" required><div class="invalid-feedback">Por favor, ingresa la marca.</div></div><div class="col-md-3 form-group"><label for="validationCustom01" class="form-label">Referencia</label><input type="text" class="form-control" id="bcreferencia" name="bcreferencia" required><div class="invalid-feedback">Por favor, ingresa la referencia.</div></div><div class="col-md-3 "><label for="validationCustom01" class="form-label">SKU</label><input type="text" class="form-control" id="bcsku" name="bcsku" required><div class="invalid-feedback">Por favor, ingresa el sku.</div></div></div><div class="col-lg-12 d-flex"><div class="col-md-3 "><label for="validationCustom01" class="form-label">Unidades</label><input type="text" class="form-control" id="bcunidades" name="bcunidades" required><div class="invalid-feedback">Por favor, ingresa las unidades.</div></div><div class="col-md-3 "><label for="validationCustom01" class="form-label">Dimensiones</label><input type="text" class="form-control" id="bcdimensiones" name="bcdimensiones" required><div class="invalid-feedback">Por favor, ingresa las dimensiones.</div></div><div class="col-md-3 form-group"><label for="validationCustom01" class="form-label">Medidas</label><input type="text" class="form-control" id="bcmedidas" name="bcmedidas" required><div class="invalid-feedback">Por favor, ingresa las medidas.</div></div><div class="col-md-3 "><label for="validationCustom01" class="form-label">Consumo energético</label><input type="text" class="form-control" id="bcconsumo_energetico" name="bcconsumo_energetico" required><div class="invalid-feedback">Por favor, ingresa el Consumo energético.</div></div></div><div class="col-lg-12 d-flex"><div class="col-md-3 "><label for="validationCustom01" class="form-label">Litros</label><input type="text" class="form-control" id="bclitros" name="bclitros" required><div class="invalid-feedback">Por favor, ingresa los litros.</div></div><div class="col-md-3 "><label for="validationCustom01" class="form-label">Clasificación energética</label><input type="text" class="form-control" id="bcclasificacion_energetica" name="bcclasificacion_energetica" required><div class="invalid-feedback">Por favor, ingresa la Clasificación energética.</div></div></div><div class="col-lg-12 d-flex"><div class="col-md-12 form-group"><label for="validationCustom02" class="form-label">Descripción</label><textarea class="form-control" id="bcdescripcion" name="bcdescripcion" rows=5></textarea></div></div>');
                break;
            
            case 'Tecnología':
                $('#rowDatosCateogria').empty();
                $('#rowDatosCateogria').append('<div class="col-lg-12 d-flex"><div class="col-md-3 "><label for="validationCustom01" class="form-label">Nombre</label><input type="text" class="form-control" id="bcnombre" name="bcnombre" required><div class="invalid-feedback">Por favor, ingresa el nombre.</div></div><div class="col-md-3 "><label for="validationCustom01" class="form-label">Marca</label><input type="text" class="form-control" id="bcmarca" name="bcmarca" required><div class="invalid-feedback">Por favor, ingresa la marca.</div></div><div class="col-md-3 form-group"><label for="validationCustom01" class="form-label">Referencia</label><input type="text" class="form-control" id="bcreferencia" name="bcreferencia" required><div class="invalid-feedback">Por favor, ingresa la referencia.</div></div><div class="col-md-3 "><label for="validationCustom01" class="form-label">SKU</label><input type="text" class="form-control" id="bcsku" name="bcsku" required><div class="invalid-feedback">Por favor, ingresa el sku.</div></div></div><div class="col-lg-12 d-flex"><div class="col-md-3 "><label for="validationCustom01" class="form-label">Unidades</label><input type="text" class="form-control" id="bcunidades" name="bcunidades" required><div class="invalid-feedback">Por favor, ingresa las unidades.</div></div><div class="col-md-3 "><label for="validationCustom01" class="form-label">Accesorios</label><input type="text" class="form-control" id="bcaccesorios" name="bcaccesorios" required><div class="invalid-feedback">Por favor, ingresa los accesorios.</div></div><div class="col-md-3 form-group"><label for="validationCustom01" class="form-label">Pulgadas</label><input type="text" class="form-control" id="bcpulgadas" name="bcpulgadas" required><div class="invalid-feedback">Por favor, ingresa las pulgadas.</div></div><div class="col-md-3 "><label for="validationCustom01" class="form-label">Procesador</label><input type="text" class="form-control" id="bcprocesador" name="bcprocesador" required><div class="invalid-feedback">Por favor, ingresa el Procesador.</div></div></div><div class="col-lg-12 d-flex"><div class="col-md-3 "><label for="validationCustom01" class="form-label">RAM</label><input type="text" class="form-control" id="bcram" name="bcram" required><div class="invalid-feedback">Por favor, ingresa lo RAM.</div></div><div class="col-md-3 "><label for="validationCustom01" class="form-label">Capacidad</label><input type="text" class="form-control" id="bccapacidad" name="bccapacidad" required><div class="invalid-feedback">Por favor, ingresa la Capacidad.</div></div><div class="col-md-3 "><label for="validationCustom01" class="form-label">Cámara</label><input type="text" class="form-control" id="bccamara" name="bccamara" required><div class="invalid-feedback">Por favor, ingresa la cámara.</div></div><div class="col-md-3 "><label for="validationCustom01" class="form-label">Batería</label><input type="text" class="form-control" id="bcbateria" name="bcbateria" required><div class="invalid-feedback">Por favor, ingresa la Batería.</div></div></div><div class="col-lg-12 d-flex"><div class="col-md-3 "><label for="validationCustom01" class="form-label">Dual Sim</label><select id="bcdualsim" name="bcdualsim" class="form-control" required><option>Si</option><option>No</option></select><div class="invalid-feedback">Por favor, ingresa si es Dual Sim.</div></div><div class="col-md-3 "><label for="validationCustom01" class="form-label">Sistema operativo</label><input type="text" class="form-control" id="bcsistemaOperativo" name="bcsistemaOperativo" required><div class="invalid-feedback">Por favor, ingresa el Sistema Operativo.</div></div></div><div class="col-lg-12 d-flex"><div class="col-md-12 form-group"><label for="validationCustom02" class="form-label">Descripción</label><textarea class="form-control" id="bcdescripcion" name="bcdescripcion" rows=5></textarea></div></div></div>');              
                break;

            case 'Muebles':
                $('#rowDatosCateogria').empty();
                $('#rowDatosCateogria').append('<div class="col-lg-12 d-flex"><div class="col-md-3 "><label for="validationCustom01" class="form-label">Nombre</label><input type="text" class="form-control" id="bcnombre" name="bcnombre" required><div class="invalid-feedback">Por favor, ingresa el nombre.</div></div><div class="col-md-3 "><label for="validationCustom01" class="form-label">Marca</label><input type="text" class="form-control" id="bcmarca" name="bcmarca" required><div class="invalid-feedback">Por favor, ingresa la marca.</div></div><div class="col-md-3 form-group"><label for="validationCustom01" class="form-label">Referencia</label><input type="text" class="form-control" id="bcreferencia" name="bcreferencia" required><div class="invalid-feedback">Por favor, ingresa la referencia.</div></div><div class="col-md-3 "><label for="validationCustom01" class="form-label">SKU</label><input type="text" class="form-control" id="bcsku" name="bcsku" required><div class="invalid-feedback">Por favor, ingresa el sku.</div></div></div><div class="col-lg-12 d-flex"><div class="col-md-3 "><label for="validationCustom01" class="form-label">Unidades</label><input type="text" class="form-control" id="bcunidades" name="bcunidades" required><div class="invalid-feedback">Por favor, ingresa las unidades.</div></div><div class="col-md-3 "><label for="validationCustom01" class="form-label">Híbrido</label><input type="text" class="form-control" id="bchibrido" name="bchibrido" required><div class="invalid-feedback">Por favor, ingresa híbrido.</div></div><div class="col-md-3 form-group"><label for="validationCustom01" class="form-label">Firme (SKU)</label><input type="text" class="form-control" id="bcfirme" name="bcfirme" required><div class="invalid-feedback">Por favor, ingresa Firme.</div></div><div class="col-md-3 "><label for="validationCustom01" class="form-label">Casa cliente (SKU)</label><input type="text" class="form-control" id="bccasacliente" name="bccasacliente" required><div class="invalid-feedback">Por favor, ingresa el Casa Cliente </div></div></div><div class="col-lg-12 d-flex"><div class="col-md-3 "><label for="validationCustom01" class="form-label">Multicolor</label><input type="text" class="form-control" id="bcmulticolor" name="bcmulticolor" required><div class="invalid-feedback">Por favor, ingresa los litros.</div></div></div><div class="col-lg-12 d-flex"><div class="col-md-12 form-group"><label for="validationCustom02" class="form-label">Descripción</label><textarea class="form-control" id="bcdescripcion" name="bcdescripcion" rows=5></textarea></div></div></div>');              
                break;
            
            case 'Ropa':
                $('#rowDatosCateogria').empty();
                $('#rowDatosCateogria').append('<div class="col-lg-12 d-flex"><div class="col-md-6"><label for="validationCustom01" class="form-label">Nombre</label><input type="text" class="form-control" id="bcnombre" name="bcnombre" required><div class="invalid-feedback">Por favor, ingresa el nombre.</div></div><div class="col-md-3 "><label for="validationCustom01" class="form-label">Marca</label><input type="text" class="form-control" id="bcmarca" name="bcmarca" required><div class="invalid-feedback">Por favor, ingresa la marca.</div></div><div class="col-md-3 form-group"><label for="validationCustom01" class="form-label">Talla</label><input type="text" class="form-control" id="bctalla" name="bctalla" required><div class="invalid-feedback">Por favor, ingresa la referencia.</div></div></div><div class="col-lg-12 d-flex"><div class="col-md-12 form-group"><label for="validationCustom02" class="form-label">Descripción</label><textarea class="form-control" id="bcdescripcion" name="bcdescripcion" rows=5></textarea></div></div>');              
                break;
            default:
                $('#rowDatosCateogria').empty();
                $('#rowDatosCateogria').append('<div class="col-lg-12 d-flex"><div class="col-md-3"><label for="validationCustom01" class="form-label">Nombre</label><input type="text" class="form-control" id="bcnombre" name="bcnombre" required><div class="invalid-feedback">Por favor, ingresa el nombre.</div></div><div class="col-md-3 "><label for="validationCustom01" class="form-label">Marca</label><input type="text" class="form-control" id="bcmarca" name="bcmarca" required><div class="invalid-feedback">Por favor, ingresa la marca.</div></div><div class="col-md-3 form-group"><label for="validationCustom01" class="form-label">Referencia</label><input type="text" class="form-control" id="bcreferencia" name="bcreferencia" required><div class="invalid-feedback">Por favor, ingresa la referencia.</div></div><div class="col-md-3 form-group"><label for="validationCustom01" class="form-label">Unidades</label><input type="text" class="form-control" id="bcunidades" name="bcunidades" required><div class="invalid-feedback">Por favor, ingresa las Unidades.</div></div></div><div class="col-lg-12 d-flex"><div class="col-md-12 form-group"><label for="validationCustom02" class="form-label">Descripción</label><textarea class="form-control" id="bcdescripcion" name="bcdescripcion" rows=5></textarea></div></div>');              
                break;
        }

    });

    $("#imagesCampanas").on('change', function() {				
        var formData = new FormData();
        var files = $('#imagesCampanas')[0].files[0];
        formData.append('file',files);
        formData.append('bcid',$('#bcid').val());
        $.ajax({
            url: "<?php echo URL; ?>BancoCampana/uploadImage",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            async: false,
            success: function(response) {
                if (response.slice(0, 7) != "[ERROR]") {
                    loadImages();
                } else {
                    console.log('noooo');
                }
            }
        });
        return false;
    });

    $("#tabDatosBasicos").click(function() {
        event.preventDefault();
        $("#tabDatosBasicos").addClass("active");
        $("#rowDatosBasicos").show();
        $("#tabImagenes").removeClass("active");
        $("#rowImagenes").hide();
    });


    $("#tabImagenes").click(function() {
        event.preventDefault();
        $("#rowImagenes").addClass("active");
        $("#rowImagenes").show();
        $("#tabDatosBasicos").removeClass("active");
        $("#rowDatosBasicos").hide();
        
        
    });

    
    $("#tabDatosBasicos")[0].click()

    if($("#bcid").val() != 0 && $("#bcid").val() != undefined){
        loadImages();
    }
            
});
</script>