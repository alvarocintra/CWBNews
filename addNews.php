<?php

    require_once "DAO.php";
    require_once "controle.php";

    $newsImg = "";
    if(!empty($_FILES)) {
        $caminho_arquivo = "D:\\xampp\\htdocs\\sistema\\img\\";
         
        $nome_arquivo = $_FILES['newsImg']['name'];
         
        move_uploaded_file($_FILES['newsImg']['tmp_name'], $caminho_arquivo.$nome_arquivo);
         
        $newsImg = 'img/'.$nome_arquivo;
    }

    $id = "";
    $titulo = "";
    $resumo = "";
    $noticiaCompleta = "";
    $fonte = "";
    $autor = "";    
    $dataPostagem = "";
    $destaque = "";
    $categoria = "";
    
    if (!empty($_GET)) {
        $id = $_GET['id'];
        if ($_GET['acao'] == 'carregar') {
            $noticia = buscarNoticia($id);
            $titulo = $noticia['titulo'];
            $resumo = $noticia['resumo'];
            $noticiaCompleta = $noticia['noticiaCompleta'];
            $autor = $noticia['autor'];
            $newsImg = $noticia['newsImg']; 
            $dataPostagem = $noticia['dataPostagem'];
            $fonte = $noticia['fonte'];
            $destaque = $noticia['destaque'];
            $categoria = $noticia['categoria'];            
        }
        if ($_GET['acao'] == 'excluir') {
            excluirNoticia($id);
        }
    }

   // print_r($_POST);
    if(!empty($_POST)) {
        $_POST['newsImg'] = $newsImg;
        
        if(empty($_POST['id'])) { 
            salvarNoticia($_POST);
        }
        else {
            editarNoticia($_POST);
        }
    }

    $noticias = listarNoticias();

   // print_r($clientes);

?>
<html>
<head>
    <title>Cadastro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar_sticky-footer-navbar.css" rel="stylesheet">

</head>
<body >

<?php
//include_once("header.php");
?>

<main role="main" class="container">


<?php
    session_start();

    if (!isset($_SESSION['id']))
    {
        include_once("login.php");
    }
    else 
    { ?>

<h1>Cadastro de Noticia</h1>
<form action="addNews.php" method="POST"
    enctype="multipart/form-data">
<input type="hidden" name="id" value="<?=$id?>"/>
<img src="<?=$newsImg?>" class="rounded-circle"/>
<div class="form-group">
    <label for="titulo">Titulo</label>
    <input type="text" name="titulo" class="form-control" 
    id="titulo" placeholder="Digite o título"
    value="<?=$titulo?>"
    required >
</div>
<div class="form-group">
    <label for="resumo">Resumo</label>
    <input type="text" name="resumo" class="form-control" 
    id="resumo" placeholder="Digite o resumo"
    value="<?=$resumo?>"
     >
</div>
<div class="form-group">
    <label for="noticiaCompleta">Noticia Completa</label>
    <input type="textarea" name="noticiaCompleta" class="form-control" 
    id="noticiaCompleta" placeholder="Digite a notícia completa"    
    value="<?=$noticiaCompleta?>">
</div>
<div class="form-group">
    <label for="fonte">Fonte</label>
    <input type="text" name="fonte" class="form-control" 
    id="fonte" placeholder="Digite a fonte"
    value="<?=$fonte?>"
     >
</div>
<div class="form-group">
    <label for="autor">Autor</label>
    <input type="text" name="autor" class="form-control" 
    id="autro" placeholder="Digite o autor"
    value="<?=$autor?>"
     >
</div>
<div class="form-group">
    <label for="dataPostagem">Data de Postagem</label>
    <input type="date" name="dataPostagem" class="form-control" 
    id="dataPostagem" placeholder="Digite a data de postagem"
    value="<?=$dataPostagem?>"
    >
</div>
<div class="form-group">
    <label for="destaque">Destaque</label>
    <select class="form-control" name="destaque" class="form-control" 
    id="destaque" placeholder="Notícia em destaque?"
    value="<?=$destaque?>"
    >
    <option>SIM</option>
    <option>NÃO</option>
    </select>
</div>
<div class="form-group">
    <label for="categoria">Categoria</label>
    <select class="form-control" name="categoria" class="form-control" 
    id="categoria" placeholder="Selecione a categoria"
    value="<?=$categoria?>"
    >
    <option>Locais</option>
    <option>Brasil</option>
    <option>Mundo</option>
    <option>Futebol</option>
    <option>Basquete</option>
    <option>Entrenterimento</option>
    </select>
</div>
<div class="form-group">
    <label for="newsImg">Imagem</label>
    <input type="file" name="newsImg" class="form-control" 
    id="newsImg">
</div>
<input type="submit" value="Salvar" class="btn btn-primary" />
</form>

<table class="table">
    <tr>
        <th>ID</th>        
        <th>NOME</th>        
        <th>&nbsp;</th>    
        <th>&nbsp;</th>    
    </tr>
    <?php

    foreach ($noticias as $noticia) {
    
    ?>
    <tr>
        <td><?=$noticia['id']?></td>        
        <td><?=$noticia['titulo']?></td>        
        <td><a href="addNews.php?acao=carregar&id=<?=$noticia['id']?>"
         class="btn btn-primary">Carregar</a>
         </td>     
        <td>
        <a href="addNews.php?acao=excluir&id=<?=$noticia['id']?>"
         class="btn btn-primary"
         onclick="return confirm('Você está certo disso?');">Excluir</a>        
        </td>     
    </tr>
</table>
<?php } ?>

<?php } ?>

</main>
    
<script type="text/javascript" 
    src="js/jquery-latest.min.js"></script>

</body>
</html>