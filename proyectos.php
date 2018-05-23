<?php 

require('php/config.php');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sentencia="SELECT pe.id id, concat(pe.nombre,' ',pe.apellido) encargado FROM persona pe WHERE tipo='Director de Proyecto' ORDER BY nombre asc";

$query = $conn->query($sentencia);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 
 // if(isset($_GET['id'])){
   // $id = $_GET['id'];
 
  //}
//Post Boton save
if(!empty($_POST['btn-save'])&&!empty($_POST['nombrep']))
{
$nombrep = $_POST['nombrep'];
$detalle = $_POST['detalle'];
$dur = $_POST['dur'];
$uni = $_POST['uni'];
$fecha_inicio = date('Y-m-d');
$encargado =$_POST['encargado'];

  echo $idp;
  echo $tarea;
  echo $dur;
  echo $uni;
  echo $fi;
  echo $av;
    $tabla="proyecto";
    $campos="nombre,detalle,duracion,unidad,fecha_inicio,fecha_fin,encargado";
    $datos=" '$nombrep','$detalle',$dur,'$uni','$fecha_inicio','$fecha_inicio' + interval $dur $uni,$encargado";

    $sql = "INSERT INTO $tabla ($campos)
    VALUES ($datos)";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        echo "proyecto insertado con exito. Last inserted ID is: " . $last_id;
        header('Location: proyectos.php');      
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

</br></br></br>

<div class="container">
<div class="panel panel-primary">
  <div class="panel-heading" style="text-align:center;">LISTA DE PROYECTOS</div>
</div>  
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Añadir Nuevo  Proyecto
</button>
<br/>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Añadir datos</h4>
      </div>
      <div class="modal-body">
        
<form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
  <div class="form-group">
    <label for="nm">Nombre del proyecto</label>
    <input type="text" class="form-control" name="nombrep" id="nombrep">
  </div>
  <div class="form-group">
    <label for="nm">Descripcion</label>
    <input type="text" class="form-control" name="detalle" id="detalle">
  </div>
  <div class="form-group">
    <label for="gd">Encargado</label><br />
  
    <select required="required" name="encargado" id="encargado">
    <?php 
      while ( $arreglo= $query->fetch_assoc()) { ?>
       <option value="<?php echo $arreglo['id']?>"><?php echo $arreglo['encargado']?></option>
        <?php
      }
        ?>
    </select>
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
        <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
        <input type="submit" value="Guardar proyecto" class="btn btn-primary" name="btn-save" id="reg"/>
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
       url: "phpprojects/getproy.php"
      }).done(function( data ) {
      $('#viewdata').html(data);
      });
    }
    $('#save').click(function(){
    
    var nm = $('#nm').val();
    var gd = $('#gd').val();
    var pn = $('#pn').val();
    var al = $('#al').val();
    
    var datas="nm="+nm+"&gd="+gd+"&pn="+pn+"&al="+al;
      
    $.ajax({
       type: "POST",
       url: "phpprojects/newdata.php",
       data: datas
    }).done(function( data ) {
      $('#info').html(data);
      viewdata();
    });
    });
    function update(str){
    var id = str;
    var nm = $('#nm'+str).val();
    var gd = $('#gd'+str).val();
    var pn = $('#pn'+str).val();
    var al = $('#al'+str).val();
    
    var datas="nm="+nm+"&gd="+gd+"&pn="+pn+"&al="+al;
      
    $.ajax({
       type: "POST",
       url: "proyectos.php?id="+id,
       data: datas
    }).done(function( data ) {
      $('#info').html(data);
      viewdata();
    });
    }
    function updatedata(str){
    
    var id = str;
    var nm = $('#nm'+str).val();
    var gd = $('#gd'+str).val();
    var pn = $('#pn'+str).val();
    var al = $('#al'+str).val();
    
    var datas="nm="+nm+"&gd="+gd+"&pn="+pn+"&al="+al;
      
    $.ajax({
       type: "POST",
       url: "phpprojects/updateproy.php?id="+id,
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
       url: "phpprojects/deleteproy.php?id="+id
    }).done(function( data ) {
      $('#info').html(data);
      viewdata();
    });
    }
    </script>


  <?php include ("footer.php"); ?>

  </body>
</html> 
