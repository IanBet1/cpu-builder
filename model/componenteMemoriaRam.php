<?php
	class componenteMemoriaRam extends componenteComputador {
		private $velocidadeComponente;
		private $tamanhoComponente;

		//Funções de velocidadeComponente
		public function getVelocidadeComponente(){
			return $this -> velocidadeComponente;
		}
		public function setVelocidadeComponente($velocidadeComponente){
			$this -> velocidadeComponente = $velocidadeComponente;
		}

		//Funções de tamanhoComponente
		public function getTamanhoComponente(){
			return $this -> tamanhoComponente;
		}
		public function setTamanhoComponente($tamanhoComponente){
			$this -> tamanhoComponente = $tamanhoComponente;
		}

	}
?>
