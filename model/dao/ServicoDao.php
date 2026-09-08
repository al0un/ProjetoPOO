<?php
    class ServicoDAO {
        public function read () {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM servico");
                if(!$query->execute()){
                    print r($query->errorInfo());
                }

                $listaServicos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha){
                    $servico = new Servico(); //Classe Bean

                    $servico->setIdservico($linha['id_servico']);
                    $servico->setTiposervico($linha['tipo_servico']);
                    $servico->setPreco($linha['preco']);

                    array_push($listaServicos, $servico);

                }

                return $listaServicos;
            }
            catch(PDOException $e){
                //ALterar para se encaixar com a classe servico depois
                echo "Erro #2 " . $e-> getMessage();
               
            }
     }
    }
?>