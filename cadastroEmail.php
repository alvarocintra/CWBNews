<?php
require_once "controle.php";

$id = "";
$email = "";

if (!empty($_GET)) 
{
    $id = $_GET['id'];
    if ($_GET['acao'] == 'carregar') 
    {
        $email = $usuario['email'];          
    }
    if ($_GET['acao'] == 'excluir') 
    {
        excluirEmail($id);
    }
} 

if(!empty($_POST)) 
{                       
    if(empty($_POST['id'])) 
    { 
        salvarEmail($_POST);
    }            
    else 
    {
        editarEmail($_POST);
    }
}



//echo $email;
header('location:index.php');

?>