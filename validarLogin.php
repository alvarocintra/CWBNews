<?php

session_start();

require_once "controle.php";

$login = $_POST['login'];
$senha = $_POST['senha'];

$retorno = validarLogin($login,$senha);

if(!empty($retorno))
{
    $id = $retorno['id'];

    $adm = buscarLogin($id);
    $_SESSION['adm'] = $adm; 
    
    header("location: session.php");
    //echo "Olá Sr(a) ".$cliente['nome'].", seja bem-vindo.";
}
else 
{
    echo "Login ou senha inválido(s)";
}

?>


<?php /* if (isset($_SESSION['id'])){
    //mostra informações
}
else
{
    echo "seila"
} */
?>

