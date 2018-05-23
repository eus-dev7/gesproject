<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESPROJECT USB</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
  </head>
<body onload="viewdata()">
   
<div id="wrap">
  
  <?php include ("navbar.php"); ?>
    <br/>
    <br/><br/><br/><br/>

 <div class="container">

<div class="panel panel-primary">
  <div class="panel-heading" style="text-align:center;">LISTA DE USUARIOS</div>
</div>  
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Añadir Nuevo Usuario
</button>
<br/>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Añadir nuevo usuario</h4>
      </div>
      <div class="modal-body">
        
<form class="formulario">
  <div class="form-group">
    <label for="nm">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="Nombre">
  </div>
  <div class="form-group">
    <label for="gd">Apellidos</label>
    <input type="text" class="form-control" name="apellidos" id="Apellidos">
  </div>

   <div class="form-group">
    <label for="tipo">Tipo</label><br />
    <select required="required" name="tipo" id="Tipo">
        <option value="Director de proyecto">Director de proyecto</option>
        <option value="Empleado">Empleado</option>
    </select>
  </div>

 <!-- <div class="form-group">
    <label for="pn">Tipo</label>
    <input type="text" class="form-control" name="tipo" id="Tipo">
  </div>-->
  <div class="form-group">
    <label for="al">Login</label>
    <input type="text" class="form-control" name="login" id="Login">
  </div>
  <div class="form-group">
    <label for="nm">Password</label>
    <input type="password" class="form-control" name="password" id="Pass">
  </div>
</form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success"  data-dismiss="modal">Cerrar</button>
        <button type="button" id="save" class="btn btn-primary" >Guardar cambios </button>
      </div>
    </div>
  </div>
</div>    
<div id="info"></div>
      <br/>
      <div id="viewdata"></div>
  </div>

  <?php include ("footer.php"); ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script>
    function viewdata(){
       $.ajax({
	   type: "GET",
	   url: "php/getdata.php"
      }).done(function( data ) {
	  $('#viewdata').html(data);
      });
    }
    $('#save').click(function(){
	
	var Nombre = $('#Nombre').val();
	var Apellidos = $('#Apellidos').val();
	var Tipo = $('#Tipo').val();
	var Login = $('#Login').val();
  var Pass = $('#Pass').val();
	
	var datas="Nombre="+Nombre+"&Apellidos="+Apellidos+"&Tipo="+Tipo+"&Login="+Login+"&Pass="+Pass;
      
	$.ajax({
	   type: "POST",
	   url: "php/newdata.php",
	   data: datas
	}).done(function( data ) {
	  $('#info').html(data);
	  viewdata();
	});
    });
function updatedata(str){
	
	var Id_usuario = str;
  var Nombre = $('#Nombre'+str).val();
  var Apellidos = $('#Apellidos'+str).val();
  var Tipo = $('#Tipo'+str).val();
  var Login = $('#Login'+str).val();
  var Pass = $('#Pass'+str).val();

  var datas="Nombre="+Nombre+"&Apellidos="+Apellidos+"&Tipo="+Tipo+"&Login="+Login+"&Pass="+Pass;
      
	$.ajax({
	   type: "POST",
	   url: "php/updatedata.php?Id_usuario="+Id_usuario,
	   data: datas
	}).done(function( data ) {
	  $('#info').html(data);
	  viewdata();
	});
}
    function deletedata(str){
	
	var Id_usuario = str;
      
	$.ajax({
	   type: "GET",
	   url: "php/deletedata.php?Id_usuario="+Id_usuario
	}).done(function( data ) {
	  $('#info').html(data);
	  viewdata();
	});
    }
    </script>
</body>
</html> 
