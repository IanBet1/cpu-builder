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

            $retornoEspecifico = $leitorJson -> buscaEspecificacaoTecnicaComponente($placamae -> getIdComponente());
            foreach ($retornoEspecifico['products'] as $product) {
                $placamae -> setMarcaComponente($product['technicalSpecification']['Marca']);
                $placamae -> setSocketComponente($product['technicalSpecification']['Soquete']);
                $placamae -> setMemTipComponente($product['technicalSpecification']['Tipo de Memória']);
                $placamae -> setMemMaxComponente($product['technicalSpecification']['Memória Máxima Suportável']);
            }

            $tam = strlen($placamae -> getNomeComponente());
            $pos = strpos($placamae -> getNomeComponente(), $placamae -> getSocketComponente());
            $tam -= $pos;
            $pos += strlen($placamae -> getSocketComponente());
            $placamae -> setNomeComponente($placamae -> getMarcaComponente().substr($placamae -> getNomeComponente(), $pos, $tam));

            if(empty($_SESSION['processador']) == true && empty($_SESSION['memoriaram']) == true) {
              $placasmae[] = $placamae;
            } else if(empty($_SESSION['processador']) == false && empty($_SESSION['memoriaram']) == true) {
              $idCategoria -> setComponenteBasico($placamae -> getSocketComponente());
              $soquete = $idCategoria -> retornaSocket();
              if($soquete == $_SESSION['processadorMarca']){
                $placasmae[] = $placamae;
              }
            } else if(empty($_SESSION['processador']) == true && empty($_SESSION['memoriaram']) == false) {
              if($placamae -> getMemTipComponente() == $_SESSION['memoriaramTipMem']){
                $placasmae[] = $placamae;
              }
            } else if(empty($_SESSION['processador']) == false && empty($_SESSION['memoriaram']) == false) {
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
