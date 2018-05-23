<?php
include "config.php";
if(isset($_GET['id'])){
$stmt = $conn->prepare("update ajaxtrap set nama=?, gender=?, phone=?, alamat=? where kode=?");
$stmt->bind_param('sssss', $nm, $gd, $pn, $al, $id);

$nm = $_POST['nm'];
$gd = $_POST['gd'];
$pn = $_POST['pn'];
$al = $_POST['al'];
$id = $_GET['id'];

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
  <strong>Peligro!</strong> Lo sentimos tienes la dirección equivocada .
</div>
<?php
}
?>