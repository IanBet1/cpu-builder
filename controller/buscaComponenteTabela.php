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
              $pos = strpos($_SESSION[$componente.'Nome'], $_SESSION[$componente.'Velocidade']);
              $_SESSION[$componente.'Nome'] = (substr($_SESSION[$componente.'Nome'], 0, $pos));
            } else if($componente == 'placamae') {
              $_SESSION[$componente.'Marca'] = $product['technicalSpecification']['Marca'];
              $_SESSION[$componente.'Soquete'] = $product['technicalSpecification']['Soquete'];
              $_SESSION[$componente.'TipMem'] = $product['technicalSpecification']['Tipo de Memória'];
              $_SESSION[$componente.'MaxMem'] = $product['technicalSpecification']['Memória Máxima Suportável'];
              $tam = strlen($_SESSION[$componente.'Nome']);
              $pos = strpos($_SESSION[$componente.'Nome'], $_SESSION[$componente.'Soquete']);
              $tam -= $pos;
              $pos += strlen($_SESSION[$componente.'Soquete']);
              $_SESSION[$componente.'Nome'] = ($_SESSION[$componente.'Marca'].substr($_SESSION[$componente.'Nome'], $pos, $tam));
            } else if($componente == 'memoriaram') {
              $_SESSION[$componente.'VelMem'] = $product['technicalSpecification']['Velocidade da Memória'];
              $_SESSION[$componente.'Cap'] = $product['technicalSpecification']['Capacidade'];
              $_SESSION[$componente.'Marca'] = $product['technicalSpecification']['Marca'];
              $_SESSION[$componente.'TipMem'] = $product['technicalSpecification']['Tipo de Memória'];
              $pos = strpos($_SESSION[$componente.'Nome'], $_SESSION[$componente.'Cap']);
              $_SESSION[$componente.'Nome'] = (substr($_SESSION[$componente.'Nome'], 0, $pos));
              if($_SESSION[$componente.'Cap'] == '16384 MB') {
                $_SESSION[$componente.'Nome'] = $_SESSION[$componente.'Nome'].' 16GB';
              } else if ($_SESSION[$componente.'Cap'] == '8192 MB') {
                $_SESSION[$componente.'Nome'] = $_SESSION[$componente.'Nome'].' 8GB';
              } else if ($_SESSION[$componente.'Cap'] == '4096 MB') {
                $_SESSION[$componente.'Nome'] = $_SESSION[$componente.'Nome'].' 4GB';
              } else if ($_SESSION[$componente.'Cap'] == '2048 MB') {
                $_SESSION[$componente.'Nome'] = $_SESSION[$componente.'Nome'].' 2GB';
              } else if ($_SESSION[$componente.'Cap'] == '1024 MB'){
                $_SESSION[$componente.'Nome'] = $_SESSION[$componente.'Nome'].' 1GB';
              }
            } else if($componente == 'hd') {
              $_SESSION[$componente.'Marca'] = $product['technicalSpecification']['Marca'];
              $_SESSION[$componente.'Arm'] = $product['technicalSpecification']['Armazenamento'];
              $_SESSION[$componente.'Cap'] = $product['technicalSpecification']['Capacidade'];
              $pos = strpos($_SESSION[$componente.'Nome'], $_SESSION[$componente.'Cap']);
              $_SESSION[$componente.'Nome'] = (substr($_SESSION[$componente.'Nome'], 0, $pos));
              $pos = strlen($_SESSION[$componente.'Marca']);
              $_SESSION[$componente.'Nome'] = (substr($_SESSION[$componente.'Nome'], $pos));
              if ($_SESSION[$componente.'Cap'] == '1024 GB') {
                $_SESSION[$componente.'Nome'] = $_SESSION[$componente.'Nome'].' 1TB';
              } else {
                $_SESSION[$componente.'Nome'] = $_SESSION[$componente.'Nome'].$_SESSION[$componente.'Cap'];
              }
            } else if($componente == 'ssd') {
              $_SESSION[$componente.'Marca'] = $product['technicalSpecification']['Marca'];
              $_SESSION[$componente.'Arm'] = $product['technicalSpecification']['Armazenamento'];
              $_SESSION[$componente.'Cap'] = $product['technicalSpecification']['Capacidade'];
              $pos = strpos($_SESSION[$componente.'Nome'], $_SESSION[$componente.'Cap']);
              $_SESSION[$componente.'Nome'] = (substr($_SESSION[$componente.'Nome'], 0, $pos));
              $pos = strlen($_SESSION[$componente.'Marca']);
              $_SESSION[$componente.'Nome'] = (substr($_SESSION[$componente.'Nome'], $pos));
              if ($_SESSION[$componente.'Cap'] == '1024 GB') {
                $_SESSION[$componente.'Nome'] = $_SESSION[$componente.'Nome'].' 1TB';
              } else {
                $_SESSION[$componente.'Nome'] = $_SESSION[$componente.'Nome'].$_SESSION[$componente.'Cap'];
              }
            } else if($componente == 'placavideo') {
              $_SESSION[$componente.'Marca'] = $product['technicalSpecification']['Marca'];
              $_SESSION[$componente.'Mem'] = $product['technicalSpecification']['Memória'];
              $pos = strpos($_SESSION[$componente.'Nome'], $_SESSION[$componente.'Mem']);
              $_SESSION[$componente.'Nome'] = (substr($_SESSION[$componente.'Nome'], 0, $pos));
              $pos = strlen($_SESSION[$componente.'Marca']);
              $_SESSION[$componente.'Nome'] = (substr($_SESSION[$componente.'Nome'], $pos));
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
