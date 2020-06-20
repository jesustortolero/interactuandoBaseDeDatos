<?php
require("mainDB.php");

$agenda = new Agenda("localhost", "U_general", "1234");

$agenda->connect("Agenda_db");

session_start();

$eventos = $agenda->consultarValor("`evento`", ["`ID`","`titulo`","`fecha_inicio`","`hora_inicio`",
                                        "`fecha_finalizacion`","`hora_finalizacion`","`dia_completo`"],
                                        "`fk_Usuario` = ".$_SESSION["id"]);



for ($set = array (); $row = $eventos->fetch_assoc(); $set[] = $row);

$filas=[];

foreach($set as $valor){

    if($valor["dia_completo"]=="1"){

        array_push($filas,[
        
            "id"=>$valor["ID"],
            "title"=>$valor["titulo"],
            "start"=>$valor["fecha_inicio"],
            "allday"=> true
            ]
        );

    }else{

        array_push($filas,[
        
            "id"=>$valor["ID"],
            "title"=>$valor["titulo"],
            "start"=>$valor["fecha_inicio"]."T".$valor["hora_inicio"],
            "end"=>$valor["fecha_finalizacion"]."T".$valor["hora_finalizacion"]
            ]
        );

    }
}



if($eventos){

    $repuesta["msg"] = "OK";
    $repuesta["eventos"] = $filas;
    
}



echo json_encode($repuesta);
