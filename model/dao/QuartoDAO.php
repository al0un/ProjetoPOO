<?php
    class QuartoDAO {
        public function read () {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM * quarto");


            }
            catch(PDOException $e){
                echo "Erro #2 " . $e-.getMessage();
                //Conrinuar a partir daqui
            }
        }
    }
?>