<?php

    require_once('repository/AnimesRepository.php');
    $nome = filter_input(INPUT_POST, 'nomeAnimes', FILTER_SANITIZE_SPECIAL_CHARS);

    header("location: listagem-de-animes.php?nome={$nome}");
    exit;