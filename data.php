<?php
$idn="";
 if(isset($_GET['id'])){
    $idn = $_GET['id'];
    echo $idn;
  }
include "php/config.php";
$res = $conn->query("select t.id IDT,t.nombre Tarea,concat(t.duracion,' ',t.unidad) Duracion,t.fecha_in Fecha_inicio,t.fecha_fin Fecha_fin,t.avance Avance,t.id_proyecto idps,t.duracion dur,t.unidad uds FROM tarea t,proyecto p WHERE t.id_proyecto=p.id and p.id=$idn");
while ($row = $res->fetch_assoc()) {}


  
$data = array();

$data[] = array(
  'label' => 'Salesiana',
  'start' => '2015-07-22', 
  'end'   => '2015-09-05',
  'class' => 'important',
);
?>