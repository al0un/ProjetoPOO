class Reserva {
    private Cliente $cliente;
    private string $horario;
    private string $dia;
    private Quarto $quarto;
    private array $servicos = []; // array de Servicos

    public function getCliente() {
        return $this->cliente;
    }

    public function setCliente(Cliente $cliente) {
        $this->cliente = $cliente;
    }

    public function getHorario() {
        return $this->horario;
    }

    public function setHorario($horario) {
        $this->horario = $horario;
    }

    public function getDia() {
        return $this->dia;
    }

    public function setDia($dia) {
        $this->dia = $dia;
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

    public function adicionarServico(Servicos $servico) {
        $this->servicos[] = $servico;
    }

    public function calcularPrecoReserva() {
        $total = $this->quarto->getPrecoQuarto();

        foreach ($this->servicos as $servico) {
            $total += $servico->getPreco();
        }

        return $total;
    }
}