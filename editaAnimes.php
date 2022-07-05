<?php
session_start();
require_once('repository/AnimesRepository.php');
require_once('util/base64.php');

$id = filter_input(INPUT_POST, 'idAnimes', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_SPECIAL_CHARS);
$episodios = filter_input(INPUT_POST, 'episodios', FILTER_SANITIZE_NUMBER_INT);
$lancamento = filter_input(INPUT_POST, 'lancamento', FILTER_SANITIZE_NUMBER_INT);
$foto = converterBase64($_FILES['foto']);

    if(fnUpdateAnimes($id, $nome, $foto, $genero, $episodios, $lancamento)) {
       $msg = "Sucesso ao gravar";
    } else {
        $msg = "Falha na gravação";
    }

    $_SESSION['id'] = $id;    
    $page = "formulario-edita-animes.php";
    setcookie('notify', $msg, time() + 10, "/animes/{$page}", 'localhost');
    header("location: {$page}");
    exit;