<?php

require_once '../model/Cliente.php';
require_once '../model/Database.php';

class ClientesController extends Cliente
{
    protected $tabela = 'clientes';

    public function __construct()
    {
    }

    //busca um cliente
    public function findOne($idCliente)
    {
        //$query = "SELECT * FROM $this->tabela WHERE idCliente = :id";
        $query = "SELECT * FROM $this->tabela WHERE idCliente = :id AND ativo = true";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idCliente, PDO::PARAM_INT);
        $stm->execute();
        $cliente = new Cliente(null, null, null, null);

        foreach ($stm->fetchAll() as $cl) {
            $cliente->setIdCliente($cl->idCliente);
            $cliente->setNome($cl->nome);
            $cliente->setCpf($cl->cpf);
            $cliente->setTelefone($cl->telefone);
        }
        return $cliente;
    }

    //buscar todos os clientes
    public function findAll()
    {
        //$query = "SELECT * FROM $this->tabela";
        $query = "SELECT * FROM $this->tabela WHERE ativo = true";
        $stm = Database::prepare($query);
        $stm->execute();
        $clientes = array();

        foreach ($stm->fetchAll() as $cliente) {
            $clientes[] = new cliente($cliente->idCliente, $cliente->nome, $cliente->cpf, $cliente->telefone);
        }
        return $clientes;
    }

    //deleta um cliente
    public function delete($idCliente)
    {
        //$query = "DELETE FROM $this->tabela WHERE idCliente = :id";
        $query = "UPDATE $this->tabela SET ativo = false WHERE idCliente = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idCliente, PDO::PARAM_INT);
        return $stm->execute();
    }

    //update de cliente
    public function update($idCliente)
    {
        $cpf = $this->getCpf();
        $telefone = $this->getTelefone();
        $query = "UPDATE $this->tabela SET nome = :nome, cpf = :cpf, telefone = :telefone WHERE idCliente = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idCliente, PDO::PARAM_INT);
        $stm->bindParam(':nome', $this->getNome());
        $stm->bindParam(':cpf', $cpf);
        $stm->bindParam(':telefone', $telefone);
        return $stm->execute();
    }

    // inserir um cliente
    public function insert($nome, $cpf, $telefone)
    {
        $query = "INSERT INTO $this->tabela (nome, cpf, telefone) VALUES (:nome, :cpf, :telefone)";
        $stm = Database::prepare($query);
        $stm->bindParam(':nome', $nome);
        $stm->bindParam(':cpf', $cpf);
        $stm->bindParam(':telefone', $telefone);
        return $stm->execute();
    }

}
