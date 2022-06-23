<?php

require_once('repository/AnimesRepository.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


    if(fnDeleteAnimes($id)) {
       $msg = "Sucesso ao apagar";
    } else {
        $msg = "Falha ao apagar";
    }

    $page = "listagem-de-animes.php";
    setcookie('notify', $msg, time() + 10, "/animes/{$page}", 'localhost');
    header("location: {$page}");
    exit;