<?php
class Conexion{
    static public function conectar(){
        $dbHost     = "localhost"; 
        $dbUsername = "root"; 
        $dbPassword = ""; 
        $dbName     = "base_test";
        /*try{ 
            $conn = new PDO("mysql:host=".$dbHost.";dbname=".$dbName, $dbUsername, $dbPassword); 
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn -> exec("set names utf8");
            return $conn; 
        }catch(PDOException $e){ 
            die("Failed to connect with MySQL: " . $e->getMessage()); 
        }*/
        // Connect to the database
        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        if($conn->connect_error){
            die("Failed to connect with MySQL: " . $conn->connect_error);
        }else{
            return $conn;
        }
    }
}