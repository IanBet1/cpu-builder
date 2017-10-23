<?php
	class componenteProcessador extends componenteComputador {
		private $velocidadeComponente;
		private $nucleoComponente;

		//Funções de velocidadeComponente
		private function getVelocidadeComponente(){
			return $this -> velocidadeComponente;
		}
		private function setVelocidadeComponente($velocidadeComponente){
			$this -> velocidadeComponente = $velocidadeComponente;
		}

		//Funções de nucleoComponente
		private function getNucleoComponente(){
			return $this -> nucleoComponente;
		}
		private function getNucleoComponente($nucleoComponente){
			$this -> nucleoComponente = $nucleoComponente;
		}

	}
?>
