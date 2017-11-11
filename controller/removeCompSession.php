<?php
  session_start();
  $componente = $_POST['componente'];

  if ($componente == 'processador') {
      $_SESSION["processador"] = "";
      $_SESSION['processadorNome'] = "";
      $_SESSION['processadorPreco'] = "";
      $_SESSION['processadorLinkLoja'] = "";
      $_SESSION['processadorImg'] = "";
      $_SESSION['processadorImgLoja'] = "";
  }
    else if ($componente == 'placamae') {
      $_SESSION["placamae"] = "";
      $_SESSION['placamaeNome'] = "";
      $_SESSION['placamaePreco'] = "";
      $_SESSION['placamaeLinkLoja'] = "";
      $_SESSION['placamaeImg'] = "";
      $_SESSION['placamaeImgLoja'] = "";
  }
    else if ($componente == 'memoriaram') {
      $_SESSION["memoriaram"] = "";
      $_SESSION['memoriaramNome'] = "";
      $_SESSION['memoriaramPreco'] = "";
      $_SESSION['memoriaramLinkLoja'] = "";
      $_SESSION['memoriaramImg'] = "";
      $_SESSION['memoriaramImgLoja'] = "";
  }
    else if ($componente == 'hd/ssd') {
      $_SESSION["hd/ssd"] = "";
      $_SESSION['hd/ssdNome'] = "";
      $_SESSION['hd/ssdPreco'] = "";
      $_SESSION['hd/ssdLinkLoja'] = "";
      $_SESSION['hd/ssdImg'] = "";
      $_SESSION['hd/ssdImgLoja'] = "";
  }
    else if ($componente == 'placavideo') {
      $_SESSION["placavideo"] = "";
      $_SESSION['placavideoNome'] = "";
      $_SESSION['placavideoPreco'] = "";
      $_SESSION['placavideoLinkLoja'] = "";
      $_SESSION['placavideoImg'] = "";
      $_SESSION['placavideoImgLoja'] = "";
    }
    else if ($componente == 'fonte') {
      $_SESSION["fonte"] = "";
      $_SESSION['fonteNome'] = "";
      $_SESSION['fontePreco'] = "";
      $_SESSION['fonteLinkLoja'] = "";
      $_SESSION['fonteImg'] = "";
      $_SESSION['fonteImgLoja'] = "";
    }
    else if ($componente == 'gabinete') {
      $_SESSION["gabinete"] = "";
      $_SESSION['gabineteNome'] = "";
      $_SESSION['gabinetePreco'] = "";
      $_SESSION['gabineteLinkLoja'] = "";
      $_SESSION['gabineteImg'] = "";
      $_SESSION['gabineteImgLoja'] = "";
    }
?>
