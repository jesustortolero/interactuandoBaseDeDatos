<?php

include('mainDB.php');

$agenda = new Agenda("localhost", "U_general", "1234");

$agenda->connect("Agenda_db");


session_start();



$data["`titulo`"] = "'" . $_POST["titulo"] . "'";
$data["`fecha_inicio`"] = "'" . $_POST["start_date"] . "'";
$data["`fk_Usuario`"] = "'" . $_SESSION["id"] . "'";
$data["`dia_completo`"] =  $_POST["allDay"];

if (!filter_var($_POST["allDay"],FILTER_VALIDATE_BOOLEAN)){
    $data["`hora_inicio`"] = "'" . $_POST["start_hour"] . "'";
    $data["`fecha_finalizacion`"] = "'" . $_POST["end_date"] . "'";
    $data["`hora_finalizacion`"] = "'" . $_POST["end_hour"] . "'";
}


if ($agenda->insertarValor("`evento`", $data)) {
    $respuesta["msg"] = "OK";
} else {
    $respuesta["msg"] = "no se ha podido agregar el evento";
}

echo json_encode($respuesta);


