<?php
    session_start();
    require_once('repository/AnimesRepository.php');


    if(fnDeleteAnimes($_SESSION['id'])) {
       $msg = "Sucesso ao apagar";
    } else {
        $msg = "Falha ao apagar";
    }

    unset($_SESSION['id']);

    $page = "listagem-de-animes.php";
    setcookie('notify', $msg, time() + 10, "/animes/{$page}", 'localhost');
    header("location: {$page}");
    exit;