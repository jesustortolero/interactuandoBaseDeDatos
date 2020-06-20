<?php

require("mainDB.php");

$agenda = new Agenda("localhost", "U_general", "1234");


$agenda->connect("Agenda_db");



    $condicion["`ID`"] = "'".$_POST["id"]."'";


if($agenda->eliminarValor("`evento`",$condicion)){
    $respuesta["msg"]="OK";
}else{
    $respuesta["msg"]="no se ha podido eliminar el evento.";
}

echo json_encode($respuesta);
