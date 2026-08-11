<?php
    class Dinheiro implements FormaPagamento{
        public function pagar(){
            echo "<p>Você pagou no Dinheiro</p>";
        }
        public function troco(){
            echo "<p>Você pagou o valor exato, não tem troco</p>";
        }
    }
?>