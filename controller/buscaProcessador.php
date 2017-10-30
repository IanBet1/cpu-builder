<?php
    include('../controller/buscaCategoria.php');
    include('../model/componenteProcessador.php');
    include('../controller/leitorJson.php');
    include('../controller/criaTabela.php');

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
            $processador -> setNucleoComponente(0);

            $pos = strpos($processador -> getNomeComponente(), $processador -> getVelocidadeComponente());
            $processador -> setNomeComponente(substr($processador -> getNomeComponente(), 0, $pos));

            $retornoOferta = $leitorJson -> buscaOfertasDeProdutos($processador -> getIdComponente());
            foreach ($retornoOferta['offers'] as $offer) {
                $oferta = new lojaComponente();
                $oferta -> setLogoLoja($offer['store']['thumbnail']);
                $oferta -> setNomeLoja($offer['store']['name']);
                $oferta -> setValorLoja($offer['price']);
                $oferta -> setLinkLoja($offer['link']);

                $ofertas[] = $oferta;
            }
            $processador -> setLojaComponente($ofertas);
            $ofertas = null;

            $processadores[] = $processador;
        }
        $tabela = new criaTabela('processador', $processadores);
        echo $tabela -> retornaTabela();
    } else {
        echo "NOT FOUND";
    }
