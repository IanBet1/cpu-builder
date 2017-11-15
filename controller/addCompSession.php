<?php
  $componente = $_POST['componente'];
  $idComponente = $_POST['idComponente'];

  session_start();
  $_SESSION['precoTotal'] = 0;
  switch($componente){
    case 'processador':{
      $_SESSION["processador"] = $idComponente;
    };break;
    case 'placamae':{
      $_SESSION["placamae"] = $idComponente;
    };break;
    case 'memoriaram':{
      $_SESSION["memoriaram"] = $idComponente;
    };break;
    case 'hd':{
      $_SESSION["hd"] = $idComponente;
    };break;
    case 'ssd':{
      $_SESSION["ssd"] = $idComponente;
    };break;
    case 'placavideo':{
      $_SESSION["placavideo"] = $idComponente;
    };break;
    case 'fonte':{
      $_SESSION["fonte"] = $idComponente;
    };break;
    case 'gabinete':{
      $_SESSION["gabinete"] = $idComponente;
    };break;
  }
?>
