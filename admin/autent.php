<?php 
session_start();

include "../lib/Classes/BaseController.php";

$bd=new BaseController();
$correo=$_POST['usuamail'];
$contraseña=$_POST['usuapass'];
//print_r($bd);
$strSQL="SELECT * FROM usuarios WHERE usuamail='".$correo."' AND usuapass='".$contraseña."' order by 1 desc";
$b=$bd->query($strSQL)->single();
if($b){
    $_SESSION['usuanume']=$b['usuanume'];
    header('Location: index.php');
}else{
    header('Location: login.html?e=2');
}







?>