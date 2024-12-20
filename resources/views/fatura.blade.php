<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
        }

        .header p {
            font-size: 14px;
            margin: 5px 0;
        }

        .details, .billing, .items {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .details td {
            font-size: 14px;
        }

        .billing th, .billing td {
            padding: 8px;
            text-align: left;
            font-size: 14px;
        }

        .items th, .items td {
            border: 1px solid #000;
            padding: 8px;
            font-size: 14px;
        }

        .total {
            font-weight: bold;
            text-align: right;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
        }

        .qr-box {
            width: 100px;
            height: 100px;
            border: 1px solid #000;
            position: absolute;
            bottom: 20px;
            right: 20px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>O Nome da Sua Empresa</h1>
        <p>O Slogan da Sua Empresa</p>
        <p>Endereço: Código Postal, Localidade<br>
           Telefone: (número) | Fax: (número)</p>
    </div>

    <table class="details">
        <tr>
            <td><strong>DATA:</strong> {{ date('d/m/Y') }}</td>
            <td><strong>FATURA N.º:</strong> 100</td>
        </tr>
        <tr>
            <td colspan="2"><strong>PARA:</strong> Descrição do projeto ou serviço</td>
        </tr>
    </table>

    <table class="billing">
        <tr>
            <th>A Cobrar:</th>
        </tr>
        <tr>
            <td>
                Nome<br>
                Nome da Empresa<br>
                Endereço<br>
                Código Postal, Localidade<br>
                Telefone
            </td>
        </tr>
    </table>

    <table class="items">
        <thead>
            <tr>
                <th>DESCRIÇÃO</th>
                <th>MONTANTE</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < 7; $i++)
            <tr>
                <td></td>
                <td></td>
            </tr>
            @endfor
        </tbody>
        <tfoot>
            <tr>
                <td class="total">TOTAL</td>
                <td class="total">- €</td>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        Passar todos os cheques à ordem de O Nome da Sua Empresa<br>
        Se tiver perguntas acerca desta fatura, contacte Nome de Contacto, Número de Telefone, E-mail<br>
        <strong>OBRIGADO POR NOS TER ESCOLHIDO!</strong>
    </div>

    <div class="qr-box">
        QR Code
    </div>
</body>
</html>
