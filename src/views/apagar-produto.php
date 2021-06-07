<?php

require '../controller/ProdutosController.php';
if (!$_GET) header('Location: ./produtos.php');

$produto = new ProdutosController();
$produto->setId($_GET['id']);

try {
    $produto->delete($produto->getId());
    header('Location: ./produtos.php');
} catch (PDOException $err) {
    echo '<script>
            alert("'.$err->getMessage().'");
            window.location.href = "./produtos.php";
          </script>';
}
