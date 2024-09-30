<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Virtual - Roupas Infantis</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>

    <header>
        <h1>Loja Virtual - Roupas Infantis</h1>
        <a href="carrinho.php">Carrinho</a>
    </header>

    <section class="produtos">
        <h2>Produtos</h2>
        <div class="container">
            <?php
            $sql = "SELECT * FROM produtos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="produto">
                        <img src="assets/img/camisa.jpg' . $row['imagem'] . '" alt="' . $row['nome'] . '">
                        <h3>' . $row['nome'] . '</h3>
                        <p>' . $row['descricao'] . '</p>
                        <p>R$ ' . $row['preco'] . '</p>
                        <a href="produtos.php?id=' . $row['id'] . '">Ver Detalhes</a>
                        <a href="add_ao_carrinho.php?id=' . $row['id'] . '" class="btn">Comprar</a>
                    </div>';
                }
            } else {
                echo "<p>Nenhum produto disponível.</p>";
            }
            ?>
        </div>
    </section>

</body>
</html>
