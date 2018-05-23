<?php
 if(isset($_GET['id'])){
    $idn = $_GET['id'];
    
  }
?>
<table class="table table-bordered table-hover">
	<thead>
	  <tr>
      <th>Nº</th>
	    <th>Tarea</th>
	    <th>Duracion</th>
	    <th>Fecha inicio</th>
	    <th>Fecha final</th>
	    <th>Avance</th>
	    <th>Personal</th>
      <th>Opciones</th>
	  </tr>
	</thead>
	<tbody>
<?php
include "config.php";
 $num=0;
$res = $conn->query("select t.id IDT,t.nombre Tarea,concat(t.duracion,' ',t.unidad) Duracion,t.fecha_in Fecha_inicio,t.fecha_fin Fecha_fin,t.avance Avance,t.id_proyecto idps,t.duracion dur,t.unidad uds FROM tarea t,proyecto p WHERE t.id_proyecto=p.id and p.id=$idn");
while ($row = $res->fetch_assoc()) {
?>
    
<?php
$num++;
  ?>

	  <tr>
      <td><?php echo "$num"; ?></td>
	    <td><?php echo $row['Tarea']; ?></td>
	    <td><?php echo $row['Duracion']; ?></td>
	    <td><?php echo $row['Fecha_inicio']; ?></td>
	    <td><?php echo $row['Fecha_fin']; ?></td>
	    <td><?php echo $row['Avance']; ?></td>
      <td></td>
	    <td>
	    <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['IDT']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
	    <a class="btn btn-danger btn-sm"  onclick="deletedata('<?php echo $row['IDT']; ?>')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $row['IDT']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['IDT']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel<?php echo $row['IDT']; ?>">Editar datos de la tarea</h4>
      </div>
      <div class="modal-body">

<form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
  <div class="form-group">
    <label for="nm">Nombre</label>
    <input type="text" class="form-control" value="<?php echo $row['Tarea']; ?>" name="tareau" id="tarea">
  </div>
  <div class="form-group">
    <label for="gd">Duracion</label><br />
    <input type="number" min="1" max="31" step="1" required="required" value="<?php echo $row['dur']; ?>" name="duru" id="dur"/>
    <select required="required"  name="uniu" id="uni" >
    <option value="day"  >day</option>
        <option value="week">week</option>
        <option value="month">month</option>
        <option value="year">year</option>
        <option value="<?php echo $row['uds']; ?>" selected><?php echo $row['uds']; ?></option>
    </select>
  </div>
  <div class="form-group">
    <label for="pn">Fecha inicio</label>
    <input type="date" class="form-control" value="<?php echo $row['Fecha_inicio']; ?>" name="date" id="date" >
  </div>
  <div class="form-group">
    <label for="al">Avance</label>
    <input type="number" min="0" max="100" step="5" required="required" value="<?php echo $row['Avance']; ?>" name="avu" id="av"/>
    <input type="hidden" value="<?php echo $row['idps']; ?>" name="idpu" id="idp" >
    <input type="hidden" value="<?php echo $row['IDT']; ?>" name="idtar" id="idtar" >

  </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
        <input type="submit" value="Actualizar" class="btn btn-primary" name="btn-update" id="reg"/>
      </div>
</form>
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