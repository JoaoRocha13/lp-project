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
        <h1>Bigode Grosso Store</h1>
    </div>

    <table class="details">
        <tr>
            <td><strong>DATA:</strong> {{ date('d/m/Y') }}</td>
            <td><strong>FATURA N.º:</strong> 100</td>
        </tr>
    </table>

    <table class="billing">
       
        <tr>
            <td>
                <br>Nome: {{ $user->name }}</br>   
                <br>Código Postal: {{ $codigo_postal }} </br> 
                <br>Localidade: {{ $localidade }}</br> 
                <br>Email: {{ $user->email }}<br>
                <br>Telefone: {{ $telefone }}</br> 
            </td>
        </tr>
    </table>

    <table class="items">
        <thead>
            <tr>
                <th>DESCRIÇÃO</th>
                <th>QUANTIDADE</th>
                <th>MONTANTE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td colspan="2">{{ number_format($item['price'], 2, ',', '.') }} €</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
            <td class="total" colspan="1">TOTAL</td>
            <td class="total" colspan="2">{{ number_format($total, 2, ',', '.') }} €</td>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        <strong>OBRIGADO POR NOS TER ESCOLHIDO!</strong>
    </div>

    <div class="qr-box">
        QR Code
    </div>
</body>
</html>
