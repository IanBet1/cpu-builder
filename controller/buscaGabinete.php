<?php
    include('../controller/buscaCategoria.php');
    include('../model/componenteGabinete.php');
    include('../controller/leitorJson.php');
    include('../controller/criaTabela.php');

    $idCategoria = new buscaCategoria('gabinete');
    $leitorJson = new leitorJson($idCategoria -> retornaCategoria());
    $retorno = $leitorJson -> buscaProdutosPorCategoria();

    $gabinetes;
    $ofertas;

    if ($retorno['requestInfo']['status'] == 'OK') {
        foreach ($retorno['products'] as $product) {
            $gabinete = new componenteGabinete();
            $gabinete -> setIdComponente($product['id']);
            $gabinete -> setNomeComponente($product['name']);
            $gabinete -> setValorGeralMinComponente($product['priceMin']);
            $gabinete -> setValorGeralMaxComponente($product['priceMax']);
            $gabinete -> setComponenteBasico($product['thumbnail']['url']);

            $retornoEspecifico = $leitorJson -> buscaEspecificacaoTecnicaComponente($gabinete -> getIdComponente());
            foreach ($retornoEspecifico['products'] as $product) {
                /*$gabinete -> setMarcaComponente($product['technicalSpecification']['Marca']);
                $gabinete -> setSocketComponente($product['technicalSpecification']['Soquete']);
                $gabinete -> setMemTipComponente($product['technicalSpecification']['Tipo de Memória']);
                $gabinete -> setMemMaxComponente($product['technicalSpecification']['Memória Máxima Suportável']);*/
            }

            $retornoOferta = $leitorJson -> buscaOfertasDeProdutos($gabinete -> getIdComponente());
            foreach ($retornoOferta['offers'] as $offer) {
                $oferta = new lojaComponente();
                $oferta -> setLogoLoja($offer['store']['thumbnail']);
                $oferta -> setNomeLoja($offer['store']['name']);
                $oferta -> setValorLoja($offer['price']);
                $oferta -> setLinkLoja($offer['link']);

                $ofertas[] = $oferta;
            }
            $gabinete -> setLojaComponente($ofertas);
            $ofertas = null;

            $gabinetes[] = $gabinete;
        }
        $tabela = new criaTabela('gabinete', $gabinetes);
        echo $tabela -> retornaTabela();
    } else {
        echo "NOT FOUND";
    }
