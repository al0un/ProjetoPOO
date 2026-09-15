<?php
    class ClienteDAO {
        public function create($cliente){
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO cliente(nome, telefone) VALUES (:n, :t) "
                );
                $query->bindValue(':n', $cliente->getNome() , PDO::PARAM_STR);
                $query->bindValue(':t', $cliente->getTelefone() , PDO::PARAM_STR);

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
                $query = BD::getConexao()->prepare("SELECT * FROM cliente");
                if(!$query->execute()){
                    print r($query->errorInfo());
                }

                $listaClientes = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha){
                    $cliente = new Cliente(); //Classe Bean

                    $cliente->setIdcliente($linha['id_cliente']);
                    $cliente->setNome($linha['nome']);
                    $cliente->setTelefone($linha['telefone']);

                    array_push($listaClientes, $cliente);

                }

                return $listaClientes;
            }
            catch(PDOException $e){
                echo "Erro #2 " . $e-> getMessage();
               
            }
     }
    }
?>