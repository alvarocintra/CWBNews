<?php

    require_once "controle.php";

    $noticias = listarNoticias();

    $emails = listarEmails();

?>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <?php
    include_once("header.php");
    ?>
    <!-- ##### Breaking News Area Start ##### -->
    <section class="breaking-news-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Breaking News Widget -->
                    <div class="breaking-news-ticker d-flex flex-wrap align-items-center">
                        <div class="title">
                            <h6>DESTAQUES</h6>
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
                                                <a href="showNews.php?acao=carregar&id=<?=$noticia['id']?>">
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
                        
                            <!-- INÍCIO TAB NOTICIAS LOCAIS -->
                            <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav1">
                                <div class="row">
                                <?php
                                    foreach ($noticias as $noticia)
                                    {
                                ?>    
                                    <?php                                                                
                                        if ($noticia['id_categoria']==1)
                                        {
                                    ?>
                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="showNews.phpshowNews.php?acao=carregar&id=<?=$noticia['id']?>"><img src="<?=$noticia['newsImg']?>" alt="<?=$noticia['titulo']?>"></a>
                                            </div>
                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date"><?=$noticia['dataPostagem']?></span>
                                                <a href="showNews.php?acao=carregar&id=<?=$noticia['id']?>" class="post-title"><?=$noticia['titulo']?></a>
                                                <p class="post-author">Por: <?=$noticia['autor']?></p>
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
                            
                            
                            <!-- INÍCIO TAB BRASIL -->                             
                            <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav2">
                                <div class="row">
                                    <!-- Single News Area -->
                                    <?php
                                        foreach ($noticias as $noticia)
                                        {
                                    ?> 
                                    <?php                                                                
                                        if ($noticia['id_categoria']==2)
                                        {
                                    ?>
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="showNews.php?acao=carregar&id=<?=$noticia['id']?>"><img src="<?=$noticia['newsImg']?>" alt="<?=$noticia['titulo']?>"></a>
                                            </div>
                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date"><?=$noticia['dataPostagem']?></span>
                                                <a href="showNews.php?acao=carregar&id=<?=$noticia['id']?>" class="post-title"><?=$noticia['titulo']?></a>
                                                <p class="post-author">Por: <?=$noticia['autor']?></p>
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
                                
                            
                            <!-- INICIO TAB MUNDO -->
                            <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav3">
                                <div class="row">
                                <?php
                                    foreach ($noticias as $noticia)
                                        {
                                    ?> 
                                    <?php                                                                
                                        if ($noticia['id_categoria']==3)
                                            {
                                    ?>
                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="showNews.php?acao=carregar&id=<?=$noticia['id']?>"><img src="<?=$noticia['newsImg']?>" alt="<?=$noticia['titulo']?>"></a>
                                            </div>
                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date"><?=$noticia['dataPostagem']?></span>
                                                <a href="showNews.php?acao=carregar&id=<?=$noticia['id']?>" class="post-title"><?=$noticia['titulo']?></a>
                                                <p class="post-author">Por: <?=$noticia['autor']?></p>
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
                        
                            <!-- INICIO TAB ESPORTES -->
                            <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav4">
                                <div class="row">
                                <?php
                                    foreach ($noticias as $noticia)
                                        {
                                ?> 
                                    <?php                                                                
                                        if ($noticia['id_categoria']==4)
                                            {
                                    ?>
                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="showNews.php?acao=carregar&id=<?=$noticia['id']?>"><img src="<?=$noticia['newsImg']?>" alt="<?=$noticia['titulo']?>"></a>
                                            </div>
                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date"><?=$noticia['dataPostagem']?></span>
                                                <a href="showNews.php?acao=carregar&id=<?=$noticia['id']?>" class="post-title"><?=$noticia['titulo']?></a>
                                                <p class="post-author">Por: <?=$noticia['autor']?></p>
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
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                    <div class="sidebar-area">
                        <!-- Newsletter Widget -->
                        <form action="cadastroEmail.php" method="POST" enctype="multipart/form-data">
                        <!-- <input type="hidden" name="id" value="<?=$email['id']?>"/> -->
                        <div class="single-widget-area newsletter-widget mb-30">
                            <h4>Inscreva-se para receber nossas notícias</h4>                            
                                <input type="email" class="form-control w-100" name="email" id="email" placeholder="Seu E-mail">
                                <button type="submit" class="btn newsbox-btn w-100">Inscreva-se</button>
                            
                            <p class="mt-30">Ao se cadastrar você concorda em receber nossas atualizações por e-mail.</p>
                        </div>
                        </form>
                        <!-- Add Widget 
                        <div class="single-widget-area add-widget mb-30">
                            <a href="#">
                                <img src="img/bg-img/add3.png" alt="">
                            </a> 
                        </div>  -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Intro News Area End ##### -->

    <!-- ##### Video Area Start ##### -->
    <section class="video-area bg-img bg-overlay bg-fixed" style="background-image: url(img/bg-img/01.png);">
        <div class="py-5">
            <div class="container">
                <div class="row">            
                    <!-- Featured Video Area 
                    <div class="col-12">
                        <div class="featured-video-area d-flex align-items-center justify-content-center">
                            <div class="video-content text-center">
                                <a href="showNews.php?acao=carregar&id=<?=$noticia['id']?>" class="btn"><i class="fa fa-note" aria-hidden="true"></i></a>
                                <span class="published-date"><?=$noticia['dataPostagem']?></span>
                                <h3 class="video-title"><a href="showNews.php?acao=carregar&id=<?=$noticia['id']?>" class="post-title"><?=$noticia['titulo']?></a></h3>
                            </div>
                        </div>
                    </div> -->            
                                        
                    <div class="col-12">
                        <!-- Video Slides -->
                        <div class="video-slides owl-carousel">
                        <?php
                            foreach ($noticias as $noticia)
                            {
                        ?> 
                            <?php                                                                
                                if ($noticia['id_categoria']==1)
                                {
                            ?>
                            <!-- Single News Area -->
                            <div class="single-blog-post style-3">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail">
                                    <a href="showNews.php?acao=carregar&id=<?=$noticia['id']?>"><img src="<?=$noticia['newsImg']?>" alt=""></a>
                                </div>
                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date"><?=$noticia['dataPostagem']?></span>
                                    <p class="post-title"><?=$noticia['titulo']?></p>
                                    <a href="#" class="post-author"><?=$noticia['autor']?></a>
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
            </div>
        </div>
        <!-- Video Slideshow -->
        <div class="video-slideshow py-5">
        <div class="container">
                <div class="row">            
                    <!-- Featured Video Area 
                    <div class="col-12">
                        <div class="featured-video-area d-flex align-items-center justify-content-center">
                            <div class="video-content text-center">
                                <a href="showNews.php?acao=carregar&id=<?=$noticia['id']?>" class="btn"><i class="fa fa-note" aria-hidden="true"></i></a>
                                <span class="published-date"><?=$noticia['dataPostagem']?></span>
                                <h3 class="video-title"><a href="showNews.php?acao=carregar&id=<?=$noticia['id']?>" class="post-title"><?=$noticia['titulo']?></a></h3>
                            </div>
                        </div>
                    </div> -->            
                                        
                    <div class="col-12">
                        <!-- Video Slides -->
                        <div class="video-slides owl-carousel">
                        <?php
                            foreach ($noticias as $noticia)
                            {
                        ?> 
                            <?php                                                                
                                if ($noticia['id_categoria']==2)
                                {
                            ?>
                            <!-- Single News Area -->
                            <div class="single-blog-post style-3">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail">
                                    <a href="showNews.php?acao=carregar&id=<?=$noticia['id']?>"><img src="<?=$noticia['newsImg']?>" alt=""></a>
                                </div>
                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date"><?=$noticia['dataPostagem']?></span>
                                    <p class="post-title"><?=$noticia['titulo']?></p>
                                    <a href="#" class="post-author"><?=$noticia['autor']?></a>
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
            </div>
        </div>
    </section>
    <!-- ##### Video Area End ##### -->

    <!-- ##### Top News Area Start ##### -->
    <div class="top-news-area section-padding-100">
        <div class="container">
            <div class="row">
                <?php 
                    foreach ($noticias as $noticia)
                    {
                ?>
                    
                <!-- Single News Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-blog-post style-2 mb-5">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="showNews.php?acao=carregar&id=<?=$noticia['id']?>"><img src="<?=$noticia['newsImg']?>" alt=""></a>
                        </div>
                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date"><?=$noticia['dataPostagem']?></span>
                            <a href="#" class="post-title"><?=$noticia['titulo']?></a>
                            <a href="#" class="post-author"><?=$noticia['autor']?></a>
                        </div>
                    </div>
                </div>

                <?php
                    }
                ?>                

            <!--<div class="col-12">
                    <div class="load-more-button text-center">
                        <a href="#" class="btn newsbox-btn">Load More</a>
                    </div>
                </div> -->

            </div>
        </div>
    </div>
    <!-- ##### Top News Area End ##### -->

    <!-- ##### Add Area Start ##### 
    <div class="big-add-area mb-100">
        <div class="container-fluid">
            <a href="#"><img src="img/bg-img/add2.png" alt=""></a>
        </div>
    </div>
     ##### Add Area End ##### -->

<?php 
    include_once("footer.php"); 
?>