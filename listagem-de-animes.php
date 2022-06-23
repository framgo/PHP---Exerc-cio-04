<?php 
    include('config.php');
    
    require_once('repository/AnimesRepository.php');
    
    $nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);


?>

<!doctype html>

<html lang="pt_BR">

  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Listagem de Anime</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>

  <body>
    <?php include('navbar.php'); ?>
    <div class="col-6 offset-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Genero</th>
                    <th>Episodios</th>
                    <th>Lançamento</th>
                    <th>Data cadastro</th>
                    <th colspan="2">Gerenciar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach(fnLocalizaAnimesPorNome($nome) as $animes): ?>
                <tr>
                    <td><?= $animes->id ?></td>
                    <td><?= $animes->nome ?></td>
                    <td><?= $animes->genero ?></td>
                    <td><?= $animes->episodios ?></td>
                    <td><?= $animes->lancamento ?></td>
                    <td><?= $animes->created_at ?></td>
                    <td><a href="formulario-edita-animes.php?id=<?= $animes->id ?>">Editar</td>
                    <td><a onclick="return confirm('Deseja realmente excluir?');" href="excluirAnimes.php?id=<?= $animes->id ?>">Excluir</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <?php if(isset($notificacao)) : ?>
            <tfoot>
                <tr>
                    <td colspan="8"><?= $_COOKIE['notify'] ?></td>
                </tr>
            </tfoot>
            <?php endif; ?>
        </table>
    </div>

    <?php include("rodape.php"); ?>
  </body>

</html>