<?php
	include ("lojaComponente.php");

	abstract class componenteComputador {
		private $idComponente;
		private $componenteBasico;
		private $nomeComponente;
		private $valorGeralMinComponente;
		private $valorGeralMaxComponente;
		private $lojaComponente // - ->  Criar objeto de loja que possui nome, link e valor

		public function __construct($componenteBasico){
			$this -> setComponenteBasico($componenteBasico);
		}

		//Funções de idComponente
		private function getIdComponente(){
			return $this -> idComponente;
		}
		private function setIdComponente($idComponente){
			$this -> idComponente = $idComponente;
		}

		//Funções de componenteBasico
		private function getComponenteBasico(){
			return $this -> componenteBasico;
		}
		private function setComponenteBasico($componenteBasico){
			$this -> componenteBasico = $componenteBasico;
		}

		//Funções de nomeComponente
		private function getNomeComponente(){
			return $this -> nomeComponente;
		}
		private function setNomeComponente($nomeComponente){
			$this -> nomeComponente = $nomeComponente;
		}

		//Funções de valorGeralMinComponente
		private function getValorGeralMinComponente(){
			return $this -> valorGeralMinComponente;
		}
		private function setValorGeralMinComponente($valorGeralMinComponente){
			$this -> valorGeralMinComponente = $valorGeralMinComponente;
		}

		//Funções de valorGeralMaxComponente
		private function getValorGeralMaxComponente(){
			return $this -> valorGeralMaxComponente;
		}
		private function setValorGeralMaxComponente($valorGeralMaxComponente){
			$this -> valorGeralMaxComponente = $valorGeralMaxComponente;
		}

		//Funções de lojaComponente !!!! verificar implementação
		private function getLojaComponente(){
			return $this -> lojaComponente;
		}
		private function setLojaComponente($lojaComponente){
			$this -> lojaComponente = $lojaComponente;
		}

	}
?>
