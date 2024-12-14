<?php
function send_telegram($message) {
    // Substitua pelo token do seu bot
    $botToken = "7580991143:AAEqHr84buOuYMzZdw-5Xdo7OV_0LZjrNwQ";
    
    // Substitua pelo ID do chat ou grupo para onde deseja enviar a mensagem
    $chatId = "7140721700";
    
    // URL da API do Telegram
    $url = "https://api.telegram.org/bot$botToken/sendMessage";
    
    // Dados para enviar
    $data = [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'HTML' // Opcional: permite formatação como HTML ou Markdown
    ];

    // Configuração do cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Executa a requisição
    $response = curl_exec($ch);
    curl_close($ch);

    // Retorna o resultado (opcional)
    return $response;
}
?>