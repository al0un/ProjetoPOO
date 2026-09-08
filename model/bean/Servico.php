<?php
    class Servico{
        //Atributos
        private $idServico;
        private $tipoServico;
        private $preco;
    

    //Métodos de encapsulamento (getters e setters)
    public function getIdservico(){
        return $this-> idServico;
    }
    public function setIdservico($idServico){
        return $this-> idServico = $idServico;
    }

    
    public function getTiposervico(){
        return $this-> tipoServico;
    }
    public function setTiposervico($tipoServico){
        return $this-> tipoServico = $tipoServico;
    }


    public function getPreco(){
        return $this-> preco;
    }
    public function setPreco($preco){
        return $this-> preco = $preco;
    }
    }

?>