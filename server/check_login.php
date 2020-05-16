<?php

require("mainDB.php");

$agenda = new Agenda("localhost", "U_general", "1234");

$agenda->connect("Agenda_db");

$Verificar = $agenda->consultarValor("`usuario`", ["`nombre_usuario`","`contrasena`","`ID`"],
"`nombre_usuario` = '".$_POST["username"] ."'");


if($Verificar->num_rows > 0){

    $FILA= $Verificar->fetch_assoc();

    if(password_verify($_POST["password"], $FILA["contrasena"])){

        session_start();
        $_SESSION["id"]=$FILA["ID"];
        $RESPUESTA["msg"]= "OK";
        
    }else{
        $RESPUESTA["msg"]= "CONTRASENA ERRONEA.";
    }

}else{

    $RESPUESTA["msg"]= "USUARIO INCORRECTO.";

}

echo json_encode($RESPUESTA);



 ?>
