class Carro {
    private string $placa;
    private string $modelo;
    private string $cor;

    public function getPlaca() {
        return $this->placa;
    }

    public function setPlaca($placa) {
        $this->placa = $placa;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function getCor() {
        return $this->cor;
    }

    public function setCor($cor) {
        $this->cor = $cor;
    }
}