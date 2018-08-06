<?php

include "bd.php";



DEFINE('dsn',$dsn);
DEFINE('USER',$usuario);
DEFINE('CONTRASENA',$contraseña);

class BaseController{

    private $dsn=dsn;
    private $user=USER;
    private $pass=CONTRASENA;
    private $bd;
    private $consulta;

    public function __construct(){
        
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        try{
            $this->bd = new PDO($this->dsn, $this->user, $this->pass);
        }catch(PDOException $e){
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
            exit;
        }
        
    }

    public function query($strSQL){
        $consulta = $this->bd->prepare($strSQL);
        
        $this->consulta=$consulta;
        return $this;
    }

    public function resultset(){
        $this->consulta->execute();
        return $registro = $this->consulta->fetchAll();
    }

    public function single(){
        $this->consulta->execute();
        return $registro = $this->consulta->fetch();
    }

    public function execute(){
        return $this->consulta->execute();
    }
}



?>