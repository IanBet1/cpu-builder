<?php
	include ('../model/componenteComputador.php');

	class componenteProcessador extends componenteComputador {
		private $velocidadeComponente;
		private $nucleoComponente;

		//Funções de velocidadeComponente
		public function getVelocidadeComponente(){
			return $this -> velocidadeComponente;
		}
		public function setVelocidadeComponente($velocidadeComponente){
			$this -> velocidadeComponente = $velocidadeComponente;
		}

		//Funções de nucleoComponente
		public function getNucleoComponente(){
			return $this -> nucleoComponente;
		}
		public function setNucleoComponente($nucleoComponente){
			$this -> nucleoComponente = $nucleoComponente;
		}

	}
?>
