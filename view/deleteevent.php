<?php
include '../controller/eventC.php';
$eventC = new eventC();
$eventC->deleteevent($_GET["id"]);
header('Location:../examples/dashboard.php');
?>