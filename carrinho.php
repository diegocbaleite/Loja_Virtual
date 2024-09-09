<?php
session_start();
include 'config.php';

$carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : array();
$total = 0;

// Verifica se a solicitação é para remover um item
if (isset($_GET['remove'])) {
    $id = intval($_GET['remove']);
    if (isset($carrinho[$id])) {
        unset($carrinho[$id]);
        $_SESSION['carrinho'] = $carrinho;
        header('Location: carrinho.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho - Loja Virtual</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>

    <header>
        <h1>Seu Carrinho</h1>
        <a href="index.php">Voltar para a Loja</a>
    </header>

    <section class="carrinho">
        <?php if (empty($carrinho)) : ?>
            <p>Seu carrinho está vazio.</p>
        <?php else : ?>
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($carrinho as $id => $quantidade) {
                        $sql = "SELECT * FROM produtos WHERE id = $id";
                        $result = $conn->query($sql);
                        $produto = $result->fetch_assoc();
                        $precoTotal = $produto['preco'] * $quantidade;
                        $total += $precoTotal;

                        echo '
                        <tr>
                            <td>' . $produto['nome'] . '</td>
                            <td>' . $quantidade . '</td>
                            <td>R$ ' . number_format($precoTotal, 2, ',', '.') . '</td>
                            <td><a href="carrinho.php?remove=' . $id . '" class="btn">Remover</a></td>
                        </tr>';
                    }
                    ?>
                    <tr>
                        <td colspan="3">Total</td>
                        <td>R$ <?php echo number_format($total, 2, ',', '.'); ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="checkout.php" class="btn">Finalizar Compra</a>
        <?php endif; ?>
    </section>

</body>
</html>
