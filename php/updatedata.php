<?php
include "config.php";
if(isset($_GET['Id_usuario'])){
$stmt = $conn->prepare("update persona set nombre=?, apellido=?, tipo=?, login=?,pass=? where id=?");
$stmt->bind_param('ssssss', $Nombre, $Apellidos, $Tipo, $Login, $Pass, $Id);

$Nombre = $_POST['Nombre'];
$Apellidos = $_POST['Apellidos'];
$Tipo = $_POST['Tipo'];
$Login = $_POST['Login'];
$Pass = $_POST['Pass'];
$Id =$_GET['Id_usuario'];

if($stmt->execute()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong> Ha cambiado correctamente los datos .
</div>
<?php
} else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Lo sentimos se producio un error al modificar los datos.
</div>
<?php
}
} else{
?> 
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Peligro!</strong> Lo sentimos tienes la dirección equivocadahnhgredgf .
</div>
<?php
}
?>