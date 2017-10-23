<?php
	class componenteArmazenamento extends componenteComputador {
		private $capacidadeComponente;

		//Funções de capacidadeComponente
		private function getCapacidadeComponente(){
			return $this -> capacidadeComponente;
		}
		private function setCapacidadeComponente($capacidadeComponente){
			$this -> capacidadeComponente = $capacidadeComponente;
		}

	}
?>
