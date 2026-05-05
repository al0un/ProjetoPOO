class Quarto {
    private string $nomeQuarto;
    private string $descricao;
    private string $situacao;
    private float $precoQuarto;

    public function getNomeQuarto() {
        return $this->nomeQuarto;
    }

    public function setNomeQuarto($nome) {
        $this->nomeQuarto = $nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    public function getPrecoQuarto() {
        return $this->precoQuarto;
    }

    public function setPrecoQuarto($preco) {
        $this->precoQuarto = $preco;
    }
}