<?php
include "config.php";

$Nombre = $_POST['Nombre'];
$Apellidos = $_POST['Apellidos'];
$Tipo = $_POST['Tipo'];
$Login = $_POST['Login'];
$Pass = $_POST['Pass'];

if($Nombre != null && $Apellidos!= null && $Tipo!= null&& $Login!= null&& $Pass!= null){
$stmt = $conn->prepare("INSERT INTO persona VALUES ('',?,?,?,?,?)");
$stmt->bind_param('sssss', $Nombre, $Apellidos, $Tipo, $Login, $Pass);

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