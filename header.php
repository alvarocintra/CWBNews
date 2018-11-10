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
                                    <li><a href="#">Notícias</a>
                                        <div class="dropdown">
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="#">Locais</a></li>
                                                <li><a href="#">Brasil</a></li>
                                                <li><a href="#">Mundo</a></li>
                                            </ul>                                            
                                        </div>
                                    </li>
                                    <li><a href="#">Entreterimento</a>
                                        <ul class="dropdown">
                                            <li><a href="index.html">Home</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Esportes</a></li>
                                    <li><a href="#">Contato</a></li>
                                    <?php 
                                        session_start();
                                        if(isset($_SESSION['id'])) 
                                        { 
                                            //include_once ("logout.php"); 
                                        ?>                                        
                                        <li><a class="btn bg-transparent" href="addNews.php"><i class="fa fa-address-book text-dark"></i></a></li>
                                        <li><a class="btn bg-transparent" href="logout.php"><i class="fa fa-power-off text-dark"></i></a></li>
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