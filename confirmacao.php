<?php
session_start();

// Verifica se há um pedido na sessão
if (isset($_SESSION['pedido'])) {
    $pedido = $_SESSION['pedido'];
} else {
    // Redireciona para a página inicial se não houver pedido
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação do Pedido</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>

    <header>
        <h1>Pedido Confirmado</h1>
        <a href="index.php">Voltar para a Loja</a>
    </header>

    <section class="confirmacao">
        <h2>Obrigado pelo seu pedido, <?php echo htmlspecialchars($pedido['nome']); ?>!</h2>
        <p>Seu pedido foi recebido e será enviado para:</p>
        <p><strong>Endereço:</strong> <?php echo htmlspecialchars($pedido['endereco']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($pedido['email']); ?></p>
        <p><strong>Telefone:</strong> <?php echo htmlspecialchars($pedido['telefone']); ?></p>
    </section>

</body>
</html>
