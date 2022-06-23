<?php

    require_once('Connection.php');

    

    function fnAddAnimes($nome, $genero, $episodios, $lancamento) {

        $con = getConnection();
        
        $sql = "insert into desenhos (nome, genero, episodios, lancamento) values (:pNome, :pGenero, :pEpisodios, :pLancamento)";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pNome", $nome);
        $stmt->bindParam(":pGenero", $genero);
        $stmt->bindParam(":pEpisodios", $episodios);
        $stmt->bindParam(":pLancamento", $lancamento);

       return $stmt->execute();
    }

    function fnListaAnimes(){
        $con = getConnection();

        $sql = "select * from desenhos";

        $result = $con->query($sql);

        $listaDesenhos = array();
        while($desenho = $result->fetch(PDO::FETCH_OBJ)) {
            array_push($listaDesenhos, $desenho);
        }
        return $listaDesenhos;
    }

    function fnLocalizaAnimesPorID($id) {
        $con = getConnection();

        $sql = "select * from desenhos where id = :pID";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        
        if($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        return null;
    }

    function fnUpdateAnimes($id, $nome, $genero, $episodios, $lancamento) {

        $con = getConnection();
        
        $sql = "update desenhos set nome = :pNome, genero = :pGenero, episodios = :pEpisodios, lancamento = :pLancamento where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        $stmt->bindParam(":pNome", $nome);
        $stmt->bindParam(":pGenero", $genero);
        $stmt->bindParam(":pEpisodios", $episodios);
        $stmt->bindParam(":pLancamento", $lancamento);

       return $stmt->execute();
    }

    function fnDeleteAnimes($id) {

        $con = getConnection();
        
        $sql = "delete from desenhos where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        
       return $stmt->execute();
    }

    function fnLoginAnimes($email, $senha) {
        $con = getConnection();

        $sql = "select id, email, created_at as createdAt from login where email = :pEmail and senha = :pSenha";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pEmail", $email);
        $stmt->bindValue(":pSenha", md5($senha));

        if($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        return null;
    }