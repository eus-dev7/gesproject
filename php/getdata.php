<table class="table table-bordered table-hover">
	<thead>
	  <tr>
      <th>N°</th>
	    <th>Nombre</th>
	    <th>Apellidos</th>
	    <th>Tipo</th>
	    <th>Login</th>
	    <th>Password</th>
      <th>Opciones</th>
	  </tr>
	</thead>
	<tbody>
<?php
include "config.php";
$num=0;
$res = $conn->query("select u.id as id, u.nombre as Nombre,u.apellido as Apellidos,u.tipo as Tipo, u.login as Login,u.pass as Password from persona u ");
while ($row = $res->fetch_assoc()) {
?>
   <?php $num++;  ?>
    <tr>
      <td><?php echo "$num";?></td>
	    <td><?php echo $row['Nombre']; ?></td>
	    <td><?php echo $row['Apellidos']; ?></td>
	    <td><?php echo $row['Tipo']; ?></td>
	    <td><?php echo $row['Login']; ?></td>
      <td><?php echo $row['Password']; ?></td>
	    <td>
	    <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
	    <a class="btn btn-danger btn-sm"  onclick="deletedata('<?php echo $row['id']; ?>')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
      </td>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel<?php echo $row['id']; ?>">Editar datos</h4>
      </div>
      <div class="modal-body">

<form>
  <div class="form-group">
    <label for="nm">Nombre</label>
    <input type="text" class="form-control" id="Nombre<?php echo $row['id']; ?>" value="<?php echo $row['Nombre']; ?>">
  </div>
  <div class="form-group">
    <label for="gd">Apellidos</label>
    <input type="text" class="form-control" id="Apellidos<?php echo $row['id']; ?>" value="<?php echo $row['Apellidos']; ?>">
  </div>
  <div class="form-group">
    <label for="pn">Rol</label>
    <input type="text" class="form-control" id="Tipo<?php echo $row['id']; ?>" value="<?php echo $row['Tipo']; ?>">
  </div>
  <div class="form-group">
    <label for="al">Login</label>
    <input type="text" class="form-control" id="Login<?php echo $row['id']; ?>" value="<?php echo $row['Login']; ?>">
  </div>
  <div class="form-group">
    <label for="al">Password</label>
    <input type="text" class="form-control" id="Pass<?php echo $row['id']; ?>" value="<?php echo $row['Password']; ?>">
  </div>
</form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="updatedata('<?php echo $row['id']; ?>')" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>
      
      </td>
    </tr>
<?php
}
?>
	</tbody>
      </table>