<?php
    class Pagamento{
        //Atributos
        private $idPagamento;
        private $tipoPagamento;
    

    //Métodos de encapsulamento (getters e setters)
    public function getIdpagamento(){
        return $this-> idPagamento;
    }
    public function setIdpagamento($idPagamento){
        return $this-> idPagamento = $idPagamento;
    }

    
    public function getTipopagamento(){
        return $this-> tipoPagamento;
    }
    public function setTipopagamento($tipoPagamento){
        return $this-> tipoPagamento = $tipoPagamento;
    }
    }

?>