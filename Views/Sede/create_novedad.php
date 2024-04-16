<script>


function selectYes(div, textarea){
    textarea.setAttribute('required',true);
    div.style.display="block";
}
function selectNo(div,textarea){
    textarea.value="";
    textarea.removeAttribute('required')
    div.style.display="none";
}
</script>

<style>
    #spinner-div {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  text-align: center;
  background-color: rgba(255, 255, 255, 0.8);
  z-index: 2;
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
            <?php if(!is_array($array[0]) && $array[0] == 2){ ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-md-12 ">
                            <h3>!Upss!, No tienes permisos para ingresar a este módulo, ponte en contacto con el administrador del sistema!</h3>
                        </div>
                    </div>
                </div>
            <?php }else{ 
                $sedes = $array[0];
                $directorio = $array[1];
                ?>


                <form id="frmnovedadessede" class="needs-validation" novalidate>
                
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="col-lg-8"><h1 class="h3 mb-0 text-gray-800">Novedades Sedes</h1></div>
                        <div class="col-lg-4 text-right">
                            <button type="submit" id="btnNew" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Nuevo registro" disabled><i class="fas fa-file fa-sm text-white-50"></i></button>
                            <button id="btnSend" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Guardar registro"><i class="fas fa-save fa-sm text-white-50"></i></button>
                            <button id="btnSearch" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" title="Buscar registros" ><i class="fas fa-search fa-sm text-white-50"></i></button>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-md-12 ">
                                                <div class="col-md-12 form-group ">
                                                    <h3>Selecciona si ó no presenta alguna novedad con los siguientes items.</h3>
                                                </div>
                            </div>
                            <input type="hidden" id="contDirectorio" name="contDirectorio" value="<?php echo count($directorio); ?>">
                            <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION["datauser"]->id; ?>">
                            <div class="col-md-12 d-flex" style="margin-bottom:50px !important">
                                <div class="col-md-4 form-group">
                                    <h4>Sede</h4>
                                    <select id="id_sede" name="id_sede" class="form-control" required>
                                        <option value="">Selecciona una sede</option>
                                        <?php
                                            for ($x=0; $x <count($sedes) ; $x++) { 
                                                echo '<option value="'.$sedes[$x][0].'">'.$sedes[$x][4].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <?php for ($i=0; $i < count($directorio) ; $i++) { 
                                
                             
                            
                            echo '<div class="col-md-12" >
                                            <div class="col-md-12 form-group d-inline-flex">
                                                <div class="form-check col-md-4">
                                                    <h5>'.$directorio[$i][1].'</h5>
                                                </div>
                                                <div class="form-check col-md-2">
                                                    <input class="form-check-input" type="radio" value="1"   name="directorio'.$directorio[$i][0].'" id="si'.$directorio[$i][0].'" onclick="selectYes(divdescripcion'.$directorio[$i][0].',descripcion'.$directorio[$i][0].' )" required>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Malo
                                                    </label>
                                                </div>
                                                <div class="form-check col-md-2">
                                                    <input class="form-check-input" type="radio" value="0" name="directorio'.$directorio[$i][0].'" id="no'.$directorio[$i][0].'" onclick="selectNo(divdescripcion'.$directorio[$i][0].',descripcion'.$directorio[$i][0].' )" required checked>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Bueno
                                                    </label>
                                                    <div class="invalid-feedback">
                                                        Por favor, selecciona una opción.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 ">
                                                <div class="col-md-12 form-group" id="divdescripcion'.$directorio[$i][0].'" style="display:none">
                                                    <label for="validationCustom02" class="form-label">Descripción</label>
                                                    <textarea class="form-control" id="descripcion'.$directorio[$i][0].'" name="descripcion'.$directorio[$i][0].'" cols="100" rows="5"></textarea>
                                                </div>
                                            </div>
                                    </div>';
                                echo '<hr />'; 
                                 } ?>
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


<div id="spinner-div" class="pt-5">
    <div class="spinner-border text-primary" role="status">
        
    </div>
    Enviando reporte!
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
                    console.log(form.checkValidity());
                    event.preventDefault()
                    event.stopPropagation()
                    form.classList.add('was-validated')
                }else{
                    event.preventDefault()
                    form.classList.add('was-validated')
                    let fd = document.getElementById("frmnovedadessede");
                    $('#spinner-div').show();
                    $.ajax({
                        type:"POST",
                        url: "<?php echo URL; ?>Sede/create_novedad",
                        data: $(this).serializeArray(),
                        success: function(response){
                            if(response != 0){
                               $('#spinner-div').hide();
                                jQuery("#modalMessage").text('Reporte de novedad generado correctamente!');
                                jQuery("#modalMessage").css({ 'color': 'green'});
                                jQuery("#showGeneralModal")[0].click();
                                jQuery('#btnAceptarModal').bind( "click", function() {
                                    window.location.href = "<?php echo URL; ?>Sede/list_novedades"; 
                                });
                            }else{
                                jQuery("#modalMessage").text('No se pudo crear la novedad, valida por favor!');
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
                window.location.href = "<?php echo URL; ?>Sede/list_novedades"; 
            });
            $("#btnNew").click(function() {
                event.preventDefault();
                window.location.href = "<?php echo URL; ?>Bodega/create_novedades"; 
            });
})()

</script>