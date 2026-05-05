<?php
    class Servicos {
        private float $preco;
        private string $tipoServico;

        public function getPreco() {
            return $this->preco;
        }

        public function setPreco($preco) {
            $this->preco = $preco;
        }

        public function getTipoServico() {
            return $this->tipoServico;
        }

        public function setTipoServico($tipo) {
            $this->tipoServico = $tipo;
        }

        public function __construct($preco, $tipoServico){
            $this-> preco = $preco;
            $this-> tipoServico = $tipoServico;
        }

        public function imprimirServico(){
            echo"<p>Serviço: " . $this->tipoServico ."</p>" . 
            "<p>Preço: " . $this->preco ."</p>" ;
        }
    }
?>