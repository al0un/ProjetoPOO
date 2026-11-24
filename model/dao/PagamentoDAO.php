<?php
    class PagamentoDAO {
        public function create($pagamento){
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO forma_pagamento(tipo_pagamento) VALUES (:tp) "
                );
                $query->bindValue(':tp', $pagamento->getTipopagamento() , PDO::PARAM_STR);

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
                $query = BD::getConexao()->prepare("SELECT * FROM forma_pagamento");
                if(!$query->execute()){
                    print r($query->errorInfo());
                }

                $listaPagamentos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha){
                    $pagamento = new Pagamento(); //Classe Bean

                    $pagamento->setIdpagamento($linha['id_pagamento']);
                    $pagamento->setTipopagamento($linha['tipo_pagamento']);

                    array_push($listaPagamentos, $pagamento);

                }

                return $listaPagamentos;
            }
            catch(PDOException $e){
                //ALterar para se encaixar com a classe Pagamento depois
                echo "Erro #2 " . $e-> getMessage();
               
            }
        }   
            
        public function find ($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM forma_pagamento WHERE id_pagamento = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute()){
                    print r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)){
                    $pagamento = new Pagamento(); //Classe Bean

                    $pagamento->setIdpagamento($linha['id_pagamento']);
                    $pagamento->setTipopagamento($linha['tipo_pagamento']);
                }

                return $pagamento;
            }
            catch(PDOException $e){
                echo "Erro #3 " . $e-> getMessage();
               
            }
        }


        public function update($pagamento){
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE forma_pagamento
                    SET tipo_pagamento = :tp
                    WHERE id_pagamento = :ip"
                );
                $query->bindValue(':tp', $pagamento->getTipopagamento() , PDO::PARAM_STR);   
                $query->bindValue(':ip', $pagamento->getIdpagamento()   , PDO::PARAM_STR);    

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
                    "DELETE FROM forma_pagamento
                    WHERE id_pagamento = :i"
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