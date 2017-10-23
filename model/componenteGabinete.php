<?php
	class componenteGabinete extends componenteComputador {
		private $formatoComponente;

		//Funções de formatoComponente
		private function getFormatoComponente(){
			return $this -> formatoComponente;
		}
		private function setFormatoComponente($formatoComponente){
			$this -> formatoComponente = $formatoComponente;
		}

	}
?>
