<?php
    class Quarto{
        //Atributos
        private $idQuarto;
        private $nome;
        private $descricao;
        private $situacao;
        private $preco;
    

    //Métodos de encapsulamento (getters e setters)
    public function getIdquarto(){
        return $this-> idQuarto;
    }
    public function setIdquarto($idQuarto){
        return $this-> idQuarto = $idQuarto;
    }

    
    public function getNome(){
        return $this-> nome;
    }
    public function setNome($nome){
        return $this-> nome = $nome;
    }


    public function getDescricao(){
        return $this-> descricao;
    }
    public function setDescricao($descricao){
        return $this-> descricao = $descricao;
    }


    public function getSituacao(){
        return $this-> situacao;
    }
    public function setSituacao($situacao){
        return $this-> situacao = $situacao;
    }


    public function getPreco(){
        return $this-> preco;
    }
    public function setPreco($preco){
        return $this-> preco = $preco;
    }
    }

?>