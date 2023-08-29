<?php

require_once '../includes/funcoes.php';
require_once '../core/conexao_mysql.php';
require_once '../core/sql.php';
require_once '../core/mysql.php';

insert_post('Harry Potter', 'Texto numero 2','2','2023-08-18 10:00:00');
buscar_post();


//Teste inserção banco de dados
function insert_post($titulo,$texto,$usuario_id, $data_postagem): void
{
    $dados = [  'titulo' => $titulo,
                'texto' => $texto,
                'usuario_id' => $usuario_id,
                'data_postagem' => $data_postagem];
    insere('post', $dados);
}

//Teste select banco de dados

function buscar_post()  : void
{
    $posts = buscar('post',['id','titulo','texto','usuario_id','data_criacao','data_postagem'],[],'');
    print_r($posts);
}

//Teste update banco de dados
function update_post($id,$titulo,$texto, $data_postagem) : void
{
    $dados = [  'titulo' => $titulo,
                'texto' => $texto,
                'data_postagem' => $data_postagem];
    $criterio = [['id','=',$id]];
    atualiza('post',$dados,$criterio);
}

function deleta_post($id) : void
{
    $criterio = [['id', '=', $id]];
    deleta('post', $criterio);
}
?>