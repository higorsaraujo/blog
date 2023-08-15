<?php

require_once '../includes/funcoes.php';
require_once '../core/conexao_mysql.php';
require_once '../core/sql.php';
require_once '../core/mysql.php';

insert_usuario('Higor', 'higor@gmail.com','123456');

insert_post('Titulo','texto',1,date('Y-m-d H:i:s'));

insert_avaliacao('7', 'comentario', 1, date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
insert_avaliacao('10', 'comentario', 1, date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
buscar_avaliacao();

//Teste inserção banco de dados
function insert_usuario($nome,$email,$senha): void
{
    $dados = ['nome' => $nome,
                'email' => $email,
                'senha' => $senha];
    insere('usuario', $dados);
}

function insert_post($titulo,$texto,$usuario_id,$data_postagem){
    $dados = ['titulo' => $titulo,
                'texto' => $texto,
                'usuario_id' => $usuario_id,
                'data_postagem' => $data_postagem];
    insere('post', $dados);
}

function insert_avaliacao($nota,$comentario,$usuario_id,$post_id,$data_criacao){
    $dados = ['nota' => $nota,
                'comentario' => $comentario,
                'usuario_id' => $usuario_id,
                'post_id' => $post_id,
                'data_criacao' => $data_criacao];
    insere('avaliacao', $dados);
}

//Teste select banco de dados

function buscar_avaliacao()  : void
{
    $busca = buscar('avaliacao', ['id', 'nota', 'comentario', 'usuario_id', 'post_id', 'data_criacao'], [],'');
    print_r($busca);
}

//Teste update banco de dados
function update_avaliacao($id, $nota, $comentario, $usuario_id, $post_id, $data_criacao) : void
{
    $dados = ['nota' => $nota,
                'comentario' => $comentario, 
                'usuario_id' => $usuario_id,
                'post_id' => $post_id,
                'data_criacao' => $data_criacao];
$criterio = [['id', '=', $id]];
atualiza('avaliacao', $dados, $criterio);
}
?>