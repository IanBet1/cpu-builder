<?php
    include('../controller/buscaCategoria.php');
    include('../model/componenteArmazenamento.php');
    include('../controller/leitorJson.php');
    include('../controller/criaTabela.php');

    $componente = $_POST['componente'];
    $idCategoria = new buscaCategoria('hd/ssd');
    $leitorJson = new leitorJson($idCategoria -> retornaCategoria());
    $retorno = $leitorJson -> buscaProdutosPorCategoria();

    $hds = null;
    $ssds = null;
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

                if($componente == 'hd'){
                  if($armazenamento -> getTipoArmazenamentoComponente() == 'HDD'){
                    $hds[] = $armazenamento;
                  }
                } else {
                  if($armazenamento -> getTipoArmazenamentoComponente() == 'SSD'){
                    $ssds[] = $armazenamento;
                  }
                }
            }
        }
        if($componente == 'hd'){
          $tabela = new criaTabela('hd', $hds);
          echo $tabela -> retornaTabela();
        } else {
          $tabela = new criaTabela('ssd', $ssds);
          echo $tabela -> retornaTabela();
        }
    } else {
      echo "<br><br><h1 class='not_found_sorry'>Lamentamos!</h1><br><br>
      <h1 class='not_found'>Não existem produtos para o componente. :'(</h1>";
    }
?>
