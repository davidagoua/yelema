<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture - Yelema</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .invoice {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }
        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .logo {
            max-width: 150px;
        }
        .invoice-details {
            text-align: right;
        }
        h1 {
            color: #005f73;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #005f73;
        }
        .total {
            font-size: 1.2em;
            font-weight: bold;
            text-align: right;
            color: #005f73;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #777;
            font-size: 0.9em;
        }
        .customer-info {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="header">
            <img src="{{ public_path('/assets/img/yelema.png') }}" alt="Yelema Logo" class="logo">
            <div class="invoice-details">
                <h1>Facture</h1>
                <p>Numéro de commande : {{ $commande->id }}</p>
                <p>Date : {{ $commande->created_at->format('d/m/Y') }}</p>
            </div>
        </div>

        <div class="customer-info">
            <h2>Informations client</h2>
            <p><strong>Nom :</strong> {{ $commande->nom }} {{ $commande->prenoms }}</p>
            <p><strong>Email :</strong> {{ $commande->email }}</p>
            <p><strong>Contact :</strong> {{ $commande->contact }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Pack</th>
                    <th>Articles</th>
                    <th>Quantité</th>
                </tr>
            </thead>
            <tbody>

                    @foreach($commande->items as $item)
                                    <tr>
                                        @if($loop->index == 0)
                                        <td rowspan="{{ $commande->items()->count()}}" >
                                            {{ $commande->pack->name }}
                                        </td>
                                        @endif

                                        <td class="text-center">{{ $item->name}} </td>
                                        <td class="text-center">
                                            x {{ $item->quantity }} <br>
                                        </td>

                                    </tr>
                                    @endforeach

            </tbody>
        </table>

        <div class="total">
            @if($commande->status == \App\Models\CommandeState::NEWS->value)
            <p>NB: Le montant de la facture vous sera envoyé par email</p>
            @else
            <p>Total : {{ number_format($commande->price, 0, ',', ' ') }} FCFA</p>
            @endif
        </div>

        <div class="footer">
            <p>Merci pour votre confiance. Pour toute question, veuillez nous contacter à +225 01 03 39 34 70</p>
        </div>
    </div>
</body>
</html>
