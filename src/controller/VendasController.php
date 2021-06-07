<?php

require_once '../model/Venda.php';
require_once '../model/Database.php';

class VendasController extends Venda
{
    protected $tabela = 'vendas';

    public function __construct()
    {
    }

    //busca uma venda
    public function findOne($idVenda)
    {
        $query = "SELECT * FROM $this->tabela WHERE idVenda = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idVenda, PDO::PARAM_INT);
        $stm->execute();
        $venda = new Venda(null, null, null);

        foreach ($stm->fetchAll() as $ven) {
            $venda->setIdVenda($ven->idVenda);
            $venda->setIdCliente($ven->idCliente);
            $venda->setValorTotal($ven->valorTotal);
        }
        return $venda;
    }

    //buscar todas as vendas
    public function findAll()
    {
        $query = "SELECT * FROM $this->tabela";
        $stm = Database::prepare($query);
        $stm->execute();
        $vendas = array();

        foreach ($stm->fetchAll() as $venda) {
            array_push(
                $vendas,
                new Venda($venda->idVenda, $venda->idCliente, $venda->valorTotal)
            );
        }
        return $vendas;
    }

    // inserir uma venda
    public function insert($idCliente, $valorTotal)
    {
        $query = "INSERT INTO $this->tabela (idCliente, valorTotal) VALUES (:idCliente, :valorTotal)";
        $stm = Database::prepare($query);
        $stm->bindParam(':idCliente', $idCliente);
        $stm->bindParam(':valorTotal', $valorTotal);
        return $stm->execute();
    }

    //busca um id de uma venda
    public function findIdVenda($idCliente)
    {
        $idVenda = null;
        $query = "SELECT idVenda FROM $this->tabela WHERE idCliente = :id AND valorTotal = 0";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idCliente, PDO::PARAM_INT);
        $stm->execute();

        foreach ($stm->fetchAll() as $venda) {
            $idVenda = $venda->idVenda;
        }
        return $idVenda;
    }

    //deleta uma venda
    public function delete($idVenda)
    {
        $query = "DELETE FROM $this->tabela WHERE idVenda = :id";
        //$query = "UPDATE $this->tabela SET ativo = false WHERE idVenda = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idVenda, PDO::PARAM_INT);
        return $stm->execute();
    }

}