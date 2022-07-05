<?php

    require_once('Connection.php');


    function fnAddAnimes($nome, $foto, $genero, $episodios, $lancamento) {

        $con = getConnection();
        
        $sql = "insert into desenhos (nome, foto, genero, episodios, lancamento) values (:pNome, :pFoto ,:pGenero, :pEpisodios, :pLancamento)";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pNome", $nome);
        $stmt->bindParam(":pFoto", $foto);
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

    function fnLocalizaAnimesPorNome($nome){
        $con = getConnection();

        $sql = "select * from desenhos where nome like :pNome";

        $stmt = $con->prepare($sql);
        $stmt->bindValue(":pNome", "%{$nome}%");

        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }

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

    function fnUpdateAnimes($id, $nome, $foto, $genero, $episodios, $lancamento) {

        $con = getConnection();
        
        $sql = "update desenhos set nome = :pNome, foto = :pFoto,genero = :pGenero, episodios = :pEpisodios, lancamento = :pLancamento where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        $stmt->bindParam(":pNome", $nome);
        $stmt->bindParam(":pFoto", $foto);
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

