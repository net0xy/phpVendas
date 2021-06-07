<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body class="text-center">

    <div class="container">
        <h1 class="p-1 title">Vendas</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-outline-primary"><<<</a>
            <a href="./realizar-venda.php" class="btn btn-sm btn-outline-primary">Realizar venda</a>
        </div>
        <table class="table">
            <thead class="table-dark">
                <th>#</th>
                <th>Cliente</th>
                <th>Valor Total</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php

                    require_once '../controller/VendasController.php';
                    require_once '../controller/ClientesController.php';
                    $vendas = new VendasController();
                    $clientes = new ClientesController();

                    foreach ($vendas->findAll() as $venda) { ?>
                        <tr>
                            <td> <?= $venda->getIdVenda() ?> </td>
                            <td> <?= $clientes->findOne($venda->getIdCliente())->getNome() ?> </td>
                            <td>R$ <?= number_format($venda->getValorTotal(), 2, ',', '') ?> </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="./editar-venda.php?id=<?= $venda->getIdVenda() ?>" class="btn btn-outline-success">editar</a>
                                    <a href="#" class="btn btn-outline-primary">ver+</a>
                                    <button onclick="delVenda('<?= $venda->getIdVenda() ?>')" class="btn btn-outline-danger">apagar</button>
                                </div>
                            </td>
                        </tr> <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>

<script src="../../public/js/delVenda.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>