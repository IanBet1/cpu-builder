<?php
    include('../model/componenteComputador.php');

    class componentePlacaMae extends componenteComputador
    {
        private $socketComponente;
        private $memTipComponente;
        private $memMaxComponente;


        //Funções de socketComponente
        public function getSocketComponente()
        {
            return $this -> socketComponente;
        }
        public function setSocketComponente($socketComponente)
        {
            $this -> socketComponente = $socketComponente;
        }

        //Funções de memTipComponente
        public function getMemTipComponente()
        {
            return $this -> memTipComponente;
        }
        public function setMemTipComponente($memTipComponente)
        {
            $this -> memTipComponente = $memTipComponente;
        }

        //Funções de memMaxComponente
        public function getMemMaxComponente()
        {
            return $this -> memMaxComponente;
        }
        public function setMemMaxComponente($memMaxComponente)
        {
            $this -> memMaxComponente = $memMaxComponente;
        }
    }
?>
