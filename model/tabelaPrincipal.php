<?php
    class tabelaPrincipal
    {
        private $imgComponente;
        private $descricaoComponente;
        private $valorComponente;
        private $nomeLoja;
        private $linkOferta;

        //Funções de imgComponente
        public function getImgComponente()
        {
            return $this -> imgComponente;
        }
        public function setImgComponente($imgComponente)
        {
            $this -> imgComponente = $imgComponente;
        }

        //Funções de descricaoComponente
        public function getDescricaoComponente()
        {
            return $this -> descricaoComponente;
        }
        public function setDescricaoComponente($descricaoComponente)
        {
            $this -> descricaoComponente = $descricaoComponente;
        }

        //Funções de valorComponente
        public function getValorComponente()
        {
            return $this -> valorComponente;
        }
        public function setValorComponente($valorComponente)
        {
            $this -> valorComponente = $valorComponente;
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

        //Funções de linkOferta
        public function getLinkOferta()
        {
            return $this -> linkOferta;
        }
        public function setLinkOferta($linkOferta)
        {
            $this -> linkOferta = $linkOferta;
        }
    }
?>
