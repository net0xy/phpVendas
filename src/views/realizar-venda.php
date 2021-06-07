<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar venda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body>
    <div class="container">
        <h1 class="p-1 title">Realizar Venda</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-outline-primary"><<<</a>
            <button id="add-item" class="btn btn-sm btn-outline-primary">Novo produto</button>
        </div>
        <form class='form' id="form" action="./finalizar-venda.php" method="POST">
            <?php

                require_once '../controller/ClientesController.php';
                require_once '../controller/ProdutosController.php';
                $clientes = new ClientesController();
                $produtos = new ProdutosController();

            ?>
            <div class="mb-3">
                <label for="id-cliente" class="form-label">Selecionar Cliente</label>
                <select name="id-cliente" class="form-select" id="id-cliente" required>
                    <option value="" selected disabled>Selecione um cliente</option>
                    <?php
                        foreach ($clientes->findAll() as $cliente) { ?>
                            <option value="<?= $cliente->getIdCliente() ?>"><?= $cliente->getNome() ?></option> <?php
                        }
                    ?>
                </select>
            </div>
            <div id="area-produto">
                <div class="mb-3 d-flex justify-content-between" id="produto-specs" >
                    <div class="input">
                        <label for="id-produto[]" class="form-label">Selecionar Produto</label>
                        <select name="id-produto[]" class="form-select" id="id-produto" required>
                            <option value="" selected disabled>Selecione um produto</option>
                                <?php
                                    foreach ($produtos->findAll() as $produto) { ?>
                                        <option value="<?= $produto->getId() ?>"><?= $produto->getNome() ?></option> <?php
                                    }
                                ?>
                        </select>
                    </div>
                    <div class="input" style="width: 25% !important;">
                        <label for="quantidade[]" class="form-label">Quantidade</label>
                        <input type="number" step="any" min="1" name="quantidade[]" class="form-control" id="quantidade" required>
                    </div>
                    <div class="input" style="width: 25% !important;">
                        <label for="valor" class="form-label">Valor Unidade</label>
                        <input type="number" name="valor" class="form-control" id="valor" disabled>
                    </div>
                </div>
            </div>
            <div class="button">
                <div class="valor-total">
                    <label for="valor" class="form-label">Valor Total da Venda</label>
                    <input type="number" name="valor" class="form-control" id="valor" disabled>
                </div>
                <button type="submit" class="btn btn-lg btn-success mt-3">Finalizar Venda</button>
            </div>
        </form>
    </div>
</body>

<script src="../../public/js/addCampo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>