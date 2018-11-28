<?php

require_once "controle.php";

session_start();



$adm = $_SESSION['adm'];
$_SESSION['id'] = $adm['id'];
$_SESSION['nome'] = $adm['nome'];
$_SESSION['usuario'] = $adm['usuario'];
$_SESSION['senha'] = $adm['senha'];
$_SESSION['tipo'] = $adm['tipo'];

$retorno = buscarLogin($_SESSION['id']);

$_SESSION['tipo'] = $retorno['tipo'];

$_SESSION['usuario'] = $usuario;
$_SESSION['senha'] = $senha;
header('location:index.php');

?>