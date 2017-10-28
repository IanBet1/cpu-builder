<?php
    class lojaComponente
    {
        private $logoLoja;
        private $nomeLoja;
        private $valorLoja;
        private $linkLoja;

        //Funções de logoLoja
        public function getLogoLoja()
        {
            return $this -> logoLoja;
        }
        public function setLogoLoja($logoLoja)
        {
            $this -> logoLoja = $logoLoja;
        }

        //Funções de nomeLoja
        public function getNomeLoja()
        {
            return $this -> nomeLoja;
        }
        public function setNomeLoja($nomeLoja)
        {
            $this -> nomeLoja = $nomeLoja;
        }

        //Funções de valorLoja
        public function getValorLoja()
        {
            return $this -> valorLoja;
        }
        public function setValorLoja($valorLoja)
        {
            $this -> valorLoja = $valorLoja;
        }

        //Funções de linkLoja
        public function getLinkLoja()
        {
            return $this -> linkLoja;
        }
        public function setLinkLoja($linkLoja)
        {
            $this -> linkLoja = $linkLoja;
        }
    }
