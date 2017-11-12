<?php
    include('../controller/buscaCategoria.php');
    include('../model/componentePlacaMae.php');
    include('../controller/leitorJson.php');
    include('../controller/criaTabela.php');

    session_start();
    $idCategoria = new buscaCategoria('placamae');
    $leitorJson = new leitorJson($idCategoria -> retornaCategoria());
    $retorno = $leitorJson -> buscaProdutosPorCategoria();

    $placasmae;
    $ofertas;
    $soquete;
    $varTeste = 0;

    if ($retorno['requestInfo']['status'] == 'OK') {
        foreach ($retorno['products'] as $product) {
            $placamae = new componentePlacaMae();
            $placamae -> setIdComponente($product['id']);
            $placamae -> setNomeComponente($product['name']);
            $placamae -> setValorGeralMinComponente($product['priceMin']);
            $placamae -> setValorGeralMaxComponente($product['priceMax']);
            $placamae -> setComponenteBasico($product['thumbnail']['url']);

            if((isset($_SESSION['processador']) && empty($_SESSION['processador'])) && (isset($_SESSION['memoriaram']) && empty($_SESSION['memoriaram']))){
              $retornoEspecifico = $leitorJson -> buscaEspecificacaoTecnicaComponente($placamae -> getIdComponente());
              foreach ($retornoEspecifico['products'] as $product) {
                  $placamae -> setMarcaComponente($product['technicalSpecification']['Marca']);
                  $placamae -> setSocketComponente($product['technicalSpecification']['Soquete']);
                  $placamae -> setMemTipComponente($product['technicalSpecification']['Tipo de Memória']);
                  $placamae -> setMemMaxComponente($product['technicalSpecification']['Memória Máxima Suportável']);
              }
              $placasmae[] = $placamae;
            }
            else if ((isset($_SESSION['processador']) && !empty($_SESSION['processador'])) && (isset($_SESSION['memoriaram']) && empty($_SESSION['memoriaram']))) {
              $retornoEspecifico = $leitorJson -> buscaEspecificacaoTecnicaComponente($placamae -> getIdComponente());
              foreach ($retornoEspecifico['products'] as $product) {
                  $placamae -> setMarcaComponente($product['technicalSpecification']['Marca']);
                  $placamae -> setSocketComponente($product['technicalSpecification']['Soquete']);
                  $placamae -> setMemTipComponente($product['technicalSpecification']['Tipo de Memória']);
                  $placamae -> setMemMaxComponente($product['technicalSpecification']['Memória Máxima Suportável']);
              }
              $idCategoria -> setComponenteBasico($placamae -> getSocketComponente());
              $soquete = $idCategoria -> retornaSocket();
              if($soquete == $_SESSION['processadorMarca']){
                $placasmae[] = $placamae;
              }
            }
            else if ((isset($_SESSION['processador']) && empty($_SESSION['processador'])) && (isset($_SESSION['memoriaram']) && !empty($_SESSION['memoriaram']))) {
              $retornoEspecifico = $leitorJson -> buscaEspecificacaoTecnicaComponente($placamae -> getIdComponente());
              foreach ($retornoEspecifico['products'] as $product) {
                  $placamae -> setMarcaComponente($product['technicalSpecification']['Marca']);
                  $placamae -> setSocketComponente($product['technicalSpecification']['Soquete']);
                  $placamae -> setMemTipComponente($product['technicalSpecification']['Tipo de Memória']);
                  $placamae -> setMemMaxComponente($product['technicalSpecification']['Memória Máxima Suportável']);
              }
              if($placamae -> getMemTipComponente() == $_SESSION['memoriaramTipMem']){
                $placasmae[] = $placamae;
              }
            }
            else {
              $retornoEspecifico = $leitorJson -> buscaEspecificacaoTecnicaComponente($placamae -> getIdComponente());
              foreach ($retornoEspecifico['products'] as $product) {
                  $placamae -> setMarcaComponente($product['technicalSpecification']['Marca']);
                  $placamae -> setSocketComponente($product['technicalSpecification']['Soquete']);
                  $placamae -> setMemTipComponente($product['technicalSpecification']['Tipo de Memória']);
                  $placamae -> setMemMaxComponente($product['technicalSpecification']['Memória Máxima Suportável']);
              }
              $idCategoria -> setComponenteBasico($placamae -> getSocketComponente());
              $soquete = $idCategoria -> retornaSocket();
              if($soquete == $_SESSION['processadorMarca'] && $placamae -> getMemTipComponente() == $_SESSION['memoriaramTipMem']){
                $placasmae[] = $placamae;
              }
            }
        }
        if(!empty($placasmae)){
          $tabela = new criaTabela('placamae', $placasmae);
          echo $tabela -> retornaTabela();
        } else {
          $tabela = new criaTabela('placamae', 0);
          echo $tabela -> retornaTabela();
        }
    } else {
      echo "<br><br><h1 class='not_found_sorry'>Lamentamos!</h1><br><br>
      <h1 class='not_found'>Não existem produtos para o componente. :'(</h1>";
        }
?>
