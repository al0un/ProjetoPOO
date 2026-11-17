<?php
    class FormaPagamento{
        //Atributos
        private $idFormaPagamento;
        private $tipoPagamento;
    

        //Métodos de encapsulamento (getters e setters)
        public function getIdFormaPagamento(){
            return $this-> idFormaPagamento;
        }
        public function setIdFormaPagamento($idFormaPagamento){
            return $this-> idFormaPagamento = $idFormaPagamento;
        }

        
        public function getTipoPagamento(){
            return $this-> tipoPagamento;
        }
        public function setTipoPagamento($tipoPagamento){
            return $this-> tipoPagamento = $tipoPagamento;
        }
    }
?>