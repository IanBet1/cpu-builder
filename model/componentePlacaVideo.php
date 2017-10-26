<?php
	class componentePlacaVideo extends componenteComputador {
		private $chipsetComponente;
		private $memoriaComponente;

		//Funções de chipsetComponente
		public function getChipsetComponente(){
			return $this -> chipsetComponente;
		}
		public function setChipsetComponente($chipsetComponente){
			$this -> chipsetComponente = $chipsetComponente;
		}

		//Funções de memoriaComponente
		public function getMemoriaComponente(){
			return $this -> memoriaComponente;
		}
		public function setMemoriaComponente($memoriaComponente){
			$this -> memoriaComponente = $memoriaComponente;
		}

	}
?>
