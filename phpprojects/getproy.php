
<table class="table table-bordered table-hover">
	<thead>
	  <tr>
      <th>Nº</th>
	    <th>Nombre</th>
	    <th>Detalle</th>
      <th>Duracion</th>
      <th>Fecha Inicio</th>
      <th>Fecha Fin</th>
	    <th>Encargado</th>
      <th>Opciones</th>
	  </tr>
	</thead>
	<tbody>
<?php
include "config.php";
$num=0;
//concat(t.duracion,' ',t.unidad) Duracion,
$res = $conn->query("select p.id Id,p.nombre Nombre,p.detalle Detalle,concat(p.duracion,' ',p.unidad) Duracion,p.duracion duracion, p.unidad unidad,p.fecha_inicio Inicio,p.fecha_fin Fin,concat(pe.nombre,' ',pe.apellido) Encargado from proyecto p,persona pe where p.encargado=pe.id");
while ($row = mysqli_fetch_array($res)) {
?>
     <?php $num++;  ?>
	  <tr>
	    <td><?php echo "$num";?></td>
	    <td><?php echo $row['Nombre']; ?></td>
	    <td><?php echo $row['Detalle']; ?></td>
      <td><?php echo $row['Duracion']; ?></td>
      <td><?php echo $row['Inicio']; ?></td>
      <td><?php echo $row['Fin']; ?></td>
	    <td><?php echo $row['Encargado']; ?></td>
	    <td>

      <form method="get" action="tareas.php"><input type="hidden" name="id" value="<?php echo $row['Id']; ?>"><input type="hidden" name="nombreproy" value="<?php echo $row['Nombre']; ?>"><input type="hidden" name="detalle" value="<?php echo $row['Detalle']; ?>"><input type="hidden" name="encargado" value="<?php echo $row['Encargado']; ?>"><input type="hidden" name="fecha_inicio" value="<?php echo $row['Inicio']; ?>"><input type="hidden" name="fecha_fin" value="<?php echo $row['Fin']; ?>">
      <input type="hidden" name="duracion" value="<?php echo $row['duracion']; ?>"><input type="hidden" name="unidad" value="<?php echo $row['unidad']; ?>">
      <button type="submit"  name="btn-update" class="btn btn-warning btn-sm"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
	    <a class="btn btn-danger btn-sm"  onclick="deletedata('<?php echo $row['Id']; ?>')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
      </form>
<form method="get" action="diagrama.php"><input type="hidden" name="id" value="<?php echo $row['Id']; ?>"><input type="hidden" name="nombreproy" value="<?php echo $row['Nombre']; ?>"><input type="hidden" name="detalle" value="<?php echo $row['Detalle']; ?>"><input type="hidden" name="encargado" value="<?php echo $row['Encargado']; ?>"><input type="hidden" name="fecha_inicio" value="<?php echo $row['Inicio']; ?>"><input type="hidden" name="fecha_fin" value="<?php echo $row['Fin']; ?>">
      <input type="hidden" name="duracion" value="<?php echo $row['duracion']; ?>"><input type="hidden" name="unidad" value="<?php echo $row['unidad']; ?>">
      <button type="submit"  name="btn-update" class="btn btn-warning btn-sm"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
</form>
      </td>
<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $row['Id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['Id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel<?php echo $row['Id']; ?>">Edit Data</h4>
      </div>
      <div class="modal-body">

<form>
  <div class="form-group">
    <label for="nm">Nama</label>
    <input type="text" class="form-control" id="nm<?php echo $row['Id']; ?>" value="<?php echo $row['nama']; ?>">
  </div>
  <div class="form-group">
    <label for="gd">Gender</label>
    <input type="text" class="form-control" id="gd<?php echo $row['Id']; ?>" value="<?php echo $row['gender']; ?>">
  </div>
  <div class="form-group">
    <label for="pn">Phone</label>
    <input type="text" class="form-control" id="pn<?php echo $row['Id']; ?>" value="<?php echo $row['phone']; ?>">
  </div>
  <div class="form-group">
    <label for="al">Alamat</label>
    <input type="text" class="form-control" id="al<?php echo $row['Id']; ?>" value="<?php echo $row['alamat']; ?>">
  </div>
</form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="updatedata('<?php echo $row['Id']; ?>')" class="btn btn-primary">Save changes</button>
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