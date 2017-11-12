<?php
    include('../controller/buscaCategoria.php');
    include('../model/componenteFonte.php');
    include('../controller/leitorJson.php');
    include('../controller/criaTabela.php');

    $idCategoria = new buscaCategoria('fonte');
    $leitorJson = new leitorJson($idCategoria -> retornaCategoria());
    $retorno = $leitorJson -> buscaProdutosPorCategoria();

    $fontes;
    $ofertas;

    if ($retorno['requestInfo']['status'] == 'OK') {
        foreach ($retorno['products'] as $product) {
            $fonte = new componenteFonte();
            $fonte -> setIdComponente($product['id']);
            $fonte -> setNomeComponente($product['name']);
            $fonte -> setValorGeralMinComponente($product['priceMin']);
            $fonte -> setValorGeralMaxComponente($product['priceMax']);
            $fonte -> setComponenteBasico($product['thumbnail']['url']);

            $retornoEspecifico = $leitorJson -> buscaEspecificacaoTecnicaComponente($fonte -> getIdComponente());
            /*foreach ($retornoEspecifico['products'] as $product) {
                $fonte -> setMarcaComponente($product['technicalSpecification']['Marca']);
                $fonte -> setSocketComponente($product['technicalSpecification']['Soquete']);
                $fonte -> setMemTipComponente($product['technicalSpecification']['Tipo de Memória']);
                $fonte -> setMemMaxComponente($product['technicalSpecification']['Memória Máxima Suportável']);*/
            }

            /*$retornoOferta = $leitorJson -> buscaOfertasDeProdutos($fonte -> getIdComponente());
            foreach ($retornoOferta['offers'] as $offer) {
                $oferta = new lojaComponente();
                $oferta -> setLogoLoja($offer['store']['thumbnail']);
                $oferta -> setNomeLoja($offer['store']['name']);
                $oferta -> setValorLoja($offer['price']);
                $oferta -> setLinkLoja($offer['link']);

                $ofertas[] = $oferta;
            }
            $fonte -> setLojaComponente($ofertas);
            $ofertas = null;

            $fontes[] = $fonte;
        }*/
        $tabela = new criaTabela('fonte', $fontes);
        echo $tabela -> retornaTabela();
    } else {
      echo "<br><br><h1 class='not_found_sorry'>Lamentamos!</h1><br><br>
      <h1 class='not_found'>Não existem produtos para o componente. :'(</h1>";
    }
?>
