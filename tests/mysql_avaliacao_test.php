<?php

require_once '../includes/funcoes.php';
require_once '../core/conexao_mysql.php';
require_once '../core/sql.php';
require_once '../core/mysql.php';


/*insert_avaliacao('5', 'comentario', 1,1);
insert_avaliacao('6', 'segundo comentario',2,4);*/
deleta_avaliacao(2);
buscar_avaliacao();

//Teste inserção banco de dados
function insert_avaliacao($nota,$comentario,$usuario_id,$post_id): void
{
    $dados = [  'nota' => $nota,
                'comentario' => $comentario,
                'usuario_id' => $usuario_id,
                'post_id' => $post_id];
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

function deleta_avaliacao($id) : void
{
    $criterio = [['id', '=', $id]];
    deleta('avaliacao', $criterio);
}
?>