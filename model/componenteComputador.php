<?php
	include ("../model/lojaComponente.php");

	abstract class componenteComputador {
		private $idComponente;
		private $componenteBasico;
		private $nomeComponente;
		private $valorGeralMinComponente;
		private $valorGeralMaxComponente;
		private $marcaComponente;
		private $lojaComponente; // - ->  Criar objeto de loja que possui nome, link e valor

		//Funções de idComponente
		public function getIdComponente(){
			return $this -> idComponente;
		}
		public function setIdComponente($idComponente){
			$this -> idComponente = $idComponente;
		}

		//Funções de componenteBasico
		public function getComponenteBasico(){
			return $this -> componenteBasico;
		}
		public function setComponenteBasico($componenteBasico){
			$this -> componenteBasico = $componenteBasico;
		}

		//Funções de nomeComponente
		public function getNomeComponente(){
			return $this -> nomeComponente;
		}
		public function setNomeComponente($nomeComponente){
			$this -> nomeComponente = $nomeComponente;
		}

		//Funções de valorGeralMinComponente
		public function getValorGeralMinComponente(){
			return $this -> valorGeralMinComponente;
		}
		public function setValorGeralMinComponente($valorGeralMinComponente){
			$this -> valorGeralMinComponente = $valorGeralMinComponente;
		}

		//Funções de valorGeralMaxComponente
		public function getValorGeralMaxComponente(){
			return $this -> valorGeralMaxComponente;
		}
		public function setValorGeralMaxComponente($valorGeralMaxComponente){
			$this -> valorGeralMaxComponente = $valorGeralMaxComponente;
		}

		//Funções de lojaComponente
		public function getLojaComponente(){
			return $this -> lojaComponente;
		}
		public function setLojaComponente($lojaComponente){
			$this -> lojaComponente = $lojaComponente;
		}

		//Funções de marcaComponente
		public function getMarcaComponente(){
			return $this -> marcaComponente;
		}
		public function setMarcaComponente($marcaComponente){
			$this -> marcaComponente = $marcaComponente;
		}

	}
?>
