<?php
$idn="";
 if(isset($_GET['id'])){
    $idn = $_GET['id'];
  //  echo $idn;
  }
require('lib/gantti.php'); 
//require('data.php'); 
include "php/config.php";
$res = $conn->query("SELECT nombre,fecha_in,fecha_fin FROM tarea WHERE id_proyecto=$idn");
$data = array();
while ($row = $res->fetch_assoc()) {
$name=$row['nombre'];
$fi=$row['fecha_in'];
$ff=$row['fecha_fin'];
//echo $fi;

$data[] = array(
  'label' => "$name",
  'start' => $fi, 
  'end'   => $ff,
  'class' => 'important',
);
}
date_default_timezone_set('UTC');
setlocale(LC_ALL, 'en_US');

$gantti = new Gantti($data, array(
  'title'      => 'TAREAS',
  'cellwidth'  => 25,
  'cellheight' => 35,
  'today'      => true
));

?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Mahatma Gantti – A simple PHP Gantt Class</title>
  <meta charset="utf-8" />

  <link rel="stylesheet" href="styles/css/screen.css" />
  <link rel="stylesheet" href="styles/css/gantti.css" />

  <!--[if lt IE 9]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>

<body>

<header>

<h1>SISTEMA DE GESTION DE PROYECTOS</h1>
<h2>DIAGRAMA DE TAREAS</h2>

</header>

<?php echo $gantti ?>

<!-- <p><pre><code><?php $code = "
<?php

require('lib/gantti.php'); 

date_default_timezone_set('UTC');
setlocale(LC_ALL, 'en_US');

\$data = array();

\$data[] = array(
  'label' => 'Project 1',
  'start' => '2012-04-20', 
  'end'   => '2012-05-12'
);

\$data[] = array(
  'label' => 'Project 2',
  'start' => '2012-04-22', 
  'end'   => '2012-05-22', 
  'class' => 'important',
);

\$data[] = array(
  'label' => 'Project 3',
  'start' => '2012-05-25', 
  'end'   => '2012-06-20'
  'class' => 'urgent',
);

\$gantti = new Gantti(\$data, array(
  'title'      => 'Demo',
  'cellwidth'  => 25,
  'cellheight' => 35
));

echo \$gantti;

?>

";

//echo htmlentities(trim($code)); ?>
<!-- </pre></code></p> -->
 -->
</body>

</html>
