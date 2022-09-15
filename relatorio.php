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
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css"/>
    <title>Relatório</title>
</head>

<body>
    <?php if ($usuarioDao->readUsuario()) { ?>
        <div class="container p-5">
            <h1>Relatório</h1>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nome Completo</th>
                        <th>CPF</th>
                        <th>Idade</th>
                        <th>Voto</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($usuarioDao->readUsuario() as $usuario) { ?>
                        <tr>
                            <td> <?php echo $usuario["nome"]; ?></td>
                            <td> <?php echo $usuario["cpf"]; ?></td>
                            <td> <?php echo $usuario["idade"]; ?></td>
                            <td> <?php echo $usuario["voto"]; ?></td>
                            <td> <?php echo date('d/m/Y', strtotime($usuario["data"])); ?></td>
                        <?php } ?>
                        </tr>
                </tbody>
            </table>
        </div>
    <?php } ?>
</body>

</html>