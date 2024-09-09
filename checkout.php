<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Loja Virtual</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header>
        <h1>Finalizar Compra</h1>
        <a href="index.php">Voltar para a Loja</a>
    </header>

    <section class="checkout">
        <form action="submit_order.php" method="post">
            <div class="form-group">
                <label for="nome">Nome Completo</label>
                <input type="text" name="nome" id="nome" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="tel" name="telefone" id="telefone" required>
            </div>
            <button type="submit" class="btn">Finalizar Pedido</button>
        </form>
    </section>

</body>
</html>
