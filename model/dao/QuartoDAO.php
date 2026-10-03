<?php
    class QuartoDAO {
        public function create($quarto){
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO quarto(nome, descricao, situacao, preco) VALUES (:nq, :dq, :sq, :pq) "
                );
                $query->bindValue(':nq', $quarto->getNome() ,      PDO::PARAM_STR);
                $query->bindValue(':dq', $quarto->getDescricao() , PDO::PARAM_STR);
                $query->bindValue(':sq', $quarto->getSituacao() ,  PDO::PARAM_STR);
                $query->bindValue(':pq', $quarto->getPreco() ,     PDO::PARAM_STR);

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
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute()){
                    print r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)){
                    $quarto = new Quarto(); //Classe Bean

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
                    SET nome = :nq, descricao = :dq, situacao = :sq, preco = :pq 
                    WHERE id_quarto = :i"
                );
                $query->bindValue(':nq', $quarto->getNome() , PDO::PARAM_STR);
                $query->bindValue(':dq', $quarto->getDescricao() , PDO::PARAM_STR);
                $query->bindValue(':sq', $quarto->getSituacao() , PDO::PARAM_STR);    
                $query->bindValue(':pq', $quarto->getPreco() , PDO::PARAM_STR);    

                 if(!$query->execute()){
                    print r($query->errorInfo());
                }
            }
            catch(PDOException $e){
                echo "Erro #4 " . $e-> getMessage();
               
            }
        }

        public function destroy($id){
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM quarto
                    WHERE id_quarto = :i"
                );

                $query->bindValue(':i', $id, PDO::PARAM_STR);

                 if(!$query->execute()){
                    print r($query->errorInfo());
                }
            }
            catch(PDOException $e){
                echo "Erro #5 " . $e-> getMessage();
               
            }
        }
     }
?>