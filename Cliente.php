<?php
    class Cliente {
        private string $telefone;
        private Carro $carro;

        public function __construct(
            string $telefone,
            Carro $carro
        ) {
            $this->telefone = $telefone;
            $this->carro = $carro;
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

        public function setCarro(Carros $carro) {
            $this->carro = $carro;
        }
    }
?>