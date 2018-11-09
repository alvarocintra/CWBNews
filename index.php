<?php

    require_once "controle.php";   

    $id = "";
    $titulo = "";
    $resumo = "";
    $noticiaCompleta = "";
    $fonte = "";
    $autor = "";    
    $dataPostagem = "";
    $destaque = "";
    $id_categoria = "";
    $newsImg = "";
    if(!empty($_FILES)) 
    {
        $caminho_arquivo = "D:\\xampp\\htdocs\\cwbnews\\img\\";
         
        $nome_arquivo = $_FILES['newsImg']['name'];
         
        move_uploaded_file($_FILES['newsImg']['tmp_name'], $caminho_arquivo.$nome_arquivo);
         
        $newsImg = 'img/'.$nome_arquivo;
    }

    if (!empty($_GET)) 
    {
        $id = $_GET['id'];
        if ($_GET['acao'] == 'carregar') 
        {
            $noticia = buscarNoticia($id);
            $titulo = $noticia['titulo'];
            $dataPostagem = $noticia['dataPostagem'];
            $resumo = $noticia['resumo'];
            $noticiaCompleta = $noticia['noticiaCompleta'];
            $autor = $noticia['autor'];
            $newsImg = $noticia['newsImg'];            
            $fonte = $noticia['fonte'];
            $destaque = $noticia['destaque'];
            $newsImg = $noticia['newsImg'];
            $id_categoria = $noticia['id_categoria'];           
        }
        if ($_GET['acao'] == 'excluir') 
        {
            excluirNoticia($id);
        }        
    }

    if(!empty($_POST)) 
    {
        $_POST['newsImg'] = $newsImg;
    }

    $noticias = listarNoticias();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Newsbox - Modern Magazine &amp; Newspaper HTML Template</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="newsbox-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container-fluid">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="newsboxNav">

                        <!-- Nav brand -->
                        <a href="index.html" class="nav-brand"><img src="img/core-img/logo.png" alt="Portal de Notícias CWB News"></a>

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
                                    <li><a href="#">Esportes</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Futebol</a></li>
                                            <li><a href="#">Basquete</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Contato</a></li>
                                    <?php 
                                        session_start();
                                        if(isset($_SESSION['id'])) 
                                        { 
                                            //include_once ("logout.php"); 
                                        ?>
                                        <li><a href="logout.php">Logout</a></li>
                                        <li><a href="addNews.php">Adicionar</a></li>
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

    <!-- ##### Breaking News Area Start ##### -->
    <section class="breaking-news-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Breaking News Widget -->
                    <div class="breaking-news-ticker d-flex flex-wrap align-items-center">
                        <div class="title">
                            <h6>Últimas notícias</h6>
                        </div>
                        <div id="breakingNewsTicker" class="ticker">
                            <ul>
                                <?php
                                    foreach ($noticias as $noticia) 
                                    {
                                        if ($noticia['destaque'])
                                        {
                                ?>
                                            <li>
                                                <a href="showNews.php?id=<?=$noticia['id']?>">
                                                    <?=$noticia['titulo']?>
                                                </a>
                                            </li>
                                <?php
                                        } 
                                    } 
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <!-- ##### Intro News Area Start ##### -->
    <section class="intro-news-area section-padding-100-0 mb-70">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Intro News Tabs Area -->
                <div class="col-12 col-lg-8">
                    <div class="intro-news-tab">
                        <!-- Intro News Filter -->
                        <div class="intro-news-filter d-flex justify-content-between">
                            <h6>CWBNews Notícias</h6>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav1" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1" aria-selected="true">Locais</a>
                                    <a class="nav-item nav-link" id="nav2" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2" aria-selected="false">Brasil</a>
                                    <a class="nav-item nav-link" id="nav3" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-3" aria-selected="false">Mundo</a>
                                    <a class="nav-item nav-link" id="nav4" data-toggle="tab" href="#nav-4" role="tab" aria-controls="nav-4" aria-selected="false">Esportes</a>
                                </div>
                            </nav>
                        </div>
                        
                        <!-- INÍCIO TAB NOTÍCIAS -->
                        
                        <div class="tab-content" id="nav-tabContent">
                        <?php
                            foreach ($noticias as $noticia)
                            {
                        ?>    
                            <?php                                                                
                                if ($noticia['id_categoria']==1)
                                {
                            ?>
                            <!-- INÍCIO TAB NOTICIAS LOCAIS -->
                            <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav1">
                                <div class="row">
                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="showNews.php?id=<?=$id?>"><img src="<?=$noticias['newsImg']?>" alt="<?=$noticia['titulo']?>"></a>
                                            </div>
                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date"><?=$noticia['dataPostagem']?></span>
                                                <a href="#" class="post-title"><?=$noticia['titulo']?></a>
                                                <p class="post-author">Por: <?=$noticia['titulo']?></p>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            <?php        
                                }
                            ?>
                            <?php
                                }
                            ?>
                            <?php
                            foreach ($noticias as $noticia)
                                {
                            ?> 
                            <?php                                                                
                                if ($noticia['id_categoria']==2)
                                    {
                            ?>
                            <!-- INÍCIO TAB BRASIL -->                             
                            <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav2">
                                <div class="row">
                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="showNews.php?id=<?=$id?>"><img src="<?=$noticias['newsImg']?>" alt="<?=$noticia['titulo']?>"></a>
                                            </div>
                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date"><?=$noticia['dataPostagem']?></span>
                                                <a href="#" class="post-title"><?=$noticia['titulo']?></a>
                                                <p class="post-author">Por: <?=$noticia['titulo']?></p>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                                <?php        
                                    }
                                ?>
                            <?php        
                                }
                            ?>
                            <?php
                            foreach ($noticias as $noticia)
                                {
                            ?> 
                            <?php                                                                
                                if ($noticia['id_categoria']==3)
                                    {
                            ?>
                            <!-- INICIO TAB MUNDO -->
                            <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav3">
                                <div class="row">
                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="showNews.php?id=<?=$id?>"><img src="<?=$noticias['newsImg']?>" alt="<?=$noticia['titulo']?>"></a>
                                            </div>
                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date"><?=$noticia['dataPostagem']?></span>
                                                <a href="#" class="post-title"><?=$noticia['titulo']?></a>
                                                <p class="post-author">Por: <?=$noticia['titulo']?></p>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <?php        
                                }
                            ?>
                            <?php        
                                }
                            ?>
                        <?php
                            foreach ($noticias as $noticia)
                                {
                        ?> 
                            <?php                                                                
                                if ($noticia['id_categoria']==4)
                                    {
                            ?>
                            <!-- INICIO TAB ESPORTES -->
                            <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav4">
                                <div class="row">
                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="showNews.php?id=<?=$id?>"><img src="<?=$noticias['newsImg']?>" alt="<?=$noticia['titulo']?>"></a>
                                            </div>
                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date"><?=$noticia['dataPostagem']?></span>
                                                <a href="#" class="post-title"><?=$noticia['titulo']?></a>
                                                <p class="post-author">Por: <?=$noticia['titulo']?></p>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                                <?php
                                    }
                                ?>
                            <?php
                                }
                            ?>              
                        </div>                        
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                    <div class="sidebar-area">
                        <!-- Newsletter Widget -->
                        <div class="single-widget-area newsletter-widget mb-30">
                            <h4>Inscreva-se para receber nossas notícias</h4>
                            <form action="#" method="post">
                                <input type="email" name="nl-email" id="nlemail" placeholder="Seu E-mail">
                                <button type="submit" class="btn newsbox-btn w-100">Inscreva-se</button>
                            </form>
                            <p class="mt-30">Ao se cadastrar você concorda em receber nossas atualizações por e-mail.</p>
                        </div>

                        <!-- Add Widget -->
                        <div class="single-widget-area add-widget mb-30">
                            <a href="#">
                                <img src="img/bg-img/add3.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Intro News Area End ##### -->

    <!-- ##### Video Area Start ##### -->
    <section class="video-area bg-img bg-overlay bg-fixed" style="background-image: url(img/bg-img/10.jpg);">
        <div class="container">
            <div class="row">
                <!-- Featured Video Area -->
                <div class="col-12">
                    <div class="featured-video-area d-flex align-items-center justify-content-center">
                        <div class="video-content text-center">
                            <a href="#" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                            <span class="published-date">June 20, 2018</span>
                            <h3 class="video-title">Traffic Problems in Time Square</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Slideshow -->
        <div class="video-slideshow py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Video Slides -->
                        <div class="video-slides owl-carousel">

                            <!-- Single News Area -->
                            <div class="single-blog-post style-3">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail">
                                    <a href="#"><img src="img/bg-img/11.jpg" alt=""></a>
                                    <a href="#" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">June 20, 2018</span>
                                    <p class="post-title">Elon Musk: Tesla worker admitted to sabotage</p>
                                    <a href="#" class="post-author">By Michael Smith</a>
                                </div>
                            </div>

                            <!-- Single News Area -->
                            <div class="single-blog-post style-3">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail">
                                    <a href="#"><img src="img/bg-img/12.jpg" alt=""></a>
                                    <a href="#" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">June 20, 2018</span>
                                    <p class="post-title">Rachel Sm ith breaks down while discussing border crisis </p>
                                    <a href="#" class="post-author">By Michael Smith</a>
                                </div>
                            </div>

                            <!-- Single News Area -->
                            <div class="single-blog-post style-3">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail">
                                    <a href="#"><img src="img/bg-img/13.jpg" alt=""></a>
                                    <a href="#" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">June 20, 2018</span>
                                    <p class="post-title">Dow falls 287 points as trade war fears escalate</p>
                                    <a href="#" class="post-author">By Michael Smith</a>
                                </div>
                            </div>

                            <!-- Single News Area -->
                            <div class="single-blog-post style-3">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail">
                                    <a href="#"><img src="img/bg-img/11.jpg" alt=""></a>
                                    <a href="#" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">June 20, 2018</span>
                                    <p class="post-title">Elon Musk: Tesla worker admitted to sabotage</p>
                                    <a href="#" class="post-author">By Michael Smith</a>
                                </div>
                            </div>

                            <!-- Single News Area -->
                            <div class="single-blog-post style-3">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail">
                                    <a href="#"><img src="img/bg-img/12.jpg" alt=""></a>
                                    <a href="#" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">June 20, 2018</span>
                                    <p class="post-title">Rachel Sm ith breaks down while discussing border crisis </p>
                                    <a href="#" class="post-author">By Michael Smith</a>
                                </div>
                            </div>

                            <!-- Single News Area -->
                            <div class="single-blog-post style-3">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail">
                                    <a href="#"><img src="img/bg-img/13.jpg" alt=""></a>
                                    <a href="#" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">June 20, 2018</span>
                                    <p class="post-title">Dow falls 287 points as trade war fears escalate</p>
                                    <a href="#" class="post-author">By Michael Smith</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Video Area End ##### -->

    <!-- ##### Top News Area Start ##### -->
    <div class="top-news-area section-padding-100">
        <div class="container">
            <div class="row">

                <!-- Single News Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-blog-post style-2 mb-5">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="#"><img src="img/bg-img/4.jpg" alt=""></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">June 20, 2018</span>
                            <a href="#" class="post-title">Elon Musk: Tesla worker admitted to sabotage</a>
                            <a href="#" class="post-author">By Michael Smith</a>
                        </div>
                    </div>
                </div>

                <!-- Single News Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-blog-post style-2 mb-5">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="#"><img src="img/bg-img/5.jpg" alt=""></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">June 20, 2018</span>
                            <a href="#" class="post-title">Rachel Sm ith breaks down while discussing border crisis </a>
                            <a href="#" class="post-author">By Michael Smith</a>
                        </div>
                    </div>
                </div>

                <!-- Single News Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-blog-post style-2 mb-5">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="#"><img src="img/bg-img/6.jpg" alt=""></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">June 20, 2018</span>
                            <a href="#" class="post-title">Dow falls 287 points as trade war fears escalate</a>
                            <a href="#" class="post-author">By Michael Smith</a>
                        </div>
                    </div>
                </div>

                <!-- Single News Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-blog-post style-2 mb-5">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="#"><img src="img/bg-img/7.jpg" alt=""></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">June 20, 2018</span>
                            <a href="#" class="post-title">Elon Musk: Tesla worker admitted to sabotage</a>
                            <a href="#" class="post-author">By Michael Smith</a>
                        </div>
                    </div>
                </div>

                <!-- Single News Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-blog-post style-2 mb-5">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="#"><img src="img/bg-img/8.jpg" alt=""></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">June 20, 2018</span>
                            <a href="#" class="post-title">Rachel Sm ith breaks down while discussing border crisis </a>
                            <a href="#" class="post-author">By Michael Smith</a>
                        </div>
                    </div>
                </div>

                <!-- Single News Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-blog-post style-2 mb-5">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="#"><img src="img/bg-img/9.jpg" alt=""></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">June 20, 2018</span>
                            <a href="#" class="post-title">Dow falls 287 points as trade war fears escalate</a>
                            <a href="#" class="post-author">By Michael Smith</a>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="load-more-button text-center">
                        <a href="#" class="btn newsbox-btn">Load More</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ##### Top News Area End ##### -->

    <!-- ##### Add Area Start ##### -->
    <div class="big-add-area mb-100">
        <div class="container-fluid">
            <a href="#"><img src="img/bg-img/add2.png" alt=""></a>
        </div>
    </div>
    <!-- ##### Add Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <!-- Footer Logo -->
        <div class="footer-logo mb-100">
            <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
        </div>
        <!-- Footer Content -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-content text-center">
                        <!-- Footer Nav -->
                        <div class="footer-nav">
                            <ul>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Closed Captioning</a></li>
                                <li><a href="#">Site Map</a></li>
                            </ul>
                        </div>
                        <!-- Social Info -->
                        <div class="footer-social-info">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="behance"><i class="fa fa-behance" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>

                        <p class="mb-15">Nullam lacinia ex eleifend orci porttitor, suscipit interdum augue condimentum. Etiam pretium turpis eget nibh laoreet iaculis. Proin ac urna at lectus volutpat lobortis. Vestibulum venenatis iaculis diam vitae lobortis. Donec tincidunt viverra elit, sed consectetur est pr etium ac. Mauris nec mauris tellus. </p>

                        <!-- Copywrite Text -->
                        <p class="copywrite-text"><a href="#">
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>