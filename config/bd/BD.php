<?php
    class BD {
        //método estatico não precisa inserir valor, ele sempre vai fazer a mesma coisa
        public static function getConexao() {
            $conn = new PDO(
                "mysql:host=localhost;dbname=bd_motel" , 
                "roo"
                ""
            );

            return $conn;
        }
    }
?>