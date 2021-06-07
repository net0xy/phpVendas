<?php

require_once '../model/Produto.php';
require_once '../model/Database.php';

class ProdutosController extends Produto
{
    protected $tabela = 'produtos';

    public function __construct()
    {
    }

    //busca um produto
    public function findOne($idProduto)
    {
        //$query = "SELECT * FROM $this->tabela WHERE idProduto = :id";
        $query = "SELECT * FROM $this->tabela WHERE idProduto = :id AND ativo = true";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idProduto, PDO::PARAM_INT);
        $stm->execute();
        $produto = new Produto(null, null, null, null);

        foreach ($stm->fetchAll() as $pr) {
            $produto->setId($pr->idProduto);
            $produto->setNome($pr->nome);
            $produto->setPreco($pr->valor);
            $produto->setQuantidade($pr->quantidade);
        }
        return $produto;
    }

    //buscar todos os produtos
    public function findAll()
    {
        //$query = "SELECT * FROM $this->tabela";
        $query = "SELECT * FROM $this->tabela WHERE ativo = true";
        $stm = Database::prepare($query);
        $stm->execute();
        $produtos = array();

        foreach ($stm->fetchAll() as $produto) {
            $produtos[] = new Produto($produto->idProduto, $produto->nome, $produto->valor, $produto->quantidade);
        }
        return $produtos;
    }

    //deleta um produto
    public function delete($idProduto)
    {
        //$query = "DELETE FROM $this->tabela WHERE idProduto = :id";
        $query = "UPDATE $this->tabela SET ativo = false WHERE idProduto = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idProduto, PDO::PARAM_INT);
        return $stm->execute();
    }

    //update de produto
    public function update($idProduto)
    {
        $nome = $this->getNome();
        $preco = $this->getPreco();
        $quantidade = $this->getQuantidade();
        $query = "UPDATE $this->tabela SET nome = :nome, valor = :valor, quantidade = :quantidade WHERE idProduto = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idProduto, PDO::PARAM_INT);
        $stm->bindParam(':nome', $nome);
        $stm->bindParam(':valor', $preco);
        $stm->bindParam(':quantidade', $quantidade);
        return $stm->execute();
    }

    // inserir um produto
    public function insert($nome, $preco, $quantidade)
    {
        $query = "INSERT INTO $this->tabela (nome, valor, quantidade) VALUES (:nome, :valor, :quantidade)";
        $stm = Database::prepare($query);
        $stm->bindParam(':nome', $nome);
        $stm->bindParam(':valor', $preco);
        $stm->bindParam(':quantidade', $quantidade);
        return $stm->execute();
    }
}
