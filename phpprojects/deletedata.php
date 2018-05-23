<?php
include "config.php";
if(isset($_GET['id'])){
$stmt = $conn->prepare("delete from tarea where id=?");
$stmt->bind_param('s', $id_tarea);

$id_tarea = $_GET['id'];

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
  <strong>Peligro!</strong> Lo sentimos tienes la dirección equivocada .
</div>
<?php
}
?>