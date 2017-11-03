<?php
    include('../model/componenteComputador.php');

    class componentePlacaVideo extends componenteComputador
    {
        private $memComponente;

        //Funções de memComponente
        public function getMemComponente()
        {
            return $this -> memComponente;
        }
        public function setMemComponente($memComponente)
        {
            $this -> memComponente = $memComponente;
        }
    }
?>
