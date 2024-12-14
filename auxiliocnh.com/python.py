import requests
import base64

# Sua chave secreta fornecida pela Axion Pay
secret_key = "SUA_CHAVE_SECRETA"

# Montando o cabeçalho de autenticação no formato Basic Auth
auth_header = f"Basic {base64.b64encode(f'{secret_key}:x'.encode()).decode()}"

# Endpoint da API para criar transações
url = "https://api.axionpay.com.br/v1/transactions"

# Dados da cobrança
payload = {
    "amount": 100.00,  # Valor em reais
    "currency": "BRL",  # Moeda
    "description": "Cobrança Pix via Axion Pay",  # Descrição
    "payment": {
        "method": "PIX",  # Método de pagamento
        "pix": {
            "expiration": 3600  # Expiração da cobrança em segundos
        }
    },
    "customer": {
        "name": "Cliente Exemplo",  # Nome do cliente
        "email": "exemplo@cliente.com"  # Email do cliente
    }
}

# Cabeçalhos da requisição
headers = {
    "Authorization": auth_header,
    "Content-Type": "application/json"
}

# Fazendo a requisição
response = requests.post(url, json=payload, headers=headers)

# Verificando o resultado
if response.status_code == 201:
    data = response.json()
    pix_code = data.get("payment").get("pix").get("code")
    print("Código Pix Copia e Cola:", pix_code)
else:
    print("Erro ao criar a transação:", response.status_code, response.json())
