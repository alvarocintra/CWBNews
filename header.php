<?php
        // if (!empty($_GET)) 
        // {
        //     $id = $_GET['id'];
        //     if ($_GET['acao'] == 'carregar') 
        //     {
        //         $adm = buscarUsuario($id);
        //         $nome = $adm['nome'];
        //         $usuario = $adm['usuario'];
        //         $senha = $adm['senha'];
        //         $email = $adm['email'];          
        //     }
        //     if ($_GET['acao'] == 'excluir') 
        //     {
        //         excluirUsuario($id);
        //     }
        // }  

        // $adms = listarUsuarios();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>CWBNews - Site de notícias</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">  
    <!-- Summernote -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
</head>

<!-- ##### Header Area Start ##### -->
<header class="header-area">
        <!-- Navbar Area -->
        <div class="newsbox-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container-fluid">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="newsboxNav">

                        <!-- Nav brand -->
                        <a href="index.php" class="nav-brand"><img src="img/core-img/logo.png" alt="Portal de Notícias CWB News"></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.php">Início</a></li>
                                    <li><a href="#">Notícias</a>
                                        <div class="dropdown">
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="locais.php">Locais</a></li>
                                                <li><a href="brasil.php">Brasil</a></li>
                                                <li><a href="mundo.php">Mundo</a></li>
                                            </ul>                                            
                                        </div>
                                    </li>                                    
                                    <li><a href="esportes.php">Esportes</a></li>
                                    <li><a href="contato.php">Contato</a></li>
                                    <?php
                                        session_start(); 
                                        if(!isset($_SESSION['id']))
                                        {
                                    ?>
                                    <li><a href="cadastroUsuario.php">Cadastre-se</a></li>
                                    <li><a href="login.php">Login</a></li>
                                    <?php
                                        }
                                    ?>
                                    <?php                                         
                                        if(isset($_SESSION['id'])) 
                                        {  
                                        ?>
                                        <?php
                                            if($_SESSION['id']==1)
                                            {
                                        ?>
                                            <li><a class="btn bg-transparent" href="addNews.php"><i class="fa fa-plus-circle text-dark"></i></a></li>
                                            <li><a class="btn bg-transparent" href="logout.php"><i class="fa fa-power-off text-dark"></i></a></li>                                        
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                            <li><a class="btn bg-transparent" href="user.php?acao=carregar&id=<?=$_SESSION['id']?>"><i class="fa fa-user text-dark"></i></a></li>
                                            <li><a class="btn bg-transparent" href="logout.php"><i class="fa fa-power-off text-dark"></i></a></li>                                        
                                        <?php
                                            }
                                        ?>                                      
                                        <?php 
                                        }
                                        ?>        
                                    
                                </ul>

                                <!-- Header Add Area -->
                                <!-- <div class="header-add-area">
                                    <a href="#">
                                       <img src="img/bg-img/add.png" alt="">
                                    </a>
                                </div> -->
                            </div>
                            <!-- Nav End -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
    <body>