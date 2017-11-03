<?php
    include('../model/componenteComputador.php');

    class componenteArmazenamento extends componenteComputador
    {
        private $tipoArmazenamentoComponente;
        private $capacidadeComponente;

        //Funções de tipoArmazenamentoComponente
        public function getTipoArmazenamentoComponente()
        {
            return $this -> tipoArmazenamentoComponente;
        }
        public function setTipoArmazenamentoComponente($tipoArmazenamentoComponente)
        {
            $this -> tipoArmazenamentoComponente = $tipoArmazenamentoComponente;
        }

        //Funções de capacidadeComponente
        public function getCapacidadeComponente()
        {
            return $this -> capacidadeComponente;
        }
        public function setCapacidadeComponente($capacidadeComponente)
        {
            $this -> capacidadeComponente = $capacidadeComponente;
        }
    }
?>
