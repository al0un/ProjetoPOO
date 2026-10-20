<?php
    class QuartoDAO {
        public function create($quarto){
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO quarto(nome, descricao, situacao, preco) VALUES (:n, :d, :s, :p) "
                );
                $query->bindValue(':n', $quarto->getNome() , PDO::PARAM_STR);
                $query->bindValue(':d', $quarto->getDescricao() , PDO::PARAM_STR);
                $query->bindValue(':s', $quarto->getSituacao() , PDO::PARAM_STR);
                $query->bindValue(':p', $quarto->getPreco() , PDO::PARAM_STR);
                 if(!$query->execute()){
                    print r($query->errorInfo());
                }
            }
            catch(PDOException $e){
                echo "Erro #1 " . $e-> getMessage();
               
            }
        }


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
                    $quarto->setNome($linha['nome']);
                    $quarto->setDescricao($linha['descricao']);
                    $quarto->setSituacao($linha['situacao']);
                    $quarto->setPreco($linha['preco']);

                    array_push($listaQuartos, $quarto);

                }

                return $listaQuartos;
            }
            catch(PDOException $e){
                //ALterar para se encaixar com a classe Quarto depois
                echo "Erro #2 " . $e-> getMessage();
               
            }
        }
         public function find ($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM quarto WHERE id_quarto = :i");
                $query->bindValue(':i', $idQuarto, PDO::PARAM_INT);

                if(!$query->execute()){
                    print r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)){
                    $quarto = new quarto(); //Classe Bean

                    $quarto->setIdquarto($linha['id_quarto']);
                    $quarto->setNome($linha['nome']);
                    $quarto->setDescricao($linha['descricao']);
                    $quarto->setSituacao($linha['situacao']);
                    $quarto->setPreco($linha['preco']);

                }

                return $quarto;
            }
            catch(PDOException $e){
                echo "Erro #3 " . $e-> getMessage();
               
            }
        }
        public function update($quarto){
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE quarto
                    SET nome = :n, descricao = :d, situacao = :s, preco = :i
                    WHERE id_quarto = :i"
                );
                $query->bindValue(':n', $quarto->getNome() , PDO::PARAM_STR);
                $query->bindValue(':t', $quarto->getDescricao() , PDO::PARAM_STR);
                $query->bindValue(':t', $quarto->getDescricao() , PDO::PARAM_STR);
                $query->bindValue(':t', $quarto->getDescricao() , PDO::PARAM_STR);
                $query->bindValue(':i', $quarto->getIdquarto() , PDO::PARAM_STR);

                 if(!$query->execute()){
                    print r($query->errorInfo());
                }
            }
            catch(PDOException $e){
                echo "Erro #4 " . $e-> getMessage();
               
            }
        }
    }
?>