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
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

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
?>

<main role="main" class="container">
<div class="container border">
<form action="cadastroUsuario.php" method="POST"
        enctype="multipart/form-data">
    <div class="row bg-secondary text-center">
        <div class="col-md-12 text-center">
            <h5 class="text-light">Bem vindo a tela de edição, <?=$nome?> </h5>
        </div>
    </div>
    <input type="hidden" name="id" value="<?=$id?>"/>
    <div class="form-group">
        <label style="margin-top:20px" for="nome">Nome</label>
        <input type="text" name="nome" class="form-control" 
        id="nome" placeholder="Digite o nome"
        value="<?=$nome?>" required>
    </div>
    <div class="form-group">
        <label for="usuario">Login</label>
        <input type="text" name="usuario" class="form-control" 
        id="usuario" placeholder="Digite o login"
        value="<?=$usuario?>" required>
    </div>
    <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" name="senha" class="form-control" 
        id="senha" placeholder="Digite a senha"
        value="<?=$senha?>" required>
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" name="email" class="form-control" 
        id="email" placeholder="Digite o e-mail"
        value="<?=$email?>" required>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success w-100"/>
    </div>
</div>
</main>

    <?php
    include_once("footer.php");
    ?>
