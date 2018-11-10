<?php

require_once "controle.php";

if (!empty($_GET)) 
{
    $id = $_GET['id'];
    if ($_GET['acao'] == 'carregar') 
    {
        $noticia = buscarNoticia($id);   
        $titulo = $noticia['titulo'];
        $resumo = $noticia['resumo'];
        $noticiaCompleta = $noticia['noticiaCompleta'];
        $autor = $noticia['autor'];
        $newsImg = $noticia['newsImg']; 
        $dataPostagem = $noticia['dataPostagem'];
        $fonte = $noticia['fonte'];
        $destaque = $noticia['destaque'];
        $id_categoria = $noticia['id_categoria'];            
    }
}

?>

<?php
    include_once("header.php");
?>
<div class=container>
    <div class="col-md-12">
        <?php 
            if($noticia['id_categoria']==1)
            {
                echo '<h3 class="text-danger">Locais</h3>';
            } 
            else if($noticia['id_categoria']==2)
            {
                echo '<h3 class="text-danger">Brasil</h3>';
            }
            else if($noticia['id_categoria']==3)
            {
                echo '<h3 class="text-danger">Mundo</h3>';
            }
            else if($noticia['id_categoria']==4)
            {
                echo '<h3 class="text-danger">Esportes</h3>';
            }            
        ?>
        
    <div class="col-md-12">
        <h1><?=$noticia['titulo']?></h1>
    </div>    
    <div class="col-md-12">
       <h5 class="text-muted"><?=$noticia['resumo']?></h6>
    </div>
    <div class="col-md-12">
        <p class="text-muted">Data: <?=$noticia['dataPostagem']?> / Por: <?=$noticia['autor']?></p>
    </div>
    <div class="col-md-12 text-center">
        <img src="<?=$noticia['newsImg']?>" alt="<?=$noticia['titulo']?>">
    </div>
    <div class="col-md-12">
       <p><?=$noticia['noticiaCompleta']?></p>
    </div>
    <div class="col-md-12">
        <p><b>Fonte:</b> <i><?=$noticia['fonte']?></i></p>
    </div>
</div>

<?php 
    include_once("footer.php"); 
?>