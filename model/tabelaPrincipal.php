<?php
	class tabelaPrincipal {
		private $componenteBasico;
		private $imgComponente;
		private $descricaoComponente;
		private $valorComponente;
		private $nomeLoja;
		private $linkOferta;

		public function __construct($componenteBasico){
			$this  ->  setComponenteBasico($componenteBasico);
		}

		//Funções de componenteBasico
		private function getComponenteBasico(){
			return $this  ->  componenteBasico;
		}
		private function setComponenteBasico($componenteBasico){
			$this -> componenteBasico = $componenteBasico;
		}

		//Funções de imgComponente
		private function getImgComponente(){
			return $this -> imgComponente;
		}
		private function setComponenteBasico($imgComponente){
			$this -> imgComponente = $imgComponente;
		}

		//Funções de descricaoComponente
		private function getDescricaoComponente(){
			return $this -> descricaoComponente;
		}
		private function setComponenteBasico($descricaoComponente){
			$this -> descricaoComponente = $descricaoComponente;
		}

		//Funções de valorComponente
		private function getValorComponente(){
			return $this -> valorComponente;
		}
		private function setComponenteBasico($valorComponente){
			$this -> valorComponente = $valorComponente;
		}

		//Funções de nomeLoja
		private function getNomeLoja(){
			return $this -> nomeLoja;
		}
		private function setComponenteBasico($nomeLoja){
			$this -> nomeLoja = $nomeLoja;
		}

		//Funções de linkOferta
		private function getLinkOferta(){
			return $this -> linkOferta;
		}
		private function setComponenteBasico($linkOferta){
			$this -> linkOferta = $linkOferta;
		}

	}
?>
