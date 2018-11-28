<?php

session_start();

require_once "controle.php";

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$retorno = validarLogin($usuario,$senha);

if(!empty($retorno))
{
    $id = $retorno['id'];

    $adm = buscarLogin($id);
    $_SESSION['adm'] = $adm; 
    $_SESSION['tipo'] = $adm['tipo'];
    
    header("location: session.php");
}
else 
{
    echo "Login ou senha inválido(s)";
}

?>


<?php /* if (isset($_SESSION['id']))
{
    //mostra informações
}
else
{
    echo "seila"
} */
?>

