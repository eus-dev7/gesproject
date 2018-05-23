<?php
include('conexion.php');
$idp = $_POST['idp'];
$proceso = $_POST['pro'];
$tarea = $_POST['tarea'];
$dur = $_POST['dur'];
$uni = $_POST['uni'];
$fi = date('Y-m-d');
$av= $_POST['av'];
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysql_query("INSERT INTO tarea (nombre,duracion,unidad,fecha_in,fecha_fin,avance,id_proyecto)VALUES('$tarea',$dur,'$uni','$fi','fi' + interval $dur $uni ,'$av',$idp)");
	break;
	
	case 'Edicion':
		mysql_query("UPDATE productos SET nomb_prod = '$nombre', tipo_prod = '$tipo', precio_unit = '$precio_uni', precio_dist = '$precio_dis' WHERE id_prod = '$id'");
	break;
}

/*
//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM productos ORDER BY id_prod ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="300">Nombre</th>
                <th width="200">Tipo</th>
                <th width="150">Precio Unitario</th>
                <th width="150">Precio Distribuidor</th>
				<th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['nomb_prod'].'</td>
				<td>'.$registro2['tipo_prod'].'</td>
				<td>S/. '.$registro2['precio_unit'].'</td>
				<td>S/. '.$registro2['precio_dist'].'</td>
				<td><a href="javascript:editarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
?>
*/