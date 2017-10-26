<?php
	class componenteArmazenamento extends componenteComputador {
		private $capacidadeComponente;

		//Funções de capacidadeComponente
		public function getCapacidadeComponente(){
			return $this -> capacidadeComponente;
		}
		public function setCapacidadeComponente($capacidadeComponente){
			$this -> capacidadeComponente = $capacidadeComponente;
		}

	}
?>
