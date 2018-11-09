<?php

require_once "controle.php";

session_start();

$adm = $_SESSION['adm'];
$_SESSION['id'] = $adm['id'];
$_SESSION['nome'] = $adm['nome'];
$_SESSION['login'] = $adm['login'];
$_SESSION['senha'] = $adm['senha'];

/*$conn = conectar();
$result = $conn->prepare("select id, nome, login, senha from adm where id = :id");
//$result->bindParam(':id',$id);

if(($result) != null)
{*/
$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
header('location:addNews.php');
/*}
else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    header('location:index.php');   
}*/

//header("location: addNews.php");

?>