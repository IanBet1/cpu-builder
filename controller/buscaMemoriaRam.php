<?php
    include('../controller/buscaCategoria.php');
    include('../model/componenteMemoriaRam.php');
    include('../controller/leitorJson.php');
    include('../controller/criaTabela.php');

    $idCategoria = new buscaCategoria('memoriaram');
    $leitorJson = new leitorJson($idCategoria -> retornaCategoria());
    $retorno = $leitorJson -> buscaProdutosPorCategoria();

    $memoriasram;
    $ofertas;

    if ($retorno['requestInfo']['status'] == 'OK') {
        foreach ($retorno['products'] as $product) {
            $memoriaram = new componenteMemoriaRam();
            $memoriaram -> setNomeComponente($product['name']);

            $pos = 0;
            $pos = strpos($memoriaram -> getNomeComponente(), "Servidor");

            if ($pos == 0) {
                $pos = strpos($memoriaram -> getNomeComponente(), "Notebook");

                if ($pos == 0) {
                    $memoriaram -> setIdComponente($product['id']);
                    $memoriaram -> setValorGeralMinComponente($product['priceMin']);
                    $memoriaram -> setValorGeralMaxComponente($product['priceMax']);
                    $memoriaram -> setComponenteBasico($product['thumbnail']['url']);


                    $retornoEspecifico = $leitorJson -> buscaEspecificacaoTecnicaComponente($memoriaram -> getIdComponente());
                    foreach ($retornoEspecifico['products'] as $product) {
                        $memoriaram -> setVelocidadeComponente($product['technicalSpecification']['Velocidade da Memória']);
                        $memoriaram -> setCapacidadeComponente($product['technicalSpecification']['Capacidade']);
                        $memoriaram -> setMarcaComponente($product['technicalSpecification']['Marca']);
                        $memoriaram -> setTipoMemComponente($product['technicalSpecification']['Tipo de Memória']);
                    }

                    $pos = strpos($memoriaram -> getNomeComponente(), $memoriaram -> getCapacidadeComponente());
                    $memoriaram -> setNomeComponente(substr($memoriaram -> getNomeComponente(), 0, $pos));

                    $retornoOferta = $leitorJson -> buscaOfertasDeProdutos($memoriaram -> getIdComponente());
                    foreach ($retornoOferta['offers'] as $offer) {
                        $oferta = new lojaComponente();
                        $oferta -> setLogoLoja($offer['store']['thumbnail']);
                        $oferta -> setNomeLoja($offer['store']['name']);
                        $oferta -> setValorLoja($offer['price']);
                        $oferta -> setLinkLoja($offer['link']);

                        $ofertas[] = $oferta;
                    }
                    $memoriaram -> setLojaComponente($ofertas);
                    $ofertas = null;

                    $memoriasram[] = $memoriaram;
                }
            }
        }
        $tabela = new criaTabela('memoriaram', $memoriasram);
        echo $tabela -> retornaTabela();
    } else {
        echo "NOT FOUND";
    }
