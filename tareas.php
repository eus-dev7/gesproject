<?php 
require('php/config.php');
include_once 'dbMySql.php';
$sentencia="Select concat(pe.nombre,' ',pe.apellido) encargado from persona pe where tipo='Director de Proyecto' order by nombre asc";
$query=mysql_query($sentencia);

/*Template name: Modificar usuario*/

$con = new DB_con();
$table = "tarea";

///
$res=$con->select($table);
if(isset($_POST['btn-update']))
{
$idtar=$_POST['idtar'];
$idp = $_POST['idpu'];
$tarea = $_POST['tareau'];
$dur = $_POST['duru'];
$uni = $_POST['uniu'];
$fi = date('Y-m-d', strtotime($_POST['date']));
$av= $_POST['avu'];

echo $idp;
echo $tarea;
echo $dur;
echo $uni;
echo $fi;
echo $av;
    $tabla="tarea";
    $campos="nombre='$tarea',duracion=$dur,unidad='$uni',fecha_in='$fi',fecha_fin='$fi' + interval $dur $uni ,avance='$av',id_proyecto=$idp";
  $res=$con->update($campos,$idtar);
  if($res)
  {
    ?>
    <script>
    alert('Se ha modificado satisfactoriamente');
     </script>
    <?php
    
  }
  else
  {
    ?>
    <script>
    alert('error al modificar...');
        </script>
    <?php

  }

}

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 
  if(isset($_GET['id'])){
    $id = $_GET['id'];
 
  }
//Post Boton save
if(isset($_POST['btn-save']))
{
$idp = $_POST['idp'];
$tarea = $_POST['tarea'];
$dur = $_POST['dur'];
$uni = $_POST['uni'];
$fi = date('Y-m-d');
$av= $_POST['av'];

echo $idp;
echo $tarea;
echo $dur;
echo $uni;
echo $fi;
echo $av;
    $tabla="tarea";
    $campos="nombre,duracion,unidad,fecha_in,fecha_fin,avance,id_proyecto";
    $datos=" '$tarea',$dur,'$uni','$fi','$fi' + interval $dur $uni ,'$av',$idp";

    $sql = "INSERT INTO $tabla ($campos)
    VALUES ($datos)";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        echo "Tarea insertada con exito. Last inserted ID is: " . $last_id;
      
        // for ($i=0; $i < $cant ; $i++) { 
        //     $rutas = "INSERT INTO coordenadas (Lat,Lng,id_ruta)
        //     VALUES ('$lats[$i]','$longs[$i]',$last_id)";
        //     if ($conn->query($rutas) === TRUE) {
                
        //         echo "se ha insertado";
        //         echo '<script type="text/javascript">alert("Se ha insertado Correctamente."); document.location.href="agregarRuta.php"; </script>';
        //     } else {

        //         echo "Error: " . $rutas . "<br>" . $conn->error;
        //         echo '<script type="text/javascript">alert("Error al insertar."); document.location.href="agregarRuta.php"; </script>';
                
        //     }
        // }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;

        //echo '<script type="text/javascript">alert("Error al insertar."); document.location.href="agregarRuta.php"; </script>';
    }

}

////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESPROJECT USB</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="viewdata()">
   





<!-- Wrap all page content here -->
<div id="wrap">
  
 
  <?php include ("navbar.php"); ?>
  
  <!-- Begin page content -->
</br></br>


 <div class="container">

      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4 class="panel-title" style="text-align:center;">
            <a class="collapsed" data-toggle="collapse" href="#buscar" aria-expanded="true" style="text-decoration:none;">
             <span style="text-align:center;"class="glyphicon glyphicon-" aria-hidden="true"></span> <?php echo $_GET['nombreproy'];?>
            </a>
          </h4>
        </div>

        <div id="buscar" class="panel-collapse collapse">
          <div class="panel-body">
           
           <!-- <div class="form-group" style="width:48%; float:left; margin:1%;">
                <label for="nombre">Jefe de Proyecto</label>
               <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingresa el nombre" value=" <?php //echo $_GET['encargado'];?>">
            </div>

             <div class="form-group" style="width:48%; float:left;margin:1%;">
                <label for="nombre">Fecha de Inicio</label>
               <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingresa el nombre" value=" <?php //echo $_GET['fecha_inicio'];?>">
            </div>

            <div class="form-group" style="width:48%; float:left;margin:1%;">
                <label for="nombre">Descripcion</label>
                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingresa el nombre" value=" $nombre">
            </div>     
           
            <div class="form-group" style="width:48%; float:left;margin:1%;">
                <label for="nombre">Fecha de Finalizacion</label>
                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingresa el nombre" value=" <?php //echo $_GET['fecha_fin'];?>">
            </div>

            <button type="button" id="BotonGuardar" data-loading-text="Guardando..." class="btn btn-primary" autocomplete="off" style="margin:1%;">
            Guardar
          </button>-->



            <form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">

              <div class="form-group">
                <label for="nm">Nombre del proyecto</label>
                <input type="text" class="form-control" value=" <?php echo $_GET['nombreproy'];?>" name="tarea" id="tarea">
              </div>    
              <div class="form-group">
                <label for="nm">Descripcion</label>
                <input type="text" class="form-control" value=" <?php echo $_GET['detalle'];?>" name="tarea" id="tarea">
              </div>
               <div class="form-group">
                  <label for="gd">Encargado</label><br />
                
                  <select required="required" name="encargado" id="encargado">
                  <?php 
                    while ( $arreglo= mysql_fetch_array($query)) { ?>
                     <option value="<?php echo $arreglo['id']?>"><?php echo $arreglo['encargado']?></option>

                      <?php
                    }
                      ?>
                              <option value="<?php echo $_GET['encargado']; ?>" selected><?php echo $_GET['encargado']; ?></option>
                  </select>
                </div>
              <div class="form-group">
                <label for="gd">Duracion</label><br />
                <input type="number" min="1" max="31" step="1" required="required" value="<?php echo $_GET['duracion']; ?>" name="duru" id="dur"/>
                <select required="required"  name="uniu" id="uni" >
                <option value="day"  >day</option>
                    <option value="week">week</option>
                    <option value="month">month</option>
                    <option value="year">year</option>
                    <option value="<?php echo $_GET['unidad']; ?>" selected><?php echo $_GET['unidad']; ?></option>
                </select>
              </div>
              <div class="form-group">
                <label for="pn">Fecha inicio</label>
                <input type="date" class="form-control"  value="<?php echo $_GET['fecha_inicio'];?>" name="date" id="date" >
              </div>
                    
                    <input type="submit" value="Actualizar" class="btn btn-primary" name="btn-update" id="reg"/>
                
            </form>

          </div>
        
        </div>
      </div>


