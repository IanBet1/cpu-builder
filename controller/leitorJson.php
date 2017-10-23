<?php
	include ('componenteProcessador.php');
	include ('componentePlacaMae.php');
	include ('componenteArmazenamento.php');
	include ('componenteFonte.php');
	include ('componenteGabinete.php');
	include ('componenteMemoriaRam.php');
	include ('componentePlacaVideo.php');

	class leitorJson {
		private $appToken = "1495759231647a2155b84";
		private $sourceId = "?sourceId=35795629";
		private $preLinkQAS = "https://sandbox-api.lomadee.com/v2/";
		private $preLinkPRD = "https://api.lomadee.com/v2/";
		private $categoriaComponente;
		private $resultado;

		public function __construct($categoriaComponente){
			$this->setCategoriaComponente($categoriaComponente);
		}

		//Funções de categoriaComponente
		private function getCategoriaComponente(){
			return $this -> categoriaComponente;
		}
		private function setCategoriaComponente($categoriaComponente){
			$this -> categoriaComponente = $categoriaComponente;
		}

		private function buscaProdutosPorCategoria($categoriaComponente){
			//Construção da URL da API.
			$buscaLink = {$preLinkQAS}{$appToken}."/product/_category/".{$categoriaComponente}{$sourceId};

			//Decodificando o JSON obtido.
			$json = json_decode($buscaLink, true);

			//Transformar JSON em tabela

			//Retorna tabela
			return $this -> resultado;
		}

	}
?>
