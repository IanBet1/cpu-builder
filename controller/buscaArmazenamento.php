<?php
    include('../controller/buscaCategoria.php');
    include('../model/componenteArmazenamento.php');
    include('../controller/leitorJson.php');
    include('../controller/criaTabela.php');

    $idCategoria = new buscaCategoria('hd/ssd');
    $leitorJson = new leitorJson($idCategoria -> retornaCategoria());
    $retorno = $leitorJson -> buscaProdutosPorCategoria();

    $armazenamentos;
    $ofertas;

    if ($retorno['requestInfo']['status'] == 'OK') {
        foreach ($retorno['products'] as $product) {
            $armazenamento = new componenteArmazenamento();
            $armazenamento -> setNomeComponente($product['name']);
            $pos = 0;
            $pos = strpos($armazenamento -> getNomeComponente(), "Externo");

            if ($pos == 0) {
                $armazenamento -> setIdComponente($product['id']);
                $armazenamento -> setValorGeralMinComponente($product['priceMin']);
                $armazenamento -> setValorGeralMaxComponente($product['priceMax']);
                $armazenamento -> setComponenteBasico($product['thumbnail']['url']);

                $retornoEspecifico = $leitorJson -> buscaEspecificacaoTecnicaComponente($armazenamento -> getIdComponente());
                foreach ($retornoEspecifico['products'] as $product) {
                    $armazenamento -> setMarcaComponente($product['technicalSpecification']['Marca']);
                    $armazenamento -> setTipoArmazenamentoComponente($product['technicalSpecification']['Armazenamento']);
                    $armazenamento -> setCapacidadeComponente($product['technicalSpecification']['Capacidade']);
                }

                $pos = strpos($armazenamento -> getNomeComponente(), $armazenamento -> getCapacidadeComponente());
                $armazenamento -> setNomeComponente(substr($armazenamento -> getNomeComponente(), 0, $pos));
                $pos = strlen($armazenamento -> getMarcaComponente());
                $armazenamento -> setNomeComponente(substr($armazenamento -> getNomeComponente(), $pos));

                $retornoOferta = $leitorJson -> buscaOfertasDeProdutos($armazenamento -> getIdComponente());
                foreach ($retornoOferta['offers'] as $offer) {
                    $oferta = new lojaComponente();
                    $oferta -> setLogoLoja($offer['store']['thumbnail']);
                    $oferta -> setNomeLoja($offer['store']['name']);
                    $oferta -> setValorLoja($offer['price']);
                    $oferta -> setLinkLoja($offer['link']);

                    $ofertas[] = $oferta;
                }
                $armazenamento -> setLojaComponente($ofertas);
                $ofertas = null;

                $armazenamentos[] = $armazenamento;
            }
        }
        $tabela = new criaTabela('hd/ssd', $armazenamentos);
        echo $tabela -> retornaTabela();
    } else {
        echo "NOT FOUND";
    }
