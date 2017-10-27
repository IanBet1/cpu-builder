<?php
	include ('../model/componenteComputador.php');

	class componenteMemoriaRam extends componenteComputador {
		private $velocidadeComponente;
		private $capacidadeComponente;
		private $tipoMemComponente;

		//Funções de velocidadeComponente
		public function getVelocidadeComponente(){
			return $this -> velocidadeComponente;
		}
		public function setVelocidadeComponente($velocidadeComponente){
			$this -> velocidadeComponente = $velocidadeComponente;
		}

		//Funções de capacidadeComponente
		public function getCapacidadeComponente(){
			return $this -> capacidadeComponente;
		}
		public function setCapacidadeComponente($capacidadeComponente){
			$this -> capacidadeComponente = $capacidadeComponente;
		}

		//Funções de tipoMemComponente
		public function getTipoMemComponente(){
			return $this -> tipoMemComponente;
		}
		public function setTipoMemComponente($tipoMemComponente){
			$this -> tipoMemComponente = $tipoMemComponente;
		}

	}
?>
