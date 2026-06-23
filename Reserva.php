<?php
    class Reserva {
        private Cliente $cliente;
        private Quarto $quarto;
        private array $servicos = []; // array de Servicos
        private int $quantidadeHoras;
        private string $dia;


        public function getCliente() {
            return $this->cliente;
        }

        public function setCliente(Cliente $cliente) {
            $this->cliente = $cliente;
        }

        public function getQuantidadeHoras() {
            return $this->quantidadeHoras;
        }

        public function setQuantidadeHoras(int $quantidadeHoras) {
            $this->quantidadeHoras = $quantidadeHoras;
        }

        public function getDia() {
            return $this->dia;
        }

        public function setDia($dia) {
            $data = new DateTime($dia);
            $this->dia = $data->format('d/m/Y');
        }

        public function getQuarto() {
            return $this->quarto;
        }

        public function setQuarto(Quarto $quarto) {
            $this->quarto = $quarto;
        }

        public function getServicos() {
            return $this->servicos;
        }

        public function adicionarServico(Servico $servico) {
            $this->servicos[] = $servico;
        }

        public function calcularTotalServicos() {
            $total = 0;
            foreach($this->servicos as $servico) {
                $total += $servico->getPreco();
            }
            return $total;
        }

        public function calcularTotalQuarto() {
            return $this->quarto->getPrecoQuarto()
                * $this->quantidadeHoras;
        }

        public function calcularPrecoReserva() {
            return $this->calcularTotalQuarto()
                + $this->calcularTotalServicos();
        }
    } 
?>