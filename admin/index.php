<?php 
    session_start();

    if(!$_SESSION['usuanume']){
        header('Location: login.html');
    }

    include "../lib/Classes/BaseController.php";
    $bd=new BaseController();
    header('Content-Type: text/html; charset=utf-8');

    $strSQL="SELECT usuanomb FROM usuarios WHERE usuanume='".$_SESSION['usuanume']."'";
    $usuario=$bd->query($strSQL)->single();
    if($usuario){
        extract($usuario);
    }

    $raiz=$_SERVER['PHP_SELF'];

    $strSQL="SELECT menunomb,menulink,menuicon FROM menu WHERE menuelim=0 order by menuord ASC";
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
    <div class="div-menu">
        <div class="menu">
        <ul>
            <?php
                foreach ($menu as $key => $value) {
                    if($value['menulink']==$raiz){
                        $activo=" active";
                    }else{
                        $activo="";
                    }
                    echo '<li class="menu-li '.$activo.'">
                            <a href="'.$value['menulink'].'"><span class="'.$value['menuicon'].'"> '.$value['menunomb'].'<span></a>
                        </li>
                        ';
                }
            ?>
        </ul>
        </div>
    </div>
    <!--Header Menu-->
    <nav class="navbar navbar-white navbar-fixed-top">
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
                
                
    
                <ul class="nav navbar-nav navbar-right">
                    <li id="btn-menu"><a href="javascript:void(0)"><span class="glyphicon glyphicon-th-list"></span> Menu</a></li>
                    <li data-toggle="modal" data-target="#modalCerrarSesion"><a href="javascript:void(0)"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesion</a></li>
                </ul>
            </div>    
        </div>
    </nav>
    <!--Menu Header-->



    <!-- Inicia visor-->
    <div id="div-visor"></div>
       

    <div id="modalCerrarSesion" class="modal fade" role="dialog" style="padding:0px">
        <div class="modal-dialog">

            <!-- Modal content-->
            <form method="POST" action="logout.php">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Cerrar Sesión</h4>
                    </div>
                    <div class="modal-body text-center">
                        <p>¿Esta seguro que desea cerrar sesión?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Si</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="div-footer">
        
            <div class="row">
                <div class="col-sm-4 div-black">
                    <div class="row row-informacion-footer">
                        <div class="col-sm-6">
                            <h1>Logo</h1>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-5">
                            <h1>Nombre de la empresa</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 div-black">
                    <h1>Sobre Nosotros</h1>
                    <p>Información sobre la actividad que realiza la empresa</p>
                    <p>Contactanos: xxxxxxxx@gmail.com</p>
                </div>
                <div class="col-sm-4 div-black">
                    <h1>Siguenos</h1>

                    <div class="div-redes">
                        <div>
                            <i class="fab fa-facebook-f pointer texto-20 hov-azul"></i>
                        </div>
                        <div>
                            <i class="fab fa-google-plus-g pointer texto-20 hov-rojo"></i>
                        </div>
                        <div>
                            <i class="fab fa-twitter pointer texto-20 hov-celeste"></i>
                        </div>
                        <div>
                            <i class="fab fa-youtube pointer texto-20 hov-rojo"></i>
                        </div>               
                    </div>
                </div>
            </div>
            
        
    </div>




    
    <script src="../assets/js/jquery-3.3.1.js"></script>
    <script src='../assets/bootstrap/js/bootstrap.min.js'></script>
    <script src='../assets/js/funciones.js'></script>
    <script src='../assets/js/comun.js'></script>
</body>
</html>