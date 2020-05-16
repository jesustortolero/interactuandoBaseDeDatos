<?php

include('mainDB.php');

$agenda = new Agenda("localhost", "U_general", "1234");

$conexion = $agenda->connect("Agenda_db");



$data["`ID`"] = "'xxxxxxxxxxxxx'";
$data["`titulo`"] = "'xxxxxxxxxxxxxx'";
$data["`fecha_inicio`"] = "'xxxxxxxxxxxxxxxxxx'";
$data["`hora_inicio`"] = "'" . password_hash("xxxxxxxxxxxxxxxx", PASSWORD_DEFAULT) . "'";
$data["`fecha_finalización`"] = "xxxxxxxxxxxxxxxxx";
$data["`hora_finalización`"] = "'xxxxxxxxxxxxx'";
$data["`día_completo`"] = "'xxxxxxxxxxxxxxxxxx'";
$data["`fk_Usuario`"] = "'xxxxxxxxxxxxx'";


$agenda->insertarValor("`evento`", $data);
  


 ?>
