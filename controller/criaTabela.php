<?php

  class criaTabela
  {
      private $componenteBasico;
      private $componentes;
      private $retorno;

      public function __construct($componenteBasico, $componentes)
      {
          $this -> setComponenteBasico($componenteBasico);
          $this -> setComponentes($componentes);
      }

      public function getComponenteBasico()
      {
          return $this -> componenteBasico;
      }

      public function setComponenteBasico($componenteBasico)
      {
          $this -> componenteBasico = $componenteBasico;
      }

      public function getComponentes()
      {
          return $this -> componentes;
      }

      public function setComponentes($componentes)
      {
          $this -> componentes = $componentes;
      }

      public function retornaTabela()
      {
          $retorno = '<table>';

          if ($this -> getComponenteBasico() == 'processador') {
              $retorno .=
          '<tr>
            <th></th>
            <th>Processador</th>
            <th>Velocidade</th>
            <th>Núcleos</th>
            <th>Valor</th>
            <th></th>
          </tr>';

              foreach ($this -> getComponentes() as $componente) {
                  $retorno .= "<tr>
            <td>
              <img src='".$componente -> getComponenteBasico()."' height='32' width='32'
            </td>";
                  $retorno .= "
            <td>".
              $componente -> getNomeComponente().
            "</td>";
                  $retorno .= "
            <td>".
              $componente -> getVelocidadeComponente().
            "</td>";
                  $retorno .= "
            <td>".
              $componente -> getNucleoComponente().
            "</td>";
                  $retorno .= "
            <td>R$ ".
              number_format($componente -> getValorGeralMinComponente(), 2, ',', '.').
            "</td>";
                  $retorno .= "
            <td>
              <button type='button'>Escolher</button>
            </td>
            </tr>";
              }
          } elseif ($this -> getComponenteBasico() == 'placamae') {
              $retorno .=
          '<tr>
            <th></th>
            <th>Placa-Mãe</th>
            <th>Soquete</th>
            <th>RAM Máxima</th>
            <th>Valor</th>
            <th></th>
          </tr>';

              foreach ($this -> getComponentes() as $componente) {
                  $retorno .= "<tr>
            <td>
              <img src='".$componente -> getComponenteBasico()."' height='32' width='32'
            </td>";
                  $retorno .= "
            <td>".
              $componente -> getNomeComponente().
            "</td>";
                  $retorno .= "
            <td>".
              $componente -> getSocketComponente().
            "</td>";
                  $retorno .= "
            <td>".
              $componente -> getMemMaxComponente().
            "</td>";
                  $retorno .= "
            <td>R$ ".
              number_format($componente -> getValorGeralMinComponente(), 2, ',', '.').
            "</td>";
                  $retorno .= "
            <td>
              <button type='button'>Escolher</button>
            </td>
            </tr>";
              }
          } elseif ($this -> getComponenteBasico() == 'memoriaram') {
              $retorno .=
          '<tr>
            <th></th>
            <th>Memória RAM</th>
            <th>Velocidade</th>
            <th>Tamanho</th>
            <th>Tipo</th>
            <th>Valor</th>
            <th></th>
          </tr>';

              foreach ($this -> getComponentes() as $componente) {
                  $retorno .= "<tr>
            <td>
              <img src='".$componente -> getComponenteBasico()."' height='32' width='32'
            </td>";
                  $retorno .= "
            <td>".
              $componente -> getNomeComponente().
            "</td>";
                  $retorno .= "
            <td>".
              $componente -> getVelocidadeComponente().
            "</td>";
                  $retorno .= "
            <td>".
              $componente -> getCapacidadeComponente().
            "</td>";
                  $retorno .= "
            <td>".
              $componente -> getTipoMemComponente().
            "</td>";
                  $retorno .= "
            <td>R$ ".
              number_format($componente -> getValorGeralMinComponente(), 2, ',', '.').
            "</td>";
                  $retorno .= "
            <td>
              <button type='button'>Escolher</button>
            </td>
            </tr>";
              }
          } elseif ($this -> getComponenteBasico() == 'hd/ssd') {
              $retorno .=
          '<tr>
            <th></th>
            <th>Armazenamento</th>
            <th>Marca</th>
            <th>Tipo</th>
            <th>Capacidade</th>
            <th>Valor</th>
            <th></th>
          </tr>';

              foreach ($this -> getComponentes() as $componente) {
                  $retorno .= "<tr>
            <td>
              <img src='".$componente -> getComponenteBasico()."' height='32' width='32'
            </td>";
                  $retorno .= "
            <td>".
              $componente -> getNomeComponente().
            "</td>";
                  $retorno .= "
            <td>".
              $componente -> getMarcaComponente().
            "</td>";
                  $retorno .= "
            <td>".
              $componente -> getTipoArmazenamentoComponente().
            "</td>";
                  $retorno .= "
            <td>".
              $componente -> getCapacidadeComponente().
            "</td>";
                  $retorno .= "
            <td>R$ ".
              number_format($componente -> getValorGeralMinComponente(), 2, ',', '.').
            "</td>";
                  $retorno .= "
            <td>
              <button type='button'>Escolher</button>
            </td>
            </tr>";
              }
          } elseif ($this -> getComponenteBasico() == 'placavideo') {
              $retorno .=
          '<tr>
            <th></th>
            <th>Placa de Vídeo</th>
            <th>Marca</th>
            <th>Memória</th>
            <th>Valor</th>
            <th></th>
          </tr>';

              foreach ($this -> getComponentes() as $componente) {
                  $retorno .= "<tr>
            <td>
              <img src='".$componente -> getComponenteBasico()."' height='32' width='32'
            </td>";
                  $retorno .= "
            <td>".
              $componente -> getNomeComponente().
            "</td>";
                  $retorno .= "
            <td>".
              $componente -> getMarcaComponente().
            "</td>";
                  $retorno .= "
            <td>".
              $componente -> getMemComponente().
            "</td>";
                  $retorno .= "
            <td>R$ ".
              number_format($componente -> getValorGeralMinComponente(), 2, ',', '.').
            "</td>";
                  $retorno .= "
            <td>
              <button type='button'>Escolher</button>
            </td>
            </tr>";
              }
          } elseif ($this -> getComponenteBasico() == 'fonte') {
              $retorno .=
          '<tr>
            <th></th>
            <th>Fonte</th>
            <th>Potência</th>
            <th>Valor</th>
            <th></th>
          </tr>';

              foreach ($this -> getComponentes() as $componente) {
                  $retorno .= "<tr>
            <td>
              <img src='".$componente -> getComponenteBasico()."' height='32' width='32'
            </td>";
                  $retorno .= "
            <td>".
              $componente -> getNomeComponente().
            "</td>";
                  $retorno .= "
            <td>".
              $componente -> getPotenciaComponente().
            "</td>";
                  $retorno .= "
            <td>R$ ".
              number_format($componente -> getValorGeralMinComponente(), 2, ',', '.').
            "</td>";
                  $retorno .= "
            <td>
              <button type='button'>Escolher</button>
            </td>
            </tr>";
              }
          } elseif ($this -> getComponenteBasico() == 'gabinete') {
              $retorno .=
          '<tr>
            <th></th>
            <th>Gabinete</th>
            <th>Formato</th>
            <th>Valor</th>
            <th></th>
          </tr>';

              foreach ($this -> getComponentes() as $componente) {
                  $retorno .= "<tr>
            <td>
              <img src='".$componente -> getComponenteBasico()."' height='32' width='32'
            </td>";
                  $retorno .= "
            <td>".
              $componente -> getNomeComponente().
            "</td>";
                  $retorno .= "
            <td>".
              $componente -> getFormatoComponente().
            "</td>";
                  $retorno .= "
            <td>R$ ".
              number_format($componente -> getValorGeralMinComponente(), 2, ',', '.').
            "</td>";
                  $retorno .= "
            <td>
              <button type='button'>Escolher</button>
            </td>
            </tr>";
              }
          }
          $retorno .= '</table>';

          return $retorno;
      }
  }
