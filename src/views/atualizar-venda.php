<?php

if(!$_GET || !$_POST) header('Location: ./vendas.php');

require_once '../controller/ProdutosController.php';
require_once '../controller/ItensVendaController.php';

$produto = new ProdutosController();
$itensVenda = new ItensVendaController();

$idCliente = intval($_POST['id-cliente']);
$idProdutoArray = $_POST['id-produto'];
$quantidadeArray = $_POST['quantidade'];
$idVenda = $_GET['id'];
$valorArray = array();

foreach ($idProdutoArray as $idProduto) {
    array_push($valorArray, $produto->findOne($idProduto)->getPreco());
}

$itensVenda->setIdVenda($idVenda);
$itensVenda->setIdProduto($idProdutoArray);
$itensVenda->setQuantidade($quantidadeArray);
$itensVenda->setValorUnitario($valorArray);

try {

    $itensVenda->delete($itensVenda->getIdVenda());

    for ($i = 0; $i < count($idProdutoArray); $i++) { 
        $itensVenda->insert(
            $itensVenda->getIdVenda(), 
            $itensVenda->getIdProduto()[$i], 
            $itensVenda->getQuantidade()[$i], 
            $itensVenda->getValorUnitario()[$i]
        );
    }

    header('Location: ./vendas.php');

} catch (PDOException $err) {
    echo '<script>
            alert("'.$err->getMessage().'");
            window.location.href = "./vendas.php";
          </script>';
}

