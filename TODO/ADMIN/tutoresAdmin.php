<?php
    include '../../TODO/conexion.php';
    $selectTutor = "SELECT CONCAT(Nombre,' ',Ap_Paterno,' ',Ap_Materno) AS nombreTutor FROM tutor"; 
    $resultTutor = mysqli_query($conexion, $selectTutor);
    $selectAlumno = "SELECT  CONCAT(Nombre,' ',Ap_Paterno,' ',Ap_Materno) AS nombreAlumno FROM alumno";
    $resultAlumno = mysqli_query($conexion, $selectAlumno);
    $message = '';
    if(isset($_POST['submit'])){
        $tutor  = $_POST['tutor']; // aquí guardo Jesús Guijarro Lira        
        //$idTutor = "SELECT idTutor FROM tutor WHERE CONCAT(Nombre,' ',Ap_Paterno,' ',Ap_Materno)=".$tutor; 
        $alumno = $_POST['alumno']; // aquí guardo Pedro Games Gamer 
        //$idAlumno = "SELECT idAlumno FROM alumno WHERE CONCAT(Nombre,' ',Ap_Paterno,' ',Ap_Materno)=".$alumno;
        //insertamos los datos a la bd
        $insert = 'INSERT INTO prueba(tutor,alumno) VALUES("'.$tutor.'","'.$alumno.'")'; 
        if(mysqli_query($conexion, $insert)){
            $message = "Todo bien pa";
        }else{
            $message = "ERROR con $insert.".mysqi_error($conexion);
        }
        // cerramos la conexión
        mysqli_close($conexion);
    }
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Tutores</title>
    
  <!-- theme meta -->
  <meta name="theme-name" content="mono" />

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="../../theme/plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="../../theme/plugins/simplebar/simplebar.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="../../theme/plugins/nprogress/nprogress.css" rel="stylesheet" />
  
  <link href="../../theme/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css" rel="stylesheet" />
  
  <link href="../../theme/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  
  <link href="../../theme/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
  
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  
  <link href="../../theme/plugins/toaster/toastr.min.css" rel="stylesheet" />
  
  <!-- MONO CSS -->
  <link id="main-css-href" rel="stylesheet" href="../../theme/css/style.css" />
 <!-- ICONO DE LA BARRA -->
 <link href="../../TODO/img/logo2.png" rel="shortcut icon" />

  <script src="../../theme/plugins/nprogress/nprogress.js"></script>
