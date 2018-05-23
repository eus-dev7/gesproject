<?php
include "config.php";
$idp = $_POST['idp'];
$proceso = $_POST['pro'];
$tarea = $_POST['tarea'];
$dur = $_POST['dur'];
$uni = $_POST['uni'];
$fi = date('Y-m-d');
$av= $_POST['av'];

if($tarea != null && $dur != null && $uni != null && $fi != null && $ff != null && $av != null $uni != null &&){
$stmt = $conn->prepare("INSERT INTO tarea VALUES ('',?,?,?,?)");
$stmt->bind_param('', $tarea, $dur,$uni, $fi, $ff,$av,$id);

if($stmt->execute()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong> Se las arregló para agregar datos.
</div>
<?php
} else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong>Lo sentimos se producio un error al insertar los datos.
</div>
<?php
}
} else{
?> 
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Peligro!</strong> Rellene todos los campos.
</div>
<?php
}
?>