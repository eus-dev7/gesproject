<?php
/*Template name: Modificar usuario*/
include_once 'dbMySql.php';
$con = new DB_con();

$table = "tarea";


///
$res=$con->select($table);
//Post Boton save
if(isset($_POST['btn-update']))
{
$idtar=$_POST['idtar'];
$idp = $_POST['idpu'];
$tarea = $_POST['tareau'];
$dur = $_POST['duru'];
$uni = $_POST['uniu'];
$fi = date('Y-m-d');
$av= $_POST['avu'];

echo $idp;
echo $tarea;
echo $dur;
echo $uni;
echo $fi;
echo $av;
    $tabla="tarea";
    $campos="nombre='$tarea',duracion=$dur,unidad='$uni',fecha_in='$fi',fecha_fin='$fi' + interval $dur $uni ,avance='$av',id_proyecto=$idp";
  $res=$con->update($campos,$idtar);
  if($res)
  {
    ?>
    <script>
    alert('Se ha modificado satisfactoriamente');
        </script>
    <?php
  }
  else
  {
    ?>
    <script>
    alert('error al modificar...');
        </script>
    <?php
  }

}
?>