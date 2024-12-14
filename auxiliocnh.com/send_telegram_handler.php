<?php
require 'send_telegram.php'; // Inclui a função send_telegram

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    $message = htmlspecialchars($_POST['message']); // Sanitiza a mensagem
    $response = send_telegram($message); // Chama a função para enviar ao Telegram

    echo json_encode(['success' => true, 'response' => $response]);
    exit;
} else {
    echo json_encode(['success' => false, 'error' => 'Mensagem não enviada.']);
    exit;
}
?>