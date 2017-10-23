<?php
	class componenteMemoriaRam extends componenteComputador {
		private $velocidadeComponente;
		private $tamanhoComponente;

		//Funções de velocidadeComponente
		private function getVelocidadeComponente(){
			return $this -> velocidadeComponente;
		}
		private function setVelocidadeComponente($velocidadeComponente){
			$this -> velocidadeComponente = $velocidadeComponente;
		}

		//Funções de tamanhoComponente
		private function getTamanhoComponente(){
			return $this -> tamanhoComponente;
		}
		private function setTamanhoComponente($tamanhoComponente){
			$this -> tamanhoComponente = $tamanhoComponente;
		}

	}
?>
