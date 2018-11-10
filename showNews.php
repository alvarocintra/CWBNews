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

$noticias = listarNoticias();
?>

