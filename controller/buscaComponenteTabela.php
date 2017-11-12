<?php
  include('../controller/leitorJson.php');
  include('../model/lojaComponente.php');

  class buscaComponenteTabela {

  public function insertComponenteTabela(){
    $componente = $_SESSION['componente'];
    $leitorJson = new leitorJson("");
    $retorno = $leitorJson -> buscaEspecificacaoTecnicaComponente($_SESSION[$componente]);

    if ($retorno['requestInfo']['status'] == 'OK') {
        foreach ($retorno['products'] as $product) {
            $_SESSION[$componente.'Id'] = $product['id'];
            $_SESSION[$componente.'Nome'] = $product['name'];
            $_SESSION[$componente.'Preco'] = $product['priceMin'];
            $_SESSION['precoTotal'] += $product['priceMin'];
            $_SESSION[$componente.'Img'] = $product['thumbnail']['url'];

            if($componente == 'processador') {
              $_SESSION[$componente.'Marca'] = $product['technicalSpecification']['Marca'];
              $_SESSION[$componente.'Velocidade'] = $product['technicalSpecification']['Velocidade'];
            } else if($componente == 'placamae') {
              $_SESSION[$componente.'Marca'] = $product['technicalSpecification']['Marca'];
              $_SESSION[$componente.'Soquete'] = $product['technicalSpecification']['Soquete'];
              $_SESSION[$componente.'TipMem'] = $product['technicalSpecification']['Tipo de Memória'];
              $_SESSION[$componente.'MaxMem'] = $product['technicalSpecification']['Memória Máxima Suportável'];
            } else if($componente == 'memoriaram') {
              $_SESSION[$componente.'VelMem'] = $product['technicalSpecification']['Velocidade da Memória'];
              $_SESSION[$componente.'Cap'] = $product['technicalSpecification']['Capacidade'];
              $_SESSION[$componente.'Marca'] = $product['technicalSpecification']['Marca'];
              $_SESSION[$componente.'TipMem'] = $product['technicalSpecification']['Tipo de Memória'];
            } else if($componente == 'hd/ssd') {
              $_SESSION[$componente.'Marca'] = $product['technicalSpecification']['Marca'];
              $_SESSION[$componente.'Arm'] = $product['technicalSpecification']['Armazenamento'];
              $_SESSION[$componente.'Cap'] = $product['technicalSpecification']['Capacidade'];
            } else if($componente == 'placavideo') {
              $_SESSION[$componente.'Marca'] = $product['technicalSpecification']['Marca'];
              $_SESSION[$componente.'Mem'] = $product['technicalSpecification']['Memória'];
            } /*else if($componente == 'fonte') {
            } else if($componente == 'gabinete') {
            }*/

            $ofertas;
            $retornoOferta = $leitorJson -> buscaOfertasDeProdutos($_SESSION[$componente.'Id']);
            foreach ($retornoOferta['offers'] as $offer) {
                $oferta = new lojaComponente();
                $oferta -> setLogoLoja($offer['store']['thumbnail']);
                $oferta -> setNomeLoja($offer['store']['name']);
                $oferta -> setValorLoja($offer['price']);
                $oferta -> setLinkLoja($offer['link']);

                $ofertas[] = $oferta;
            }
            $first = $ofertas[0] -> getValorLoja();
            $min = $first;
            $max = $first;

            foreach($ofertas as $data) {
                $valor = $data -> getValorLoja();

                if($valor <= $min ) {
                  $min =  $valor ;
                  $_SESSION[$componente.'LinkLoja'] = $data -> getLinkLoja();
                  $_SESSION[$componente.'ImgLoja'] = $data -> getLogoLoja();
                }
                if($valor > $max ) {
                  $max =  $valor ;
                }
              }
            $ofertas = null;
        }
    } else {
      echo "ID de produto não encontrado!";
    }
  }
};
?>
