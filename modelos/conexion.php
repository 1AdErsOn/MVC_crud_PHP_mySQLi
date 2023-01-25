<?php
class Conexion{
    static public function conectar(){
        $dbHost     = "localhost"; 
        $dbUsername = "root"; 
        $dbPassword = ""; 
        $dbName     = "codexworld";
        try{ 
            $conn = new PDO("mysql:host=".$dbHost.";dbname=".$dbName, $dbUsername, $dbPassword); 
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn -> exec("set names utf8");
            return $conn; 
        }catch(PDOException $e){ 
            die("Failed to connect with MySQL: " . $e->getMessage()); 
        }
    }
}