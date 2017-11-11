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
            $_SESSION[$componente.'Img'] = $product['thumbnail']['url'];

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
