<?php
include "config.php";
if(isset($_GET['Id_usuario'])){
$stmt = $conn->prepare("delete from persona where id=?");
$stmt->bind_param('s', $Id_usuario);

$Id_usuario = $_GET['Id_usuario'];

if($stmt->execute()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong> Se las arreglo para borrar los datos
</div>
<?php
} else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Lo sentimos se producio un error al eliminar los datos.
</div>
<?php
}
} else{
?> 
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Peligro!</strong> Lo sentimos tienes la dirección equiv .
</div>
<?php
}
?>