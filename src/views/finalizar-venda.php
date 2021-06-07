<?php

require_once '../controller/ProdutosController.php';
require_once '../controller/VendasController.php';
require_once '../controller/ItensVendaController.php';

$idCliente = intval($_POST['id-cliente']);
$idProdutos = $_POST['id-produto'];
$quantidades = $_POST['quantidade'];
$valores = array();

$produto = new ProdutosController();
$venda = new VendasController();
$itensVenda = new ItensVendaController();

foreach ($idProdutos as $idProduto) {
    array_push($valores, $produto->findOne($idProduto)->getPreco());
}

try {
    $venda->insert($idCliente, 0);
    $venda->setIdCliente($idCliente);
    $venda->setIdVenda($venda->findIdVenda($idCliente));
    $itensVenda->setIdVenda($venda->getIdVenda());

    for ($i = 0; $i < count($idProdutos); $i++) { 
        $itensVenda->insert($venda->getIdVenda(), $idProdutos[$i], $quantidades[$i], $valores[$i]);
    }
    header('Location: ./vendas.php');

} catch (PDOException $err) {
    echo '<script>
            alert("'.$err->getMessage().'");
            window.location.href = "./vendas.php";
          </script>';
}

