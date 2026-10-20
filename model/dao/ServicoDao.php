<?php
    class ServicoDAO {
        public function create($servico){
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO servico(tipo_servico, preco) VALUES (:tp, :p) "
                );
                $query->bindValue(':tp', $servico->getNome() , PDO::PARAM_STR);
                $query->bindValue(':p', $servico->getPreco() , PDO::PARAM_STR);

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


        public function find ($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM servico WHERE id_servico = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute()){
                    print r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)){
                    $quarto = new Servico(); //Classe Bean

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
    }
?>