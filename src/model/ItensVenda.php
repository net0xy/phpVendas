<?php

class ItensVenda
{

    private $idItensVenda;
    private $idVenda;
    private $idProduto;
    private $quantidade;
    private $valorUnitario;
    
    public function __construct($idItensVenda, $idVenda, $idProduto, $quantidade, $valorUnitario)
    {
        $this->idItensVenda = $idItensVenda;
        $this->idVenda = $idVenda;
        $this->idProduto = $idProduto;
        $this->quantidade = $quantidade;
        $this->valorUnitario = $valorUnitario;
    }

    public function getIdItensVenda()
    {
        return $this->idItensVenda;
    }

    public function setIdItensVenda($idItensVenda)
    {
        $this->idItensVenda = $idItensVenda;
    }

    public function getIdVenda()
    {
        return $this->idVenda;
    }

    public function setIdVenda($idVenda)
    {
        $this->idVenda = $idVenda;
    }

    public function getIdProduto()
    {
        return $this->idProduto;
    }

    public function setIdProduto($idProduto)
    {
        $this->idProduto = $idProduto;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getValorUnitario()
    {
        return $this->valorUnitario;
    }

    public function setValorUnitario($valorUnitario)
    {
        $this->valorUnitario = $valorUnitario;
    }

}