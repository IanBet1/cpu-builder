<?php
	class componentePlacaMae extends componenteComputador {
		private $socketComponente;
		private $formatoComponente;

		//Funções de socketComponente
		private function getSocketComponente(){
			return $this -> socketComponente;
		}
		private function setSocketComponente($socketComponente){
			$this -> socketComponente = $socketComponente;
		}

		//Funções de imgComponente
		private function getFormatoComponente(){
			return $this -> formatoComponente;
		}
		private function setFormatoComponente($formatoComponente){
			$this -> formatoComponente = $formatoComponente;
		}

	}
?>