</head>

  <body class="navbar-fixed sidebar-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">
      
      <!-- ====================================
          ——— BARRA LATERAL DEFINITIVA
        ===================================== -->
        <aside class="left-sidebar sidebar-light" id="left-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="indexAdmin.html">
                <img src="../img/logo2.png" width="40px" alt="ZENbasi">
                <span class="brand-name">ZENbasi</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-left" data-simplebar style="height: 100%;">
              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
      
                <li 
                 
                 >
                  <a class="sidenav-item-link" href="indexAdmin.html">
                    <i class="mdi mdi-home"></i>
                    <span class="nav-text">Inicio</span>
                  </a>
                </li>

                <li 
                 
                 >
                  <a class="sidenav-item-link" href="gruposAdmin.html">
                    <i class="mdi mdi-account-group"></i>
                    <span class="nav-text">Grupos</span>
                  </a>
                </li>

                <li 
                 
                >
                 <a class="sidenav-item-link" href="materiasAdmin.html">
                   <i class="mdi mdi-notebook"></i>
                   <span class="nav-text">Materias</span>
                 </a>
               </li>

               <li 
                 
               >
                <a class="sidenav-item-link" href="alumnosAdmin.html">
                  <i class="mdi mdi-account-box-multiple"></i>
                  <span class="nav-text">Alumnos</span>
                </a>
              </li>

              <li 
                 
              >
               <a class="sidenav-item-link" href="docentesAdmin.html">
                 <i class="mdi mdi-account-card-details"></i>
                 <span class="nav-text">Docentes</span>
               </a>
             </li>

             <li class="active"
                 
              >
               <a class="sidenav-item-link" href="tutoresAdmin.html">
                 <i class="mdi mdi-account-supervisor-circle"></i>
                 <span class="nav-text">Tutores</span>
               </a>
             </li>
              
                

            </ul>
            </div>

            <div class="sidebar-footer">
                <ul class="nav sidebar-inner" id="sidebar-menu2">

                  <li>
                  <a class="sidenav-item-link" href="../loginTodos.html">
                    <i class="mdi mdi-door-open"></i>
                    <span class="nav-text">Cerrar sesion</span>
                  </a>
                </li>
                </ul>
            </div>
          </div>
        </aside>

      

      <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
      <div class="page-wrapper">
        
          <!-- Header -->
          <header class="main-header" id="header">
            <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>

              <span class="page-title">ZENbasi</span>

              <div class="navbar-right ">

                

                <ul class="nav navbar-nav">
                  <img src="../../theme/images/user/user-xs-01.jpg" class="user-image rounded-circle mr-3" alt="User Image" />
                      <span class="d-none d-lg-inline-block">Admin</span>
                </ul>
              </div>
            </nav>


          </header>

        <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
        <div class="content-wrapper">
          <div class="content">                
            <!-- Basic Examples -->
            <div class="card card-default">
              <div class="card-header">
                <h1>Tutores</h1>
                
              </div>
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <button type="button" class="mb-1 btn btn-primary d-inline-block mr-8" data-toggle="modal" data-target="#nuevoTutor">
                      <i class=" mdi mdi-plus mr-1"></i>
                      Nuevo tutor 
                    </button>
                    <button type="button" class="mb-1 btn btn-primary d-inline-block mr-8" data-toggle="modal" data-target="#modalAñadirAlumno">
                      <i class=" mdi mdi-plus mr-1"></i>
                      Unir Tutor a Alumno
                    </button>
                    <!-- Buscador que no funciona -->
                    <!-- ====================================
                    ——— <input type="text" class="form-control col-4 d-inline-block" aria-label="Text input with dropdown button" placeholder="Buscar tutor...">
                    ——— <button type="button" class="mb-1 btn btn-primary ">
                    ——— <i class=" mdi mdi-magnify mr-1"></i>
                    ——— </button>
                    ===================================== -->
                  </div>
                </form>
                <!-- Main Table -->
                <table id="tutores" class="table table-hover table-product" style="width:100%">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Ap. Paterno</th>
                      <th>Ap. materno</th>
                      <th>Telefono</th>
                      <th>Correo</th>
                      <th>Hijo(s)</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>                                
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
         <!-------------------------------------------------------- AÑADIR TUTOR MODAL ----------------------------------------------------------------------------------------->
         <div class="modal fade" id="nuevoTutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
         aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalFormTitle">Nuevo tutor</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
               <form>
                 <div class="form-group">
                  <label for="nombres" class="ml-2 ">Nombre(s): </label>
                  <input type="text" placeholder="Nombre(s)" class="form-control d-inline-block col-6 mb-3 ml-3" id="nombreTutor"/>
                   <br>
                  <label for="apPaterrno" class="ml-2 ">Apellido Paterno: </label>
                  <input type="text" placeholder="Apellido paterno" class="form-control d-inline-block col-6 mb-3 ml-3" id="apPaternoTutor"/>
                  <br>
                  <label for="apMaterno" class="ml-2 ">Apellido Materno: </label>
                  <input type="text" placeholder="Nombre(s)" class="form-control d-inline-block col-6 mb-3 ml-3" id="apMaternoTutor"/>
                   <br>
                   <div class="form-group">
                    <label for="telefono" class="ml-2">Telefono: </label>
                    <input type="text" class="form-control d-inline-block col-6 ml-3" data-mask="(999) 999-9999" placeholder="Telefono" id="telTutor">
                  </div>
                  <div class="form-group">
                    <label for="correo" class="ml-2">Correo: </label>
                    <input type="email" class="form-control col-6 d-inline-block ml-3" aria-describedby="curp" placeholder="Correo Electronico" id="emailTutor">
                  </div>                  
                 </div>
               </form>                                    
             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Cancelar</button>
               <button type="button" class="btn btn-primary btn-pill" data-dismiss="modal" onclick="actionCreateTutor();">Guardar</button>
             </div>
           </div>
         </div>
         </div>
         <!---------------------------------- AÑADIR HIJO MODAL ------------------------------------------->
         <div class="modal fade" id="modalAñadirAlumno" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
         aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalFormTitle">Asignar hijo(s)</h5>
               
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">               
              <!---------------------------------- AÑADIR HIJO "SUBMODAL" ------------------------------------------->
              <form action="tutoresAdmin.php" method="POST">
                <div class="form-group">  
                <label>Tutor:</label>
                </div>
                  <h5 class="text-succes text-center" id="message"><?php=$message;?></h5>  
                <div class="form-group">              
                  <select name="tutor">
                      <option value="value1">Seleccione un Tutor</option>
                      <?php foreach($resultTutor as $key => $value){ ?>
                        <option value="<?=$value['nombreTutor']; ?>"><?=$value['nombreTutor']; ?></option>
                        <?php } ?>
                  </select>
                </div>
                <hr>
                <div class="form-group">  
                  <label>Alumno:</label>
                </div>
                <div class="form-group">  
                  <select name="alumno">
                      <option value="value1">Seleccione un Alumno</option>
                      <?php foreach($resultAlumno as $key => $value){ ?>
                        <option value="<?=$value['nombreAlumno']; ?>"><?=$value['nombreAlumno']; ?></option>
                        <?php } ?>
                  </select>
                </div> 
               </form>                
             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Cancelar</button>
               <button type="submit" name="submit" id="submit" class="btn btn-primary btn-pill" data-dismiss="modal">Unir</button>
             </div>
           </div>
         </div>
         </div>         
         <!-- editar tutor Modal ----------------------------------------------------------------------------------------------->
         <div class="modal fade" id="modalEditarTutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
         aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalFormTitle">Editar tutor</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
               <form>
                 <div class="form-group">
                  <label for="nombres" class="ml-2 ">Nombre(s): </label>
                  <input type="text" placeholder="Nombre(s)" class="form-control d-inline-block col-6 mb-3 ml-3" id="nombres"/>
                   <br>
                  <label for="apPaterrno" class="ml-2 ">Apellido Paterno: </label>
                  <input type="text" placeholder="Apellido paterno" class="form-control d-inline-block col-6 mb-3 ml-3" id="apPaterrno"/>
                  <br>
                  <label for="apMaterno" class="ml-2 ">Apellido Materno: </label>
                  <input type="text" placeholder="Nombre(s)" class="form-control d-inline-block col-6 mb-3 ml-3" id="apMaterno"/>
                   <br>
                   <div class="form-group">
                    <label for="telefono" class="ml-2">Telefono: </label>
                    <input type="text" class="form-control d-inline-block col-6 ml-3" data-mask="(999) 999-9999" placeholder="Telefono" id="telTutor">
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="correo" class="ml-2">Correo: </label>
                    <input type="email" class="form-control col-6 d-inline-block ml-3" aria-describedby="curp" placeholder="Correo Electronico" id="emailTutor">
                  </div>                  
                 </div>
               </form>               
             <div class="modal-footer">
               <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Cancelar</button>
               <button type="button" class="btn btn-primary btn-pill" >Guardar</button>
             </div>
           </div>
         </div>
         </div>
           <!-- Small Modal ELIMINAR ---------------------------------------------------------------------------------->
