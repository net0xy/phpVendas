<?php

require_once '../controller/VendasController.php';
if (!$_GET) header('Location: ./vendas.php');

$venda = new VendasController();
$venda->setIdVenda($_GET['id']);

try {
    $venda->delete($venda->getIdVenda());
    header('Location: ./vendas.php');
} catch (PDOException $err) {
    echo '<script>
            alert("'.$err->getMessage().'");
            window.location.href = "./vendas.php";
          </script>';
}
