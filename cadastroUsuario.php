<?php
        require_once "controle.php";

        $id = "";
        $nome = "";
        $usuario = "";
        $senha = "";
        $email = "";
        
        if (!empty($_GET)) 
        {
            $id = $_GET['id'];
            if ($_GET['acao'] == 'carregar') 
            {
                $adm = buscarUsuario($id);
                $nome = $adm['nome'];
                $usuario = $adm['usuario'];
                $senha = $adm['senha'];
                $email = $adm['email'];          
            }
            if ($_GET['acao'] == 'excluir') 
            {
                excluirUsuario($id);
            }
        }    
       
        if(!empty($_POST)) 
        {                       
            if(empty($_POST['id'])) 
            { 
                salvarUsuario($_POST);
            }
            else 
            {
                editarUsuario($_POST);
            }
        }
    
        $adms = listarUsuarios();      

?>
<html>
<head>
    <title>Cadastro de Usuários</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar_sticky-footer-navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body >

<?php
    include_once("header.php");

    echo $nome;
    echo $email;
    echo $id;
?>

<main role="main" class="container">
<div class="container border">
<form action="cadastroUsuario.php" method="POST"
        enctype="multipart/form-data">
    <div class="row bg-secondary text-center">
        <div class="col-md-12 text-center">
            <h1 class="text-light">Cadastro de Usuário</h1>
        </div>
    </div>
    <input type="hidden" name="id" value="<?=$id?>"/>
    <div class="form-group">
        <label style="margin-top:20px" for="nome">Nome</label>
        <input type="text" name="nome" class="form-control" 
        id="nome" placeholder="Digite o nome"
        value="<?=$adm['nome']?>" required>
    </div>
    <div class="form-group">
        <label for="usuario">Login</label>
        <input type="text" name="usuario" class="form-control" 
        id="usuario" placeholder="Digite o login"
        value="<?=$_SESSION['usuario']?>" required>
    </div>
    <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" name="senha" class="form-control" 
        id="senha" placeholder="Digite a senha"
        value="<?=$_SESSION['senha']?>" required>
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" name="email" class="form-control" 
        id="email" placeholder="Digite o e-mail"
        value="<?=$_SESSION['email']?>" required>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success w-100"/>
    </div>
</div>
<br/>

<?php                                         
    if(isset($_SESSION['id'])==1) 
    {  
    ?>
<div class="container border">
    <div class="row bg-primary text-center">
            <div class="col-md-12 text-center">
                <h6 class="text-light">Usuários cadastrados</h1>
            </div>
        </div>
    </div>
    <?php
        foreach ($adms as $adm) 
        {
    ?>
        <div class="row border-bottom" style="height:25px">
            <div class="col-md-1 border-right">
                <p class="small"><?=$adm['id']?></p>
            </div>        
            <div class="col-md-9">
                <p class="small"><?=$adm['nome']?></p>
            </div>        
            <div class="col-md-1">
                <a href="cadastroUsuario.php?acao=carregar&id=<?=$adm['id']?>"
            class="btn btn-sm btn-success" style="margin:2px;padding:3px"><i class="fa fa-edit"></i></a>
            </div>     
            <div class="col-md-1">
            <a href="cadastroUsuario.php?acao=excluir&id=<?=$adm['id']?>"
             class="btn btn-sm btn-danger" style="margin:2px;padding:3px"
             onclick="return confirm('Você está certo disso?');"><i class="fa fa-trash"></i></a>
        </div>     
    </div>
    <?php 
        } 
    ?>
</div>
</div>
<?php
    }
?>                                      
<?php 
    include_once("footer.php");
?>