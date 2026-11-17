<?php
    class FormaPagamentoDAO {
        public function create($formaPagamento){
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO forma_pagamento(tipo_pagamento) VALUES (:tp) "
                );
                $query->bindValue(':tp', $formaPagamento->getTipoPagamento() , PDO::PARAM_STR);
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

                $listaFormaPagamentos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha){
                    $formaPagamento = new FormaPagamento(); //Classe Bean

                    $formaPagamento->setIdFormaPagamento($linha['id_pagamento']);
                    $formaPagamento->setTipoPagamento($linha['tipo_pagamento']);

                    array_push($listaFormaPagamentos, $formaPagamento);

                }

                return $listaFormaPagamentos;
            }
            catch(PDOException $e){
                //ALterar para se encaixar com a classe Quarto depois
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
                    $formaPagamento = new FormaPagamento(); //Classe Bean

                    $formaPagamento->setIdFormaPagamento($linha['id_pagamento']);
                    $formaPagamento->setTipoPagamento($linha['tipo_pagamento']);

                }

                return $formaPagamento;
            }
            catch(PDOException $e){
                echo "Erro #3 " . $e-> getMessage();
               
            }
        }


        public function update($formaPagamento){
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE forma_pagamento
                    SET tipo_pagamento = :tp
                    WHERE id_pagamento = :i"
                );
                $query->bindValue(':tp', $formaPagamento->getTipoPagamento()    , PDO::PARAM_STR);
                $query->bindValue(':i',  $formaPagamento->getIdFormaPagamento() , PDO::PARAM_STR);    

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