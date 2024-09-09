<?php
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Obtém os dados do formulário
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    
    // Verifica se todos os campos foram preenchidos
    if (!empty($nome) && !empty($endereco) && !empty($email) && !empty($telefone)) {
        
        // Salva os dados do pedido na sessão (poderia ser no banco de dados)
        $_SESSION['pedido'] = [
            'nome' => $nome,
            'endereco' => $endereco,
            'email' => $email,
            'telefone' => $telefone
        ];

        // Simulação de envio de pedido (aqui você pode implementar lógica de salvar em banco de dados, etc.)
        // Exibe mensagem de sucesso e redireciona para a página de confirmação
        header('Location: confirmacao.php');
        exit;

    } else {
        // Exibe uma mensagem de erro se algum campo estiver vazio
        $_SESSION['erro'] = 'Preencha todos os campos.';
        header('Location: checkout.php');
        exit;
    }
} else {
    // Redireciona de volta para o formulário se acessar a página sem enviar dados
    header('Location: checkout.php');
    exit;
}
?>
