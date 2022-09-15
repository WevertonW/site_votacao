<?php

class usuario
{
    private $id;
    private $nome;
    private $cpf;
    private $idade;
    private $voto;
    public $erro = [];

    public function __construct($nome, $cpf, $idade, $voto)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->idade = $idade;
        $this->voto = $voto;
    }

    public function getid()
    {
        return $this->id;
    }

    public function setid($id)
    {
        $this->id = $id;
    }

    public function getnome()
    {
        return $this->nome;
    }

    public function setnome($nome)
    {
        $this->nome = $nome;
    }

    public function getcpf()
    {
        return $this->cpf;
    }

    public function setcpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getidade()
    {
        return $this->idade;
    }

    public function setidade($idade)
    {
        $this->idade = $idade;
    }

    public function getvoto()
    {
        return $this->voto;
    }

    public function setvoto($voto)
    {
        $this->voto = $voto;
    }

    public function getmsg()
    {
        return $this->msg;
    }

    public function geterro()
    {
        return $this->erro;
    }

    public function seterro($erro)
    {
        return $this->erro = $erro;
    }

    public function validarDados()
    {
        if (empty($this->nome)) {
            $this->erro["erro_nome"] = "O campo nome está vazio!";
        }

        $this->cpf = str_replace("-", "", $this->cpf);
        $this->cpf = str_replace(".", "", $this->cpf);
        if (!is_numeric($this->cpf)) {
            $this->erro["erro_cpf"] = "O CPF deve ser um número";
        }

        if ($this->idade < 16 || $this->idade > 100 || !is_numeric($this->idade)) {
            $this->erro["erro_idade"] = "Idade inválida!";
        }

        if (empty($this->voto)) {
            $this->erro["erro_voto"] = "Escolha um dos candidatos !! ";
        }
    }
}
