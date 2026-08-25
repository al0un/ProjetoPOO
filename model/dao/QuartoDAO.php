<?php
    class QuartoDAO {
        public function read () {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM quarto");
                if(!$query->execute()){
                    print r($query->errorInfo());
                }

                $listaQuartos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha){
                    $quarto = new Quarto(); //Classe Bean

                    $quarto->setIdquarto($linha['id_quarto']);
                    $quarto->setNome($linha['id_quarto']);
                    $quarto->setDescricao($linha['id_quarto']);
                    $quarto->setSituacao($linha['id_quarto']);
                    $quarto->setPreco($linha['id_quarto']);

                    array_push($listaQuartos, $quarto);

                }

                return $listaQuartos;
            }
            catch(PDOException $e){
                //ALterar para se encaixar com a classe Quarto depois
                echo "Erro #2 " . $e-> getMessage();
               
            }
     }
    }
?>