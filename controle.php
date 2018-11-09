<?php

require_once "DAO.php";

function salvarNoticia($noticia)  
{  
    $conn = conectar();

    if ($noticia['id']==null)
    {
        $stmt = $conn->prepare('INSERT INTO noticia (titulo,resumo,noticiaCompleta,fonte,autor,newsImg,dataPostagem,destaque,id_categoria) VALUES (:titulo, :resumo, :noticiaCompleta, :fonte, :autor, :newsImg, :dataPostagem, :destaque, :id_categoria)');
        $stmt->bindParam(':titulo',$noticia['titulo']);
        $stmt->bindParam(':resumo',$noticia['resumo']);
        $stmt->bindParam(':noticiaCompleta',$noticia['noticiaCompleta']);
        $stmt->bindParam(':fonte',$noticia['fonte']);
        $stmt->bindParam(':autor',$noticia['autor']);
        $stmt->bindParam(':newsImg',$noticia['newsImg']);
        $stmt->bindParam(':dataPostagem',$noticia['dataPostagem']);
        $stmt->bindParam(':destaque',$noticia['destaque']);
        $stmt->bindParam(':id_categoria',$noticia['id_categoria']);
        if($stmt->execute())
        {
            return "Noticia inserida com sucesso.";
        } 
        else 
        {
            print_r($stmt->errorInfo());
            return "Erro. ";
        }
    }    
}

function editarNoticia($noticia) 
{
    $conn = conectar();

    $stmt = $conn->prepare("UPDATE noticia set titulo=:titulo,resumo=:resumo,noticiaCompleta=:noticiaCompleta,fonte=:fonte,autor=:autor,newsImg=:newsImg,dataPostagem=:dataPostagem,id_categoria=:id_categoria,destaque=:destaque where id = :id");
    $stmt->bindParam(':id',$noticia['id']);
    $stmt->bindParam(':titulo',$noticia['titulo']);
    $stmt->bindParam(':resumo',$noticia['resumo']);
    $stmt->bindParam(':noticiaCompleta',$noticia['noticiaCompleta']);
    $stmt->bindParam(':fonte',$noticia['fonte']);
    $stmt->bindParam(':autor',$noticia['autor']);
    $stmt->bindParam(':newsImg',$noticia['newsImg']);
    $stmt->bindParam(':dataPostagem',$noticia['dataPostagem']);
    $stmt->bindParam(':destaque',$noticia['destaque']);
    $stmt->bindParam(':id_categoria',$noticia['id_categoria']);
    if($stmt->execute()) 
    {
        return "Noticia atualizado com sucesso.";
    } 
    else 
    {
        print_r($stmt->errorInfo());
        return "Erro. ";
    }
}

function listarNoticias() 
{
    $conn = conectar();

    $stmt = $conn->prepare("select id, titulo, resumo, noticiaCompleta, dataPostagem, autor, fonte, newsImg, id_categoria, destaque from noticia order by id desc");
    $stmt->execute();
    return $stmt->fetchAll();
}

function buscarNoticia($id) 
{
    $conn = conectar();

    $stmt = $conn->prepare("select id, titulo, resumo, noticiaCompleta, fonte, autor, newsImg, dataPostagem, destaque, id_categoria from noticia where id= :id");
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function excluirNoticia($id) 
{
    $conn = conectar();
    
    $stmt = $conn->prepare("delete from noticia where id= :id");  
    $stmt->bindParam(':id',$id);
    if ($stmt->execute()) 
    {
        return $stmt->fetchAll();
    } 
    else 
    {
        print_r($stmt->errorInfo());
        return "Erro. ";
    }    
}

function validarLogin($login,$senha)
{
    $conn = conectar();

    $stmt = $conn->prepare("select id from adm where login = :login and senha = :senha");
    $stmt->bindParam(':login',$login);
    $stmt->bindParam(':senha',$senha);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function buscarLogin($id)
{
    $conn = conectar();

    $stmt = $conn->prepare("select id, nome, login, senha from adm where id = :id");
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function listarCategorias() 
{
    $conn = conectar();

    $stmt = $conn->prepare("select id, nomeCategoria from categoria order by id");
    $stmt->execute();
    return $stmt->fetchAll();
}

function buscarCategoria($id) 
{
    $conn = conectar();

    $stmt = $conn->prepare("select id, nomeCategoria from categoria where id= :id");
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

?>