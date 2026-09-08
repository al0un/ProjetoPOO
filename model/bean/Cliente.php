<?php
    class Cliente{
        //Atributos
        private $idCliente;
        private $nome;
        private $telefone;
    

        //Métodos de encapsulamento (getters e setters)
        public function getIdcliente(){
            return $this-> idCliente;
        }
        public function setIdcliente($idCliente){
            return $this-> idCliente = $idCliente;
        }

        public function getNome(){
            return $this-> nome;
        }
        public function setNome($nome){
            return $this-> nome = $nome;
        }

        
        public function getTelefone(){
            return $this-> telefone;
        }
        public function setTelefone($telefone){
            return $this-> telefone = $telefone;
        }
    }
?>