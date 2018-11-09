<?php

require_once "controle.php";

session_start();

$adm = $_SESSION['adm'];
$_SESSION['id'] = $adm['id'];
$_SESSION['nome'] = $adm['nome'];
$_SESSION['login'] = $adm['login'];
$_SESSION['senha'] = $adm['senha'];

$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
header('location:addNews.php');

?>