<?php
    include('../model/componenteComputador.php');

    class componenteFonte extends componenteComputador
    {
        private $potenciaComponente;

        //Funções de potenciaComponente
        public function getPotenciaComponente()
        {
            return $this -> potenciaComponente;
        }
        public function setPotenciaComponente($potenciaComponente)
        {
            $this -> potenciaComponente = $potenciaComponente;
        }
    }
?>
