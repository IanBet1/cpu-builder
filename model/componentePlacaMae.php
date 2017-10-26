<?php
	class componentePlacaMae extends componenteComputador {
		private $socketComponente;
		private $formatoComponente;

		//Funções de socketComponente
		public function getSocketComponente(){
			return $this -> socketComponente;
		}
		public function setSocketComponente($socketComponente){
			$this -> socketComponente = $socketComponente;
		}

		//Funções de imgComponente
		public function getFormatoComponente(){
			return $this -> formatoComponente;
		}
		public function setFormatoComponente($formatoComponente){
			$this -> formatoComponente = $formatoComponente;
		}

	}
?>
