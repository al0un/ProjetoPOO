<?php
    class Cartao implements FormaPagamento{
        public function pagar(){
            echo "<p>Você pagou no débito</p>";
        }
    }
?>