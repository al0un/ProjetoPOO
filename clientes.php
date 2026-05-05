<?php
    class Cliente {
        private string $telefone;
        private Carro $carro;

        public function __construct($telefone){
            $this-> telefone = $telefone;
        }
        public function getTelefone() {
            return $this->telefone;
        }

        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        public function getCarro() {
            return $this->carro;
        }

        public function setCarro(Carro $carro) {
            $this->carro = $carro;
        }
    public function imprimirCliente(){
            echo "<P><strong>Telefone do cliente: </strong>" . $this-> telefone . "</P>";

        }
    }
?>