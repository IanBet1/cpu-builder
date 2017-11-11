<?php
    include('../model/componenteComputador.php');

    class componenteProcessador extends componenteComputador
    {
        private $velocidadeComponente;

        //Funções de velocidadeComponente
        public function getVelocidadeComponente()
        {
            return $this -> velocidadeComponente;
        }
        public function setVelocidadeComponente($velocidadeComponente)
        {
            $this -> velocidadeComponente = $velocidadeComponente;
        }

    }
?>
