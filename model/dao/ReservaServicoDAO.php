<?php
    class ReservaServicoDAO {
        public function create($idReserva, $idServico, $quantidade){
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO reserva_servico(id_reserva, id_servico, quantidade) VALUES (:ir, :is, :q)"
                );
                $query->bindValue(':ir', $idReserva,  PDO::PARAM_INT);
                $query->bindValue(':is', $idServico,  PDO::PARAM_INT);
                $query->bindValue(':q',  $quantidade, PDO::PARAM_INT);

                if(!$query->execute()){
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e){
                echo "Erro #10 " . $e->getMessage();
            }
        }

        // Linhas com nome/preço do serviço (usado no index)
        public function readByReserva($idReserva){
            try {
                $query = BD::getConexao()->prepare(
                    "SELECT s.id_servico, s.tipo_servico, s.preco, rs.quantidade
                     FROM reserva_servico rs
                     INNER JOIN servico s ON s.id_servico = rs.id_servico
                     WHERE rs.id_reserva = :i"
                );
                $query->bindValue(':i', $idReserva, PDO::PARAM_INT);
                $query->execute();
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(PDOException $e){
                echo "Erro #11 " . $e->getMessage();
                return [];
            }
        }

        // [id_servico => quantidade] (usado no edit)
        public function quantidadesPorReserva($idReserva){
            $mapa = [];
            foreach ($this->readByReserva($idReserva) as $linha) {
                $mapa[$linha['id_servico']] = $linha['quantidade'];
            }
            return $mapa;
        }

        public function destroyByReserva($idReserva){
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM reserva_servico WHERE id_reserva = :i"
                );
                $query->bindValue(':i', $idReserva, PDO::PARAM_INT);
                $query->execute();
            }
            catch(PDOException $e){
                echo "Erro #12 " . $e->getMessage();
            }
        }
    }
?>