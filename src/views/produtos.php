<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body class="text-center">

    <div class="container">
        <h1 class="p-1 title">Produtos</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-outline-primary"><<<</a>
            <a href="./cadastrar-produto.php" class="btn btn-sm btn-outline-primary">Cadastrar produto</a>
        </div>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            <?php

                require_once '../controller/ProdutosController.php';
                $produtos = new ProdutosController();

                foreach ($produtos->findAll() as $produto) { ?>
                    <tr>
                        <td> <?= $produto->getId() ?> </td>
                        <td> <?= $produto->getNome() ?> </td>
                        <td>R$ <?= number_format($produto->getPreco(), 2, ',', '') ?> </td> 
                        <td> <?= $produto->getQuantidade() ?> </td> 
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="editar-produto.php?id=<?= $produto->getId() ?>" class="btn btn-outline-success">editar</a>
                                <button onclick="delProduto('<?= $produto->getId() ?>', '<?= $produto->getNome() ?>')" class="btn btn-outline-danger">apagar</button>
                            </div>
                        </td> 
                    </tr> <?php
                }
            ?>
            </tbody>
        </table>
    </div>

</body>

<script src="../../public/js/delProduto.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>