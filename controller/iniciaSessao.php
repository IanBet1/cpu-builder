<?php
  include('../controller/buscaComponenteTabela.php');
  $busca = new buscaComponenteTabela();
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $_SESSION['precoTotal'] = "";
    $_SESSION['componente'] = "";
    $retorno = "<table id='tabelaPrincipal' class='tg' style='undefined;table-layout: fixed; width: 700px'>
      <colgroup>
        <col style='width: 130px'>
        <col style='width: 50px'>
        <col style='width: 230px'>
        <col style='width: 100px'>
        <col style='width: 100px'>
        <col style='width: 80px'>
      </colgroup>
      <tr>
        <th class='tg-zv5z'>Componente</th>
        <th class='tg-zv5z'></th>
        <th class='tg-zv5z'>Peça</th>
        <th class='tg-zv5z'>Valor</th>
        <th class='tg-zv5z'>Loja/Link</th>
        <th class='tg-zv5z'></th>
      </tr>";

    if(isset($_SESSION['processador']) || isset($_SESSION['placamae']) || isset($_SESSION['memoriaram']) || isset($_SESSION['hd']) || isset($_SESSION['ssd']) || isset($_SESSION['placavideo']) || isset($_SESSION['fonte']) || isset($_SESSION['gabinete']))
    {
      if(isset($_SESSION['processador']) && !empty($_SESSION['processador'])){
        $_SESSION['componente'] = "processador";
        $busca -> insertComponenteTabela();
        $retorno .= "<tr>
          <td class='tg-yw4l'><b>Processador</td>
          <td class='tg-value'><img src='".$_SESSION['processadorImg']."' height='45' width='45'></td>
          <td class='tg-yw4l'>".$_SESSION['processadorNome']."</td>
          <td class='tg-value'>R$ ".number_format($_SESSION['processadorPreco'], 2, ',', '.')."</td>
          <td class='tg-value'><a href='".$_SESSION['processadorLinkLoja']."'><img src='".$_SESSION['processadorImgLoja']."'></a></td>
          <td class='tg-yw4l'><input type='button' class='fake-btn-remove' data-componente='processador' value='X'></td>
        </tr>";
      }
      else {
        $retorno .= "<tr>
          <td class='tg-yw4l'><b>Processador</td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'><a ng-if='!part.price' class='fake-btn' ng-href='/processadores' href='/processadores.html'>Escolher Processador</a></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
        </tr>";
      }
      if(isset($_SESSION['placamae']) && !empty($_SESSION['placamae'])){
        $_SESSION['componente'] = "placamae";
        $busca -> insertComponenteTabela();
        $retorno .= "<tr>
          <td class='tg-yw4l'><b>Placa-Mãe</td>
          <td class='tg-value'><img src='".$_SESSION['placamaeImg']."' height='45' width='45'></td>
          <td class='tg-yw4l'>".$_SESSION['placamaeNome']."</td>
          <td class='tg-value'>R$ ".number_format($_SESSION['placamaePreco'], 2, ',', '.')."</td>
          <td class='tg-value'><a href='".$_SESSION['placamaeLinkLoja']."'><img src='".$_SESSION['placamaeImgLoja']."'></a></td>
          <td class='tg-yw4l'><input type='button' class='fake-btn-remove' data-componente='placamae' value='X'></td>
        </tr>";
      }
      else {
        $retorno .= "<tr>
          <td class='tg-yw4l'><b>Placa Mãe</td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'><a ng-if='!part.price' class='fake-btn' ng-href='/placas-mae' href='/placas-mae.html'>Escolher Placa Mãe</a></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
        </tr>";
      }
      if(isset($_SESSION['memoriaram']) && !empty($_SESSION['memoriaram'])){
        $_SESSION['componente'] = "memoriaram";
        $busca -> insertComponenteTabela();
        $retorno .= "<tr>
          <td class='tg-yw4l'><b>Memória RAM</td>
          <td class='tg-value'><img src='".$_SESSION['memoriaramImg']."' height='45' width='45'></td>
          <td class='tg-yw4l'>".$_SESSION['memoriaramNome']."</td>
          <td class='tg-value'>R$ ".number_format($_SESSION['memoriaramPreco'], 2, ',', '.')."</td>
          <td class='tg-value'><a href='".$_SESSION['memoriaramLinkLoja']."'><img src='".$_SESSION['memoriaramImgLoja']."'></a></td>
          <td class='tg-yw4l'><input type='button' class='fake-btn-remove' data-componente='memoriaram' value='X'></td>
        </tr>";
      }
      else {
        $retorno .= "<tr>
          <td class='tg-yw4l'><b>Memória RAM</td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'><a ng-if='!part.price' class='fake-btn' ng-href='/memorias' href='/memorias.html'>Escolher Memória RAM</a></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
        </tr>";
      }
      if(isset($_SESSION['hd']) && !empty($_SESSION['hd'])){
        $_SESSION['componente'] = "hd";
        $busca -> insertComponenteTabela();
        $retorno .= "<tr>
          <td class='tg-yw4l'><b>Disco Rígido</td>
          <td class='tg-value'><img src='".$_SESSION['hdImg']."' height='45' width='45'></td>
          <td class='tg-yw4l'>".$_SESSION['hdNome']."</td>
          <td class='tg-value'>R$ ".number_format($_SESSION['hdPreco'], 2, ',', '.')."</td>
          <td class='tg-value'><a href='".$_SESSION['hdLinkLoja']."'><img src='".$_SESSION['hdImgLoja']."'></a></td>
          <td class='tg-yw4l'><input type='button' class='fake-btn-remove' data-componente='hd' value='X'></td>
        </tr>";
      }
      else {

        $retorno .= "<tr>
          <td class='tg-yw4l'><b>Disco Rígido</td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'><a ng-if='!part.price' class='fake-btn' ng-href='/discos-rigidos' href='/discos-rigidos.html'>Escolher Disco Rígido</a></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
        </tr>";
      }
      if(isset($_SESSION['ssd']) && !empty($_SESSION['ssd'])){
        $_SESSION['componente'] = "ssd";
        $busca -> insertComponenteTabela();
        $retorno .= "<tr>
          <td class='tg-yw4l'><b>SSD</td>
          <td class='tg-value'><img src='".$_SESSION['ssdImg']."' height='45' width='45'></td>
          <td class='tg-yw4l'>".$_SESSION['ssdNome']."</td>
          <td class='tg-value'>R$ ".number_format($_SESSION['ssdPreco'], 2, ',', '.')."</td>
          <td class='tg-value'><a href='".$_SESSION['ssdLinkLoja']."'><img src='".$_SESSION['ssdImgLoja']."'></a></td>
          <td class='tg-yw4l'><input type='button' class='fake-btn-remove' data-componente='ssd' value='X'></td>
        </tr>";
      }
      else {
        $retorno .= "<tr>
          <td class='tg-yw4l'><b>SSD</td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'><a ng-if='!part.price' class='fake-btn' ng-href='/ssds' href='/ssds.html'>Escolher SSD</a></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
        </tr>";
      }
      if(isset($_SESSION['placavideo']) && !empty($_SESSION['placavideo'])){
        $_SESSION['componente'] = "placavideo";
        $busca -> insertComponenteTabela();
        $retorno .= "<tr>
          <td class='tg-yw4l'><b>Placa de Vídeo</td>
          <td class='tg-value'><img src='".$_SESSION['placavideoImg']."' height='45' width='45'></td>
          <td class='tg-yw4l'>".$_SESSION['placavideoNome']."</td>
          <td class='tg-value'>R$ ".number_format($_SESSION['placavideoPreco'], 2, ',', '.')."</td>
          <td class='tg-value'><a href='".$_SESSION['placavideoLinkLoja']."'><img src='".$_SESSION['placavideoImgLoja']."'></a></td>
          <td class='tg-yw4l'><input type='button' class='fake-btn-remove' data-componente='placavideo' value='X'></td>
        </tr>";
      }
      else {
        $retorno .= "<tr>
          <td class='tg-yw4l'><b>Placa de Vídeo</td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'><a ng-if='!part.price' class='fake-btn' ng-href='/placas-video' href='/placas-video.html'>Escolher Placa de Vídeo</a></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
        </tr>";
      }
      if(isset($_SESSION['fonte']) && !empty($_SESSION['fonte'])){
        $_SESSION['componente'] = "fonte";
        $busca -> insertComponenteTabela();
        $retorno .= "<tr>
          <td class='tg-yw4l'><b>Fonte</td>
          <td class='tg-value'><img src='".$_SESSION['fonteImg']."' height='45' width='45'></td>
          <td class='tg-yw4l'>".$_SESSION['fonteNome']."</td>
          <td class='tg-value'>R$ ".number_format($_SESSION['fontePreco'], 2, ',', '.')."</td>
          <td class='tg-value'><a href='".$_SESSION['fonteLinkLoja']."'><img src='".$_SESSION['fonteImgLoja']."'></a></td>
          <td class='tg-yw4l'><input type='button' class='fake-btn-remove' data-componente='fonte' value='X'></td>
        </tr>";
      }
      else {
        $retorno .= "<tr>
          <td class='tg-yw4l'><b>Fonte</td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'><a ng-if='!part.price' class='fake-btn' ng-href='/fontes' href='/fontes.html'>Escolher Fonte</a></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
        </tr>";
      }
      if(isset($_SESSION['gabinete']) && !empty($_SESSION['gabinete'])){
        $_SESSION['componente'] = "gabinete";
        $busca -> insertComponenteTabela();
        $retorno .= "<tr>
          <td class='tg-yw4l'><b>Gabinete</td>
          <td class='tg-value'><img src='".$_SESSION['gabineteImg']."' height='45' width='45'></td>
          <td class='tg-yw4l'>".$_SESSION['gabineteNome']."</td>
          <td class='tg-value'>R$ ".number_format($_SESSION['gabinetePreco'], 2, ',', '.')."</td>
          <td class='tg-value'><a href='".$_SESSION['gabineteLinkLoja']."'><img src='".$_SESSION['gabineteImgLoja']."'></a></td>
          <td class='tg-yw4l'><input type='button' class='fake-btn-remove' data-componente='gabinete' value='X'></td>
        </tr>";
      }
      else {
        $retorno .= "<tr>
          <td class='tg-yw4l'><b>Gabinete</td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'><a ng-if='!part.price' class='fake-btn' ng-href='/gabinetes' href='/gabinetes.html'>Escolher Gabinete</a></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
        </tr>";
      }
      if (isset($_SESSION['precoTotal']) && !empty($_SESSION['precoTotal'])){
      $retorno .= "<tr>
        <td class='tg-none'></td>
        <td class='tg-none'></td>
        <td class='tg-none'><a><i class='fa fa-download fa-3x' aria-hidden='true'></i></a></td>
        <td class='tg-none' colspan='3'><button class='fake-btn-value'>R$ ".number_format($_SESSION['precoTotal'], 2, ',', '.')."</button></td>
      </tr></table>";
      }
      else {
        $retorno .= "<tr>
          <td class='tg-none'></td>
          <td class='tg-none'></td>
          <td class='tg-none'><a><i class='fa fa-download fa-3x' aria-hidden='true'></i></a></td>
          <td class='tg-none' colspan='3'><button class='fake-btn-value'>R$ 0,00</button></td>
        </tr></table>";
      }
      echo $retorno;
    }
    else{
      echo "<table id='tabelaPrincipal' class='tg' style='undefined;table-layout: fixed; width: 770px'>
        <colgroup>
          <col style='width: 130px'>
          <col style='width: 100px'>
          <col style='width: 200px'>
          <col style='width: 140px'>
          <col style='width: 200px'>
        </colgroup>
        <tr>
          <th class='tg-zv5z'>Componente</th>
          <th class='tg-zv5z'></th>
          <th class='tg-zv5z'>Peça</th>
          <th class='tg-zv5z'>Valor</th>
          <th class='tg-zv5z'>Loja/Link</th>
        </tr>
        <tr>
          <td class='tg-yw4l'><b>Processador</td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'><a ng-if='!part.price' class='fake-btn' ng-href='/processadores' href='/processadores.html'>Escolher Processador</a></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
        </tr>
        <tr>
          <td class='tg-yw4l'><b>Placa Mãe</td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'><a ng-if='!part.price' class='fake-btn' ng-href='/placas-mae' href='/placas-mae.html'>Escolher Placa Mãe</a></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
        </tr>
        <tr>
          <td class='tg-yw4l'><b>Memória RAM</td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'><a ng-if='!part.price' class='fake-btn' ng-href='/memorias' href='/memorias.html'>Escolher Memória RAM</a></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
        </tr>
        <tr>
          <td class='tg-yw4l'><b>Disco Rígido</td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'><a ng-if='!part.price' class='fake-btn' ng-href='/discos-rigidos' href='/discos-rigidos.html' componente='hd'>Escolher Disco Rígido</a></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
        </tr>
        <tr>
          <td class='tg-yw4l'><b>SSD</td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'><a ng-if='!part.price' class='fake-btn' ng-href='/ssds' href='/ssds.html' componente='ssd'>Escolher SSD</a></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
        </tr>
        <tr>
          <td class='tg-yw4l'><b>Placa de Vídeo</td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'><a ng-if='!part.price' class='fake-btn' ng-href='/placas-video' href='/placas-video.html'>Escolher Placa de Vídeo</a></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
        </tr>
        <tr>
          <td class='tg-yw4l'><b>Fonte</td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'><a ng-if='!part.price' class='fake-btn' ng-href='/fontes' href='/fontes.html'>Escolher Fonte</a></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
        </tr>
        <tr>
          <td class='tg-yw4l'><b>Gabinete</td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'><a ng-if='!part.price' class='fake-btn' ng-href='/gabinetes' href='/gabinetes.html'>Escolher Gabinete</a></td>
          <td class='tg-yw4l'></td>
          <td class='tg-yw4l'></td>
        </tr>
        <tr>
          <td class='tg-none'></td>
          <td class='tg-none'></td>
          <td class='tg-none'></td>
          <td class='tg-none'><a><i class='fa fa-download fa-3x' aria-hidden='true'></i></a></td>
          <td class='tg-none'><button class='fake-btn-value'>R$ 0,00</button></td>
        </tr>
      </table><br><br>";
    }
  }
?>
