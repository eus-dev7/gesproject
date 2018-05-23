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
        <link rel="stylesheet" href="css/TableBarChart.css" />

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

<table id="source" border="1" width="40%" style="margin-top:55px;margin-left:20%;">
    <caption>Nilai Siswa</caption> <!-- optional -->
    <thead>               <!-- Must have -->
        <tr>
            <th></th>       <!-- Must have an empty <th> here -->
            <th>IPA</th> <!-- Must have -->     
            <th>IPS</th>      
            <th>Umum</th>
        </tr>
    </thead>
    <tbody>                   <!-- Must have -->
        <tr>
            <th>Rudi</th>  
            <td>896</td>  
            <td>788</td>  
            <td>897</td>
        </tr>                  <!-- Must have -->
        <tr>
            <th>Ghazali</th>  
            <td>675</td>  
            <td>987</td>  
            <td>997</td>
        </tr>                  <!-- Must have -->
        <tr>
            <th>Miksal</th>  
            <td>789</td>  
            <td>654</td>  
            <td>453</td>
        </tr>                 <!-- Must have -->
        <tr>
            <th>Monicha</th>  
            <td>989</td>  
            <td>643</td>  
            <td>553</td>
        </tr>
    </tbody>
</table>
<div id="target" style="width: 600px; height: 400px; margin-left:20%;">
</div>


  <?php include ("footer.php"); ?>






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="js/TableBarChart.js"></script>
  <script type="text/javascript">
    $(function() {
        $('#source').tableBarChart('#target', '', false);
    });
  </script>
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
	var Edad = $('#Edad').val();
	var Direccion = $('#Direccion').val();
  var Telefono = $('#Telefono').val();
  var Tipo = $('#Tipo').val();
  var Rol = $('#Rol').val();
	
	var datas="Nombre="+Nombre+"&Apellidos="+Apellidos+"&Edad="+Edad+"&Direccion="+Direccion+"&Telefono="+Telefono+"&Tipo="+Tipo+"&Rol="+Rol;
      
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
  var Edad = $('#Edad'+str).val();
  var Direccion = $('#Direccion'+str).val();
  var Telefono = $('#Telefono'+str).val();
  var Tipo = $('#Tipo'+str).val();
  var Rol = $('#Rol'+str).val();

	
  var datas="Nombre="+Nombre+"&Apellidos="+Apellidos+"&Edad="+Edad+"&Direccion="+Direccion+"&Telefono="+Telefono+"&Tipo="+Tipo+"&Rol="+Rol;
   
      
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
