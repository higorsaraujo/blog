<!DOCTYPE html>
<?php
    require_once 'includes/funcoes.php';
    require_once 'core/conexao_mysql.php';
    require_once 'core/sql.php';
    require_once 'core/mysql.php';

    foreach($_GET as $indice => $dado){
        $$indice = limparDados($dado);
    }

    $posts = buscar(
        'post',
        [
            'titulo',
            'data_postagem',
            'texto',
            '{select nome
                    from usuario
                    where usuario.id = post.usuario_id) as nome'
            ],
            [
                ['id', '=', $post]
            ]
            );
        $post = $posts[0];
        $data_post = date_create($post['data_postagem']);
        $data_post = date_format($data_post, 'd/m/Y H:i:s');

?>      
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"
            href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php include 'includes/topo.php';?>
            </div>
        </div>
        <div class="row" style="min-height: 500px;">
            <div class="col-md-12">
                <?php include 'includes/menu.php'; ?>
            </div>
            <div class="col-md-10" style="padding-top: 50px;"
        </div>
    </div>
</body>
</html>