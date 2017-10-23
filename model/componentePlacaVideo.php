<?php
	class componentePlacaVideo extends componenteComputador {
		private $chipsetComponente;
		private $memoriaComponente;

		//Funções de chipsetComponente
		private function getChipsetComponente(){
			return $this -> chipsetComponente;
		}
		private function setChipsetComponente($chipsetComponente){
			$this -> chipsetComponente = $chipsetComponente;
		}

		//Funções de memoriaComponente
		private function getMemoriaComponente(){
			return $this -> memoriaComponente;
		}
		private function setMemoriaComponente($memoriaComponente){
			$this -> memoriaComponente = $memoriaComponente;
		}

	}
?>
