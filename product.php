<?php
include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM produtos WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $produto = $result->fetch_assoc();
} else {
    echo "Produto não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $produto['nome']; ?> - Loja Virtual</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>

    <header>
        <h1><?php echo $produto['nome']; ?></h1>
        <a href="cart.php">Carrinho</a>
    </header>

    <section class="produto-detalhes">
        <img src="assets/img/camisa.jpg echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>">
        <p><?php echo $produto['descricao']; ?></p>
        <p>Preço: R$ <?php echo $produto['preco']; ?></p>
        <a href="add_ao_carrinho.php?id=<?php echo $produto['id']; ?>" class="btn">Adicionar ao Carrinho</a>
    </section>

</body>
</html>