</br>

     <div class="panel panel-primary" style="width:50%; margin-left:25%;">
        <div class="panel-heading">
          <h4 class="panel-title" style="text-align:center;">
         Lista de Tareas
          </h4>
</div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Añadir Nueva Tarea
</button>
<br/>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Añadir datos de la tarea</h4>
      </div>
      <div class="modal-body">
        
<form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
  <div class="form-group">
    <label for="nm">Nombre</label>
    <input type="text" class="form-control" name="tarea" id="tarea">
  </div>
  <div class="form-group">
    <label for="gd">Duracion</label><br />
    <input type="number" min="1" max="31" step="1" required="required" name="dur" id="dur"/>
    <select required="required" name="uni" id="uni">
    <option value="day">day</option>
        <option value="week">week</option>
        <option value="month">month</option>
        <option value="year">year</option>
    </select>
  </div>
  <div class="form-group">
    <label for="pn">Fecha inicio</label>
    <input type="date" class="form-control" name="date" id="date" >
  </div>
  <div class="form-group">
    <label for="al">Avance</label>
    <input type="number" min="0" max="100" step="5" required="required" name="av" id="av"/>
    <input type="hidden" value="<?php echo $id; ?>" name="idp" id="idp" >
  </div>
        <div class="modal-footer">
        <button type="button"  class="btn btn-success"  data-dismiss="modal">Cerrar</button>
        <input type="submit" value="Guardar tarea" class="btn btn-primary" name="btn-save" id="reg"/>
      </div>
</form>
        
      </div>

    </div>
  </div>
</div>    

<div id="info"></div>
      <br/>
      <div id="viewdata"></div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
    function viewdata(){
       $.ajax({
       type: "GET",
       url: "phpprojects/getdata.php<?php echo '?id='.$id; ?>"
      }).done(function( data ) {
      $('#viewdata').html(data);
      });
    }
    $('#save').click(function(){
    
    var tarea = $('#tarea').val();
    var dur = $('#dur').val();
    var uni = $('#uni').val();
    var fi = $('#fi').val();
    var ff = $('#ff').val();
    var av = $('#av').val();
    var id = $('#id').val();

    var datas="tarea="+tarea+"&dur="+dur+"&uni="+uni+"&fi="+fi+"&ff="+ff+"&av="+av;
      
    $.ajax({
       type: "POST",
       url: "phpprojects/newdata.php",
       data: datas
    }).done(function( data ) {
      $('#info').html(data);
      viewdata();
    });
    });
    function updatedata(str){
    
    var id = str;
    var nm = $('#nm'+str).val();
    var gd = $('#gd'+str).val();
    var pn = $('#pn'+str).val();
    var al = $('#al'+str).val();
    
    var datas="nm="+nm+"&gd="+gd+"&pn="+pn+"&al="+al;
      
    $.ajax({
       type: "POST",
       url: "phpprojects/updatedata.php?id="+id,
       data: datas
    }).done(function( data ) {
      $('#info').html(data);
      viewdata();
    });
    }

  



    function deletedata(str){
    
    var id = str;
      
    $.ajax({
       type: "GET",
       url: "phpprojects/deletedata.php?id="+id
    }).done(function( data ) {
      $('#info').html(data);
      viewdata();
    });
    }
    function agregaRegistro(){
  var url = 'phpprojects/agregar_tarea.php';
  $.ajax({
    type:'POST',
    url:url, 
    data:$('#formulario').serialize(),
    success: function(registro){
      if ($('#pro').val() == 'Registro'){
      $('#formulario')[0].reset();
      $('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
      $('#agrega-registros').html(registro);
      return false;
      }else{
      $('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
      $('#agrega-registros').html(registro);
      return false;
      }
    }
  });
  return false;
}
    </script>


  <?php include ("footer.php"); ?>






  </body>
</html> 
