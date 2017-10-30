<?php
    include('../controller/buscaCategoria.php');
    include('../model/componentePlacaMae.php');
    include('../controller/leitorJson.php');
    include('../controller/criaTabela.php');

    $idCategoria = new buscaCategoria('placamae');
    $leitorJson = new leitorJson($idCategoria -> retornaCategoria());
    $retorno = $leitorJson -> buscaProdutosPorCategoria();

    $placasmae;
    $ofertas;
    if ($retorno['requestInfo']['status'] == 'OK') {
        foreach ($retorno['products'] as $product) {
            $placamae = new componentePlacaMae();
            $placamae -> setIdComponente($product['id']);
            $placamae -> setNomeComponente($product['name']);
            $placamae -> setValorGeralMinComponente($product['priceMin']);
            $placamae -> setValorGeralMaxComponente($product['priceMax']);
            $placamae -> setComponenteBasico($product['thumbnail']['url']);

            $retornoEspecifico = $leitorJson -> buscaEspecificacaoTecnicaComponente($placamae -> getIdComponente());
            foreach ($retornoEspecifico['products'] as $product) {
                $placamae -> setMarcaComponente($product['technicalSpecification']['Marca']);
                $placamae -> setSocketComponente($product['technicalSpecification']['Soquete']);
                $placamae -> setMemTipComponente($product['technicalSpecification']['Tipo de Memória']);
                $placamae -> setMemMaxComponente($product['technicalSpecification']['Memória Máxima Suportável']);
            }

            $retornoOferta = $leitorJson -> buscaOfertasDeProdutos($placamae -> getIdComponente());
            foreach ($retornoOferta['offers'] as $offer) {
                $oferta = new lojaComponente();
                $oferta -> setLogoLoja($offer['store']['thumbnail']);
                $oferta -> setNomeLoja($offer['store']['name']);
                $oferta -> setValorLoja($offer['price']);
                $oferta -> setLinkLoja($offer['link']);

                $ofertas[] = $oferta;
            }
            $placamae -> setLojaComponente($ofertas);
            $ofertas = null;

            $placasmae[] = $placamae;
        }
        $tabela = new criaTabela('placamae', $placasmae);
        echo $tabela -> retornaTabela();
    } else {
            echo "NOT FOUND";
        }
