<?php
    include('../controller/buscaCategoria.php');
    include('../model/componenteMemoriaRam.php');
    include('../controller/leitorJson.php');
    include('../controller/criaTabela.php');

    session_start();
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

                    if(empty($_SESSION['placamae']) == true){
                      $memoriasram[] = $memoriaram;
                    } else {
                      if($memoriaram -> getTipoMemComponente() == $_SESSION['placamaeTipMem']) {
                        $memoriasram[] = $memoriaram;
                      }
                    }
              }
            }
        }
        if(!empty($memoriasram)){
          $tabela = new criaTabela('memoriaram', $memoriasram);
          echo $tabela -> retornaTabela();
        } else {
          $tabela = new criaTabela('memoriaram', 0);
          echo $tabela -> retornaTabela();
        }
    }
    else {
      echo "<br><br><h1 class='not_found_sorry'>Lamentamos!</h1><br><br>
      <h1 class='not_found'>Não existem produtos para o componente. :'(</h1>";
    }
?>
