<?php
    class ReservaDAO {
        public function create($reserva){
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO reserva(data_reserva, quantidade_horas, valor_total, id_cliente, id_quarto, id_pagamento) VALUES (:dr, :qh, :vt, :ic, :iq, :ip) "
                );
                $query->bindValue(':dr', $reserva->getDatareserva()     , PDO::PARAM_STR);
                $query->bindValue(':qh', $reserva->getQuantidadehoras() , PDO::PARAM_STR);
                $query->bindValue(':vt', $reserva->getValortotal()      , PDO::PARAM_STR);
                //Bind para a chave estrangeira
                $query->bindValue(':ic', $reserva->getCliente()-> getIdcliente(),   PDO::PARAM_INT);
                $query->bindValue(':iq', $reserva->getQuarto()-> getIdquarto(),     PDO::PARAM_INT);
                $query->bindValue(':ip', $reserva->getPagamento()-> getIdpagamento(), PDO::PARAM_INT);

                 if(!$query->execute()){
                    print r($query->errorInfo());
                }

                return BD::getConexao()->lastInsertId();
            }
            catch(PDOException $e){
                echo "Erro #1 " . $e-> getMessage();
               
            }
        }


        public function read () {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM reserva");
                if(!$query->execute()){
                    print r($query->errorInfo());
                }

                $listareservas = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha){
                    $reserva = new reserva(); //Classe Bean

                    $reserva->setIdreserva($linha['id_reserva']);
                    $reserva->setDatareserva($linha['data_reserva']);
                    $reserva->setQuantidadehoras($linha['quantidade_horas']);
                    $reserva->setValortotal($linha['valor_total']);

                    //Atributo da assossiação (com Cliente)
                    $daoCliente = new ClienteDAO();
                    $cliente = $daoCliente->find($linha['id_cliente']);
                    $reserva->setCliente($cliente);

                    //Atributo da assossiação (com Quarto)
                    $daoQuarto = new QuartoDAO();
                    $quarto = $daoQuarto->find($linha['id_quarto']);
                    $reserva->setQuarto($quarto);

                    //Atributo da assossiação (com Pagamento)
                    $daoPagamento = new PagamentoDAO();
                    $pagamento = $daoPagamento->find($linha['id_pagamento']);
                    $reserva->setPagamento($pagamento);

                    array_push($listareservas, $reserva);

                }

                return $listareservas;
            }
            catch(PDOException $e){
                echo "Erro #2 " . $e-> getMessage();
               
            }
        }

        public function find ($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM reserva WHERE id_reserva = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute()){
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $reserva = new Reserva(); //Classe Bean

                    $reserva->setIdreserva($linha['id_reserva']);
                    $reserva->setDatareserva($linha['data_reserva']);
                    $reserva->setQuantidadehoras($linha['quantidade_horas']);
                    $reserva->setValortotal($linha['valor_total']);

                    //Atributo da assossiação (com Cliente)
                    $daoCliente = new ClienteDAO();
                    $cliente = $daoCliente->find($linha['id_cliente']);
                    $reserva->setCliente($cliente);

                    //Atributo da assossiação (com Quarto)
                    $daoQuarto = new QuartoDAO();
                    $quarto = $daoQuarto->find($linha['id_quarto']);
                    $reserva->setQuarto($quarto);

                    //Atributo da assossiação (com Pagamento)
                    $daoPagamento = new PagamentoDAO();
                    $pagamento = $daoPagamento->find($linha['id_pagamento']);
                    $reserva->setPagamento($pagamento);

                }

                return $reserva;
            }
            catch(PDOException $e){
                echo "Erro #2 " . $e-> getMessage();
               
            }
        }

        public function update($reserva){
            try {
                 $query = BD::getConexao()->prepare(
                    "UPDATE reserva
                    SET data_reserva = :dr, quantidade_horas = :qh, valor_total = :vt, id_cliente = :ic, id_quarto = :iq, id_pagamento = :ip
                    WHERE id_reserva = :i"
                );
                $query->bindValue(':dr', $reserva->getDatareserva() ,     PDO::PARAM_STR);
                $query->bindValue(':qh', $reserva->getQuantidadehoras() , PDO::PARAM_STR);
                $query->bindValue(':vt', $reserva->getValortotal() ,      PDO::PARAM_STR);
                //Bind para a chave estrangeira
                $query->bindValue(':ic', $reserva->getCliente()-> getIdcliente(),     PDO::PARAM_INT);
                $query->bindValue(':iq', $reserva->getQuarto()-> getIdquarto(),       PDO::PARAM_INT);
                $query->bindValue(':ip', $reserva->getPagamento()-> getIdpagamento(), PDO::PARAM_INT);
                $query->bindValue(':i', $reserva->getIdreserva(), PDO::PARAM_INT);

                 if(!$query->execute()){
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e){
                echo "Erro #1 " . $e-> getMessage();
               
            }
        }

        public function destroy($id){
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM reserva
                    WHERE id_reserva = :i"
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