<?php
	class componenteGabinete extends componenteComputador {
		private $formatoComponente;

		//Funções de formatoComponente
		public function getFormatoComponente(){
			return $this -> formatoComponente;
		}
		public function setFormatoComponente($formatoComponente){
			$this -> formatoComponente = $formatoComponente;
		}

	}
?>