<div class="modal fade" id="modalEliminarTutor" tabindex="-1" role="dialog" aria-labelledby="eliminarTutor"
aria-hidden="true">
<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalSmallTitle">Eliminar tutor</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      Estas seguro que deseas eliminar este tutor?
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal" onclick="actionDeleteTutor();">Eliminar</button>
      <button type="button" class="btn btn-primary btn-pill" data-dismiss="modal">cancelar</button>
    </div>
  </div>
</div>
</div>
</div>
          <!-- Footer -->
          <footer class="footer mt-auto">
            <div class="copyright bg-white">              
            </div>
          </footer>
      </div>
    </div>
                    <script src="../../theme/plugins/jquery/jquery.min.js"></script>
                    <script src="../../theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <script src="../../theme/plugins/simplebar/simplebar.min.js"></script>
                    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>

                    <script src="../../theme/plugins/apexcharts/apexcharts.js"></script>
                    
                    <script src="../../theme/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
                    
                    <script src="../../theme/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
                    <script src="../../theme/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
                    <script src="../../theme/plugins/jvectormap/jquery-jvectormap-us-aea.js"></script>
                    
                    <script src="../../theme/plugins/daterangepicker/moment.min.js"></script>
                    <script src="../../theme/plugins/daterangepicker/daterangepicker.js"></script>
                    <script>
                      jQuery(document).ready(function() {
                        jQuery('input[name="dateRange"]').daterangepicker({
                        autoUpdateInput: false,
                        singleDatePicker: true,
                        locale: {
                          cancelLabel: 'Clear'
                        }
                      });
                        jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
                          jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
                        });
                        jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
                          jQuery(this).val('');
                        });
                      });
                    </script>

                    <script src="../../theme/plugins/prism/prism.js"></script>
                                        
                                        
                                        
                    <script src="../../theme/plugins/select2/js/select2.min.js"></script>



                    <script src="../../theme/plugins/jquery-mask-input/jquery.mask.min.js"></script>
                    
                    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
                    
                    <script src="../../theme/plugins/toaster/toastr.min.js"></script>

                    <script src="../../theme/js/mono.js"></script>
                    <script src="../../theme/js/chart.js"></script>
                    <script src="../../theme/js/map.js"></script>
                    <script src="../../theme/js/custom.js"></script>
                    
                    <!--  -->
                    <script> 
                      $(function(){
                        $("#tutores").DataTable({});
                        actionReadTutor();
                      });                                                               
                    </script>

                    <script src="../../TODO/jspropios/crud-tutoresAdmin.js"></script>
                    <script src="../../TODO/jspropios/crud-alumnosAdmin.js"></script>

  </body>
</html>
