
<?php include "php/config.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESPROJECT USB</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
         <link rel="stylesheet" href="css/style1.css">

  </head>
<body>
   
<div id="wrap">
  
  <?php include ("navbar.php"); ?>
    <br/>
    <br/><br/><br/><br/>

 <div class="container">

<div class="panel panel-primary">
  <div class="panel-heading" style="text-align:center;">LISTA DE TAREAS NO CULMINADAS</div>
</div>  

<div id="info"></div>
      <br/>
      <div id="viewdata">

      	<table class="table table-bordered table-hover">
	<thead>
	  <tr>
      <th>N°</th>
	    <th>Proyecto</th>
	    <th>Tarea</th>
      <th>Avance</th>
	    <th>Fecha fin</th>
	  </tr>
	</thead>
	<tbody>
<?php
$num=0;
$res = $conn->query("select t.avance as avance, t.nombre as nombre, t.fecha_fin as fecha_fin,p.nombre as nombrep from tarea t, proyecto p where t.fecha_fin < curdate() and t.duracion<100 and t.id_proyecto=p.id");
while ($row = $res->fetch_assoc()) {
?>
   <?php $num++;  ?>
    <tr>
      <td><?php echo "$num";?></td>
	    <td><?php echo $row['nombrep']; ?></td>
	    <td><?php echo $row['nombre']; ?></td>
      <td>
      <?php echo $row['avance']; ?>
       </td>
      
	    <td><?php echo $row['fecha_fin']; ?></td>
	   

    </tr>
<?php
}
?>
	</tbody>
      </table>
      </div>

  </div>

  <?php include ("footer.php"); ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
     <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/ix.js"></script>

 
</body>
</html> 
