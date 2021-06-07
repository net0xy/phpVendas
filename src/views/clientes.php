<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body class="text-center">

    <div class="container">
        <h1 class="p-1 title">Clientes</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-outline-primary"><<<</a>
            <a href="./cadastrar-cliente.php" class="btn btn-sm btn-outline-primary">Cadastrar cliente</a>
        </div>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nome Completo</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            <?php

                require '../controller/ClientesController.php';
                $clientes = new ClientesController();

                foreach ($clientes->findAll() as $cliente) { ?>
                    <tr>
                        <td> <?= $cliente->getIdCliente() ?> </td>
                        <td> <?= $cliente->getNome() ?> </td>
                        <td> <?= $cliente->getCpf() ?> </td>
                        <td> <?= $cliente->getTelefone() ?> </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="./editar-cliente.php?id=<?= $cliente->getIdCliente() ?>" class="btn btn-outline-success">editar</a>
                                <button onclick="delCliente('<?= $cliente->getIdCliente() ?>', '<?= $cliente->getNome() ?>')" class="btn btn-outline-danger">apagar</button>
                            </div>
                        </td>
                    </tr> <?php
                }
            ?>
            </tbody>
        </table>
    </div>

</body>

<script src="../../public/js/delCliente.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>