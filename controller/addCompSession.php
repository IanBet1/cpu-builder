<?php
  $componente = $_POST['componente'];
  $idComponente = $_POST['idComponente'];

  session_start();
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
    case 'hd/ssd':{
      $_SESSION["hd/ssd"] = $idComponente;
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
