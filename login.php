<html>
<head>
    <title>Cadastro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar_sticky-footer-navbar.css" rel="stylesheet">
</head>
<body>
<div class="container" style="width:100px;">
</div>
<div class="container" id="container">
    <div class="row">
        <div class="col-sm-4 offset-sm-4 text center shadow-lg p-4 mb-4 rounded">
            <h1 class="display-3 text-center">Login</h1>        
            <form action="validarLogin.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" name="login" class="form-control" id="login" placeholder="Digite seu login" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" class="form-control" id="senha" placeholder="Digite sua senha">
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="CONECTAR" style="width:100%"/>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/jquery-latest.min.js"></script>
</body>