<?php

class Cliente
{

    private $idCliente;
    private $nome;
    private $cpf;
    private $telefone;

    public function __construct($idCliente, $nome, $cpf, $telefone)
    {
        $this->idCliente = $idCliente;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

}