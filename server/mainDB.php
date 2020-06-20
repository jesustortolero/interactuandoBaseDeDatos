<?php

class Agenda
{

    private $host;
    private $user;
    private $contrasena;
    private $connection;

    public function __construct($host = "", $user = "", $contrasena = "")
    {

        $this->host = $host;
        $this->user = $user;
        $this->contrasena = $contrasena;
    }

    function connect($nombre_db)
    {
        $this->connection = new mysqli($this->host, $this->user, $this->contrasena, $nombre_db);

        if ($this->connection->connect_error) {
            die("conexion fallida: " . $this->connection->connect_error . "<br><br>");
        } else {
            return "OK";
        }
    }


    function exec_SQL($parametro)
    {

        $query = $this->connection->query($parametro);

        if (!$query) {

            return "Hubo un error y los datos no han sido cargados. Comando SQL: " .
                $parametro . "<br>" . mysqli_error($this->connection) . "<br><br>";
        } else {

            return $query;
        }
    }
    function end()
    {
        $this->connection->close();
    }

    function insertarValor($tableName = "", $columnsValues)
    {

        $sql = "INSERT INTO " . $tableName . " (";
        $i = 1;
        $len = count($columnsValues);
        $sqlCol = null;
        $sqlVal = null;

        foreach ($columnsValues as $key => $val) {

            $sqlCol .= $key;
            $sqlVal .= $val;

            if ($i != $len) {

                $sqlCol .= ", ";
                $sqlVal .= ", ";
            } else {
                $sqlCol .= ") VALUES (";
                $sqlVal .= ");";

                $sql .= $sqlCol . $sqlVal;
            }
            $i++;
        }

        return $this->exec_SQL($sql);
    }


    function eliminarValor($tableName = "", $conditions)
    {

        $sql = "DELETE FROM " . $tableName . " WHERE ";
        $i = 1;
        $len = count($conditions);

        foreach ($conditions as $key => $val) {

            $sql .= $key . "=" . $val;

            if ($i != $len) {

                $sql .= " AND ";
            } else {

                $sql .= ";";
            }
            $i++;
        }

        return $this->exec_SQL($sql);
    }

    function actualizarValor($tableName = "", $columnsValues, $conditions)
    {

        $sql = "UPDATE " . $tableName . " SET ";
        $i = 1;
        $x = 1;
        $lenVal_Col = count($columnsValues);
        $lenCondition = count($conditions);

        foreach ($columnsValues as $key => $val) {

            $sql .= $key . "=" . $val;

            if ($i != $lenVal_Col) {

                $sql .= ", ";
            } else {

                $sql .= " WHERE ";
            }
            $i++;
        }

        foreach ($conditions as $key => $val) {

            $sql .= $key . "=" . $val;

            if ($x != $lenCondition) {

                $sql .= " AND ";
            } else {

                $sql .= ";";
            }
            $x++;
        }
        return $this->exec_SQL($sql);
    }

    function consultarValor($tableName = "", $columns, $condition)
    {

        $sql = "SELECT ";
        $i = 1;
        $len = count($columns);

        foreach ($columns as $key) {

            $sql .= $key;


            if ($i != $len) {

                $sql .= ", ";
            } else {

                if ($condition == "") {

                    $sql .= " FROM " . $tableName . ";";
                } else {
                    $sql .= " FROM " . $tableName . " WHERE " . $condition . ";";
                }
            }
            $i++;
        }

        return $this->exec_SQL($sql);
    }
}
