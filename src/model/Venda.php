<?php

class Venda
{

    private $idVenda;
    private $idCliente;
    private $valorTotal;
    
    public function __construct($idVenda, $idCliente, $valorTotal)
    {
        $this->idVenda = $idVenda;
        $this->idCliente = $idCliente;
        $this->valorTotal = $valorTotal;
    }

    public function getIdVenda()
    {
        return $this->idVenda;
    }

    public function setIdVenda($idVenda)
    {
        $this->idVenda = $idVenda;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }

    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
    }

}