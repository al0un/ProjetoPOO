<?php
    require "Cartao.php";
    class CartaoCredito extends Cartao{
        public function pagar(){
            echo "<p>Você pagou no Crédito</p>";
        }
        public function parcelar(){
            echo "<p>Você parcelou</p>";
        }
    }
?>