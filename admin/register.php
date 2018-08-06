<?php 
session_start();
header('Content-Type: text/html; charset=utf-8');
include "../lib/Classes/BaseController.php";
//print_r($_POST); exit();
$bd=new BaseController();
$usuapass=$_POST['usuapass'];
$usuanomb=$_POST['usuanomb']." ".$_POST['usuaapel'];
$usuaiden=$_POST['usuaiden'];
$usuafena=date('Y-m-d',strtotime($_POST['usuafena']));
$usuamail=$_POST['usuamail'];
$usuagene=$_POST['usuagene'];
//print_r($bd);
$strSQL="INSERT INTO usuarios (usuapass,usuanomb,usuaiden,usuafena,usuamail,usuagene) VALUES ('".$usuapass."','".$usuanomb."','".$usuaiden."','".$usuafena."','".$usuamail."','".$usuagene."')";
$b=$bd->query($strSQL)->execute();
if($b){
    header('Location: login.html?e=1');
}







?>