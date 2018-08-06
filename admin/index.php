<?php 
    session_start();
    include "../lib/Classes/BaseController.php";
    $bd=new BaseController();
    header('Content-Type: text/html; charset=utf-8');

    $strSQL="SELECT usuanomb FROM usuarios WHERE usuanume='".$_SESSION['usuanume']."'";
    $usuario=$bd->query($strSQL)->single();
    if($usuario){
        extract($usuario);
    }

    $strSQL="SELECT menunomb,menulink FROM menu WHERE menuelim=0 order by menunomb DESC";
    $menu=$bd->query($strSQL)->resultset();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pagina principal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/comun.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.css">
</head>
<body>
    <!--Header Menu-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>      
                <a class="navbar-brand" href="#"><?=$usuanomb?></a>
            </div>
            
            <div class="collapse navbar-collapse" id="menu">
                <?php
                    foreach ($menu as $key => $value) {
                        echo '<ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="'.$value['menulink'].'">'.$value['menunomb'].'
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Liga MX</a></li>
                                        <li><a href="#">Ascenso MX</a></li>
                                        <li><a href="#">Copa MX</a></li> 
                                    </ul>
                                </li>
                            </ul> ';
                    }
                
                ?>
                
    
                <ul class="nav navbar-nav navbar-right">
                    
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesion</a></li>
                </ul>
            </div>    
        </div>
    </nav>
    <!--Menu Header-->
    
    <div class="row">
        <div class="img-parallax" style="background-image: url('../assets/images/img-presentacion2.jpg');">
            <div class="caption">
                <span class="border">Cuidados Medicos</span>
            </div>
        </div>

        <div class="div-text">
            <div class="back-white">
                <div class="div-item">
                    <div class="div-details"></div>
                    <div class="div-section"></div>
                </div>
            
                <div class="div-item">
                    <div class="div-section"></div>
                </div>
            
                <div class="div-item">
                    <div class="div-section"></div>
                </div>
            
                <div class="div-item">
                    <div class="div-section"></div>
                </div>
                <div class="div-item">
                    <div class="div-section"></div>
                </div>
            </div>
        </div>
    </div>
    

    
    <!--<div class="back-white">
        <div class="div-circle"><span class="glyphicon glyphicon-envelope icon-ind"></span></div>
        <div class="div-circle"><span class="glyphicon glyphicon-user icon-ind"></span></div>
        <div class="div-circle"><span class="glyphicon glyphicon-asterisk icon-ind"></span></div>
        <div class="div-circle"><span class="glyphicon glyphicon-book icon-ind"></span></div>
        <div class="div-circle"><span class="fas fa-at icon-ind"></span></div>
    </div>-->

    <div class="row">
        <div class="img-parallax" style="background-image: url('../assets/images/img-presentacion1.jpg');">
            <div class="caption">
                <span class="border">Cuidados Medicos</span>
            </div>
        </div>

        <div class="div-text">
            <h3 class="text-center">Prueba</h3>
            
        </div>
    </div>

    <div class="row">
        <div class="img-parallax" style="background-image: url('../assets/images/img-presentacion.jpg');">
            <div class="caption">
                <span class="border">Cuidados Medicos</span>
            </div>
        </div>

        <div class="div-text">
            <h3 class="text-center">Prueba</h3>
            <p></p>
        </div>
    </div>
    
    <script src="../assets/js/jquery-3.3.1.js"></script>
    <script src='../assets/bootstrap/js/bootstrap.min.js'></script>
</body>
</html>