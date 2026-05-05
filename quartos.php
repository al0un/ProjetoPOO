<?php
        class Quarto {
        private string $nomeQuarto;
        private string $descricao;
        private string $situacao;
        private string $precoQuarto;

        public function __construct($nomeQuarto, $descricao, $situacao, $precoQuarto){
            $this-> nomeQuarto = $nomeQuarto;
            $this-> descricao = $descricao;
            $this-> situacao = $situacao;
            $this-> precoQuarto = $precoQuarto;
        }

        public function getNomeQuarto() {
            return $this->nomeQuarto;
        }

        public function setNomeQuarto($nome) {
            $this->nomeQuarto = $nome;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function getSituacao() {
            return $this->situacao;
        }

        public function setSituacao($situacao) {
            $this->situacao = $situacao;
        }

        public function getPrecoQuarto() {
            return $this->precoQuarto;
        }

        public function setPrecoQuarto($precoQuarto) {
            $this->precoQuarto = $precoQuarto;
        }
    

        public function imprimirQuarto(){
            echo "<P><strong>Numero do quarto: </strong>" . $this-> nomeQuarto . "</P>";
            echo "<P><strong>Descrição do quarto: </strong>" . $this-> descricao . "</P>";
            echo "<P><strong>Situação do quarto: </strong>" . $this-> situacao . "</P>";
            echo "<P><strong>Preço do quarto: </strong>" . $this-> precoQuarto . "</P>";

        }
    }
?>