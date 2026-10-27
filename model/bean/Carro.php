<?php
    class Carro{
        //Atributos
        private $idCarro;
        private $placa;
        private $modelo;
        private $cor;
        private $cliente;
    

        //Métodos de encapsulamento (getters e setters)
        public function getIdcarro(){
            return $this-> idCarro;
        }
        public function setIdcarro($idCarro){
            return $this-> idCarro = $idCarro;
        }

        public function getPlaca(){
            return $this->placa;
        }
        public function setPlaca($placa){
            return $this->placa = $placa;
        }

        
        public function getModelo(){
            return $this-> modelo;
        }
        public function setModelo($modelo){
            return $this-> modelo = $modelo;
        }

        public function getCor(){
            return $this-> cor;
        }
        public function setCor($cor){
            return $this-> cor = $cor;
        }

        public function getCliente(){
            return $this-> cliente;
        }
        public function setCliente($cliente){
            return $this-> cliente = $cliente;
        }
    }
?>