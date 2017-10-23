<?php
	class componenteFonte extends componenteComputador {
		private $potenciaComponente;

		//Funções de potenciaComponente
		private function getPotenciaComponente(){
			return $this -> potenciaComponente;
		}
		private function setPotenciaComponente($potenciaComponente){
			$this -> potenciaComponente = $potenciaComponente;
		}

	}
?>
