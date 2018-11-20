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
    </div>
    <div class="col-md-12">
        <h1><?=$noticia['titulo']?></h1>
    </div>    
    <div class="col-md-12">
        <h5 class="text-muted"><?=$noticia['resumo']?></h5>
    </div>
    <div class="col-md-12">
        <p><b>Por <?=$noticia['autor']?></b> <?=$noticia['dataPostagem']?></p>
    </div>
    <div class="col-md-12">
        
    </div>    
    <div class="col-md-12 text-center">
        <div class="card rounded-0">
            <img src="<?=$noticia['newsImg']?>" alt="<?=$noticia['titulo']?>" class="card-img-top rounded-0">
            <div style="height:20px" >
                <p class="small card-title"><i>DESCRIÇÃO DA IMAGEM (CRIAR COLUNA NO BANCO)</i></p>
            </div>
        </div>
    </div>
    <div class="col-md-12">
       <p><?=$noticia['noticiaCompleta']?></p>
    </div>
    <div class="col-md-12">
        <p><b>Fonte:</b><a href="<?=$noticia['fonte']?>"> <i class="small"><?=$noticia['fonte']?></i></a></p>
    </div>
</div>
<?php function resume( $var, $limite )
        {	// Se o texto for maior que o limite, ele corta o texto e adiciona 3 pontinhos.	
        if (strlen($var) > $limite)
        	{		
            $var = substr($var, 0, $limite);		
            $var = trim($var) . "...";	
            }
            return $var;
        }
?>
<?php 
    include_once("footer.php"); 
?>