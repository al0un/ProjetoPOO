<?php
    class CartaoCredito extends Cartao{
        public function pagar(){
            echo "<p>Você pagou no Crédito</p>";
        }
        public function parcelar(){
            echo "<p>Você parcelou no cartão de crédito</p>"
        }
    }
?>