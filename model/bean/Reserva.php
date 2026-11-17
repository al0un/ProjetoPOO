<?php
    class Reserva{
        //Atributos
        private $idReserva;
        private $dataReserva;
        private $quantidadehoras;
        private $valortotal;
        private $cliente;
        private $quarto;
        private $pagamento;
    

        //Métodos de encapsulamento (getters e setters)
        public function getIdreserva(){
            return $this-> idReserva;
        }
        public function setIdreserva($idReserva){
            return $this-> idReserva = $idReserva;
        }


        public function getDatareserva(){
            return $this->dataReserva;
        }
        public function setDatareserva($dataReserva){
            return $this->dataReserva = $dataReserva;
        }

        
        public function getQuantidadehoras(){
            return $this-> quantidadehoras;
        }
        public function setQuantidadehoras($quantidadehoras){
            return $this-> quantidadehoras = $quantidadehoras;
        }


        public function getValortotal(){
            return $this-> valortotal;
        }
        public function setValortotal($valortotal){
            return $this-> valortotal = $valortotal;
        }


        public function getCliente(){
            return $this-> cliente;
        }
        public function setCliente($cliente){
            return $this-> cliente = $cliente;
        }
        

        public function getQuarto(){
            return $this-> quarto;
        }
        public function setQuarto($quarto){
            return $this-> quarto = $quarto;
        }

        public function getPagamento(){
            return $this-> pagamento;
        }
        public function setPagamento($pagamento){
            return $this-> pagamento = $pagamento;
        }
    }
?>