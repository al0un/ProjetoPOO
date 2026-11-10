<?php
    class CarroDAO {
        public function create($carro){
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO carro(placa, modelo, cor, id_cliente) VALUES (:p, :m, :c, :ic) "
                );
                $query->bindValue(':p', $carro->getPlaca() , PDO::PARAM_STR);
                $query->bindValue(':m', $carro->getModelo() , PDO::PARAM_STR);
                $query->bindValue(':c', $carro->getCor() , PDO::PARAM_STR);
                //Bind para a chave estrangeira
                $query->bindValue(':ic', $carro->getCliente()-> getIdcliente(), PDO::PARAM_INT);

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
                $query = BD::getConexao()->prepare("SELECT * FROM carro");
                if(!$query->execute()){
                    print r($query->errorInfo());
                }

                $listacarros = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha){
                    $carro = new Carro(); //Classe Bean

                    $carro->setIdcarro($linha['id_carro']);
                    $carro->setPlaca($linha['placa']);
                    $carro->setModelo($linha['modelo']);
                    $carro->setCor($linha['cor']);
                    //Atributo da assossiação (com Cliente)
                    $daoCliente = new ClienteDAO();
                    $cliente = $daoCliente->find($linha['id_cliente']);
                    $carro->setCliente($cliente);

                    array_push($listacarros, $carro);

                }

                return $listacarros;
            }
            catch(PDOException $e){
                echo "Erro #2 " . $e-> getMessage();
               
            }
        }

        public function find ($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM carro WHERE idCarro = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute()){
                    print r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $carro = new Carro(); //Classe Bean

                    $carro->setIdcarro($linha['id_carro']);
                    $carro->setPlaca($linha['placa']);
                    $carro->setModelo($linha['modelo']);
                    $carro->setCor($linha['cor']);
                    //Atributo da assossiação (com Cliente)
                    $daoCliente = new ClienteDAO();
                    $cliente = $daoCliente->find($linha['id_cliente']);
                    $carro->setCliente($cliente);
                }

                return $carro;
            }
            catch(PDOException $e){
                echo "Erro #3 " . $e-> getMessage();
               
            }
        }

        public function update($carro){
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE carro
                    SET placa = :p, modelo = :m, cor = :c, id_cliente =:ic
                    WHERE idCarro= :i"
                );
                $query->bindValue(':p', $carro->getPlaca() , PDO::PARAM_STR);
                $query->bindValue(':m', $carro->getModelo() , PDO::PARAM_STR);
                $query->bindValue(':c', $carro->getCor() , PDO::PARAM_STR);
                //Bind para a chave estrangeira
                $query->bindValue(':ic', $carro->getCliente()-> getIdcliente(), PDO::PARAM_INT);

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
                    "DELETE FROM carro
                    WHERE idCarro = :i"
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