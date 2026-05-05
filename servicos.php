class Servicos {
    private float $preco;
    private string $tipoServico;

    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function getTipoServico() {
        return $this->tipoServico;
    }

    public function setTipoServico($tipo) {
        $this->tipoServico = $tipo;
    }
}