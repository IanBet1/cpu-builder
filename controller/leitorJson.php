<?php
    class leitorJson
    {
        private $appToken = "1495759231647a2155b84";
        private $sourceId = "?sourceId=35795629";
        private $preLinkQAS = "https://sandbox-api.lomadee.com/v2/";
        private $preLinkPRD = "https://api.lomadee.com/v2/";
        private $categoriaComponente;
        private $resultado;

        public function __construct($categoriaComponente)
        {
            $this -> setCategoriaComponente($categoriaComponente);
        }

        //Funções de categoriaComponente
        private function getCategoriaComponente()
        {
            return $this -> categoriaComponente;
        }
        private function setCategoriaComponente($categoriaComponente)
        {
            $this -> categoriaComponente = $categoriaComponente;
        }

        public function buscaProdutosPorCategoria()
        {
          try {
            $buscaLink = $this -> preLinkQAS.$this -> appToken."/product/_category/".$this -> getCategoriaComponente().$this -> sourceId;
            $json = json_decode(file_get_contents($buscaLink), true);
            $this -> resultado = $json;
            return $this -> resultado;
          } catch (Exception $e) {
            return $e;
          }
        }

        public function buscaEspecificacaoTecnicaComponente($idComponente)
        {
          try {
            $buscaLink = $this -> preLinkQAS.$this -> appToken."/product/_id/".$idComponente.$this -> sourceId;
            $json = json_decode(file_get_contents($buscaLink), true);
            $this -> resultado = $json;
            return $this -> resultado;
          } catch (Exception $e) {
            return $e;
          }
        }

        public function buscaOfertasDeProdutos($idComponente)
        {
          try {
            $buscaLink = $this -> preLinkQAS.$this -> appToken."/offer/_product/".$idComponente.$this -> sourceId;
            $json = json_decode(file_get_contents($buscaLink), true);
            $this -> resultado = $json;
            return $this -> resultado;
          } catch (Exception $e) {
            return $e;
          }
        }
    }
