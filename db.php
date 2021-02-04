<?php

session_start();

$server='localhost';
$user='root';
$password='';
$database='notes';

$connection=mysqli_connect($server,$user,$password,$database);

if(isset($connection)){
    //echo "Conexion establecida con la base de datos: ".$database;
} else{
    //echo "Error al conectar con la base de datos: ".$database;
}
?>