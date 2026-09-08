<?php
    class ClienteDAO {
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
                //ALterar para se encaixar com a classe cliente depois
                echo "Erro #2 " . $e-> getMessage();
               
            }
     }
    }
?>