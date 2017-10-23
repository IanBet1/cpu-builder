<?php
	require ('../controller/mySql.php');

	class buscaCategoria {
		private $componenteBasico;
		private $retorno;
		private $meubanco;

		function __construct($componenteBasico){
			$this -> componenteBasico = $componenteBasico;
		}

		function retornaCategoria() {
			$meubanco = new mySql();
			$meubanco -> dbConnect();
			$retorno = $meubanco->selectWhere('categoriacomponente', 'nomeComponente', '=', $this -> componenteBasico, 'char');
			if (mysqli_num_rows($retorno) > 0) {
    		while($linha = mysqli_fetch_assoc($retorno)) {
        	return $linha["idCategoria"];
    		}
				}	else {
    			return 0;
				}
			$meubanco -> dbDisconnect();
		}
	}
?>
