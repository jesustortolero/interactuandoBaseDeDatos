<?php

include('mainDB.php');

$agenda = new Agenda("localhost", "U_general", "1234");

$agenda->connect("Agenda_db");


session_start();

$condition["`ID`"] = "'" . $_POST["id"] . "'";
$data["`fecha_inicio`"] = "'" . $_POST["start_date"] . "'";
$data["`hora_inicio`"] = "'" . $_POST["start_hour"] . "'";
$data["`fecha_finalizacion`"] = "'" . $_POST["end_date"] . "'";
$data["`hora_finalizacion`"] = "'" . $_POST["end_hour"] . "'";



if ($agenda->actualizarValor("`evento`", $data,$condition)) {
    $respuesta["msg"] = "OK";
} else {
    $respuesta["msg"] = "no se ha actulizado el evento satisfactoriamente";
}

echo json_encode($respuesta);
