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
		public function getComponenteBasico(){
			return $this  ->  componenteBasico;
		}
		public function setComponenteBasico($componenteBasico){
			$this -> componenteBasico = $componenteBasico;
		}

		//Funções de imgComponente
		public function getImgComponente(){
			return $this -> imgComponente;
		}
		public function setComponenteBasico($imgComponente){
			$this -> imgComponente = $imgComponente;
		}

		//Funções de descricaoComponente
		public function getDescricaoComponente(){
			return $this -> descricaoComponente;
		}
		public function setComponenteBasico($descricaoComponente){
			$this -> descricaoComponente = $descricaoComponente;
		}

		//Funções de valorComponente
		public function getValorComponente(){
			return $this -> valorComponente;
		}
		public function setComponenteBasico($valorComponente){
			$this -> valorComponente = $valorComponente;
		}

		//Funções de nomeLoja
		public function getNomeLoja(){
			return $this -> nomeLoja;
		}
		public function setComponenteBasico($nomeLoja){
			$this -> nomeLoja = $nomeLoja;
		}

		//Funções de linkOferta
		public function getLinkOferta(){
			return $this -> linkOferta;
		}
		public function setComponenteBasico($linkOferta){
			$this -> linkOferta = $linkOferta;
		}

	}
?>
