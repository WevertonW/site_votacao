<?php
require_once('app/Models/Usuario.php');
require_once('app/Controllers/ControllerUsuario.php');

$usuarioDao = new ControllerUsuario();
if (!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['idade'])  && !empty($_POST['voto'])) {
    $usuario = new Usuario($_POST['nome'], $_POST['cpf'], $_POST['idade'], $_POST['voto']);

    $usuario->validarDados();
    $usuarioDao->createUsuario($usuario);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votacao</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-primary p-5">
    <div class="container border border-2 rounded-4 p-4 shadow bg-white mb-5" style="max-width: 350px;">
        <form method="post">
            <h1 class="mb-4 text-center">Votação</h1>
            <div>

                <div class="mb-2 px-3">
                    <label for="nome" class="form-label">Nome do Eleitor</label>
                    <input type="text" name="nome" class="form-control form-control-lg bg-light" value="" required>
                </div>

                <div class="mb-2 px-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" name="cpf" class="form-control form-control-lg bg-light" value="" required>
                </div>


                <div class="mb-2 px-3">
                    <label for="idade" class="form-label">Idade</label>
                    <input type="text" name="idade" class="form-control form-control-lg bg-light mb-4" value="" required>
                </div>

                <div class="mb-2 form-check d-flex align-items-center">
                    <img src="imagens/billgates.jfif" width="80px">
                    <input type="radio" name="voto" id="bill" class="form-check-input" value="BillGates" style="margin: 0 10px;">
                    <label for="bill" class="form-check-label">
                        Bill Gates
                    </label>
                </div>

                <div class="mb-3 form-check d-flex align-items-center">
                    <img src="imagens/markzuckerberg.jfif" width="80px">
                    <input type="radio" name="voto" id="mark" class="form-check-input" value="MarkZuckerberg" style="margin: 0 10px;">
                    <label for="mark" class="form-check-label">
                        Mark Zuckerberg
                    </label>
                </div>

            </div>
            <div class="d-grid mb-4 px-3">
                <input type="submit" value="Votar" class="btn btn-primary btn-lg">
            </div>
            <?php if (isset($usuario) && empty($usuario->erro)) ?>
            <div class="d-grid mb-4 px-3">
                <a class="btn btn-primary btn-lg" href="relatorio.php" target="_blank" style="max-width:100% ;">Relátorio</a>
            </div>
        </form>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>