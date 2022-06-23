<?php 
    include('config.php');
?>

<!doctype html>

<html lang="pt_BR">

  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Formulário Cadastro Anime</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>

  <body>
  <?php include('navbar.php'); ?>
    <div class="col-6 offset-3">

        <fieldset>

            <legend>Cadastro de Animes</legend>

            <form action="registraAnimes.php" method="post" class="form">

                <div class="mb-3 form-group">

                    <label for="nomeId" class="form-label">Nome</label>

                    <input type="text" name="nome" id="nomeId" class="form-control" placeholder="Informe o nome do anime">

                    <div id="helperNome" class="form-text">Informe o nome do anime</div>

                </div>

                <div class="mb-3 form-group">

                    <label for="generoId" class="form-label">Gênero</label>

                    <input type="text" name="genero" id="generoId" class="form-control" placeholder="Informe o gênero do anime">

                    <div id="helperGenero" class="form-text">Informe o gênero do anime</div>

                </div>

                <div class="mb-3 form-group">

                    <label for="episodiosId" class="form-label">Episódios</label>

                    <input type="text" name="episodios" id="episodiosId" class="form-control" placeholder="Informe os episódios do anime">

                    <div id="helperEpisodios" class="form-text">Informe os episódios</div>

                </div>

                <div class="mb-3 form-group">

                    <label for="lancamentoId" class="form-label">Lançamento</label>

                    <input type="text" name="lancamento" id="lancamentoId" class="form-control" placeholder="Informe o lançamento do anime">

                    <div id="helperLancamento" class="form-text">Informe o lançamento AAAA-MM-DD</div>

                </div>

                <button type="submit" class="btn btn-dark">Enviar</button>
                <div id="notify" class="form-text text-capitalize fs-4"><?= isset($_COOKIE['notify']) ? $_COOKIE['notify'] : '' ?></div>

            </form>

        </fieldset>

    </div>

    <?php include("rodape.php"); ?>
  </body>

</html>