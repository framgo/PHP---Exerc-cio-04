<?php

require_once('repository/AnimesRepository.php');
require_once('util/upload.php');

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_SPECIAL_CHARS);
$episodios = filter_input(INPUT_POST, 'episodios', FILTER_SANITIZE_NUMBER_INT);
$lancamento = filter_input(INPUT_POST, 'lancamento', FILTER_SANITIZE_NUMBER_INT);
$foto = uploadImg($_FILES['foto']);

if(empty($nome) || empty($genero) || empty($episodios) || empty($lancamento) || empty($foto)) {
    $msg = "Preencha todos os campos";    
} else {  
    if(fnAddAnimes($nome, $foto ,$genero, $episodios, $lancamento)) {
        $msg = "Sucesso ao gravar";
    } else {
        $msg = "Falha na gravação";
    }
}

    $page = "formulario-cadastro-animes.php";
    setcookie('notify', $msg, time() + 10, "/animes/{$page}", 'localhost');
    header("location: {$page}");
    exit;