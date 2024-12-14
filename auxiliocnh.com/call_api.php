<?php
require_once('vendor/autoload.php');

use GuzzleHttp\Client;

function generateAuthorizationHeader($secretKey) {
    // Codifica a chave secreta no formato Base64, equivalente ao `Buffer` em JavaScript
    $base64EncodedKey = base64_encode($secretKey . ":x");
    return "Basic " . $base64EncodedKey;
}

function createTransaction($secretKey) {
    // Gera o cabeçalho de autenticação
    $authorizationHeader = generateAuthorizationHeader($secretKey);

    // URL do endpoint da API
    $url = "https://api.axionpay.com.br/v1/transactions";

    // Configurando o payload da transação
    $payload = [
        "paymentMethod" => "pix", // Método de pagamento
        "amount" => 50                    // Valor da transação
    ];

    // Inicializa o cliente HTTP Guzzle
    $client = new Client();

    try {
        // Realiza a requisição POST
        $response = $client->request('POST', $url, [
            'headers' => [
                'accept' => 'application/json',
                'authorization' => $authorizationHeader,
                'content-type' => 'application/json',
            ],
            'json' => $payload
        ]);

        // Retorna o corpo da resposta da API
        return $response->getBody()->getContents();
    } catch (\GuzzleHttp\Exception\RequestException $e) {
        // Trata erros de requisição
        return "Erro ao criar transação: " . $e->getMessage();
    }
}

// Substitua pela sua chave secreta da Axion Pay
$secretKey = "sk_B2fzstYI8Jzp8CIzXBWDfauNAYY_OZa0A7zRBO7qqjMeqKf9";

// Chama a função para criar a transação
$response = createTransaction($secretKey);

// Exibe a resposta da API
echo $response;

?>
