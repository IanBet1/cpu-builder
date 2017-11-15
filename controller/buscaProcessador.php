<?php
    include('../controller/buscaCategoria.php');
    include('../model/componenteProcessador.php');
    include('../controller/leitorJson.php');
    include('../controller/criaTabela.php');

    session_start();
    $idCategoria = new buscaCategoria('processador');
    $leitorJson = new leitorJson($idCategoria -> retornaCategoria());
    $retorno = $leitorJson -> buscaProdutosPorCategoria();

    $processadores;
    $ofertas;

    if ($retorno['requestInfo']['status'] == 'OK') {
        foreach ($retorno['products'] as $product) {
            $processador = new componenteProcessador();
            $processador -> setIdComponente($product['id']);
            $processador -> setNomeComponente($product['name']);
            $processador -> setValorGeralMinComponente($product['priceMin']);
            $processador -> setValorGeralMaxComponente($product['priceMax']);
            $processador -> setComponenteBasico($product['thumbnail']['url']);

            $retornoEspecifico = $leitorJson -> buscaEspecificacaoTecnicaComponente($processador -> getIdComponente());
            foreach ($retornoEspecifico['products'] as $product) {
              $processador -> setVelocidadeComponente($product['technicalSpecification']['Velocidade']);
              $processador -> setMarcaComponente($product['technicalSpecification']['Marca']);
            }

            $pos = strpos($processador -> getNomeComponente(), $processador -> getVelocidadeComponente());
            $processador -> setNomeComponente(substr($processador -> getNomeComponente(), 0, $pos));

            if(empty($_SESSION['placamae']) == true){
              $processadores[] = $processador;
            } else {
              $idCategoria -> setComponenteBasico($_SESSION['placamaeSoquete']);
              $soquete = $idCategoria -> retornaSocket();
              if ($processador -> getMarcaComponente() == $soquete) {
                $processadores[] = $processador;
              }
            }
        }
        if(!empty($processadores)){
          $tabela = new criaTabela('processador', $processadores);
          echo $tabela -> retornaTabela();
        } else {
          $tabela = new criaTabela('processador', 0);
          echo $tabela -> retornaTabela();
        }
    } else {
        echo "<br><br><h1 class='not_found_sorry'>Lamentamos!</h1><br><br>
      <h1 class='not_found'>Não existem produtos para o componente. :'(</h1>";
    }
