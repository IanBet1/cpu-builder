<?php
    require('../controller/mySql.php');

    class buscaCategoria
    {
        private $componenteBasico;
        private $retorno;
        private $meubanco;

        public function __construct($componenteBasico) {
            $this -> setComponenteBasico($componenteBasico);
        }

        public function setComponenteBasico($componenteBasico) {
          $this -> componenteBasico = $componenteBasico;
        }

        public function retornaCategoria() {
            $meubanco = new mySql();
            $meubanco -> dbConnect();
            $retorno = $meubanco -> selectWhere('categoriaComponente', 'nomeComponente', '=', $this -> componenteBasico, 'char');
            if (mysqli_num_rows($retorno) > 0) {
                while ($linha = mysqli_fetch_assoc($retorno)) {
                    $meubanco -> dbDisconnect();
                    return $linha["idCategoria"];
                }
            } else {
                $meubanco -> dbDisconnect();
                return 0;
            }
        }

        public function retornaSocket() {
            $meubanco = new mySql();
            $meubanco -> dbConnect();
            $retorno = $meubanco->selectWhere('socketComponente', 'nomeSocket', '=', $this -> componenteBasico, 'char');
            if (mysqli_num_rows($retorno) > 0) {
                while ($linha = mysqli_fetch_assoc($retorno)) {
                    $meubanco -> dbDisconnect();
                    return $linha["marcaComponente"];
                }
            } else {
                $meubanco -> dbDisconnect();
                return 0;
            }
        }
    }
?>
