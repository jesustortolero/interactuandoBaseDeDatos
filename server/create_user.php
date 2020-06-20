<?php

include('mainDB.php');

$agenda = new Agenda("localhost", "U_general", "1234");

$conexion = $agenda->connect("Agenda_db");

$data1["`ID`"] = "'1'";
$data1["`nombre_usuario`"] = "'CH_NewYork@gmail.com'";
$data1["`nombre_completo`"] = "'Carolina Herrera'";
$data1["`contrasena`"] = "'" . password_hash("PERFUME", PASSWORD_DEFAULT) . "'";
$data1["`fecha_nacimiento`"] = "'" . date("Y-m-d", mktime(0, 0, 0, 1, 8, 1939)) . "'";

$data2["`ID`"] = "'2'";
$data2["`nombre_usuario`"] = "'devita@gmail.com'";
$data2["`nombre_completo`"] = "'Franco de Vita'";
$data2["`contrasena`"] = "'" . password_hash("MUSICA", PASSWORD_DEFAULT) . "'";
$data2["`fecha_nacimiento`"] = "'" . date("Y-m-d", mktime(0, 0, 0, 1, 23, 1954)) . "'";

$data3["`ID`"] = "'3'";
$data3["`nombre_usuario`"] = "'edramirez@hotmail.com'";
$data3["`nombre_completo`"] = "'Édgar Ramírez'";
$data3["`contrasena`"] = "'" . password_hash("PELICULAS", PASSWORD_DEFAULT) . "'";
$data3["`fecha_nacimiento`"] = "'" . date("Y-m-d", mktime(0, 0, 0, 3, 25, 1977)) . "'";


$agenda->insertarValor("`usuario`", $data1);
$agenda->insertarValor("`usuario`", $data2);
$agenda->insertarValor("`usuario`", $data3);

$agenda->end();
