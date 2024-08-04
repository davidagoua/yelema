<!DOCTYPE html>
<html>
<head>
    <title>Reçu de Paiement</title>
    <style>
        /* Ici, tu peux ajouter tes styles CSS pour personnaliser l'apparence du reçu */
        body {
            font-family: Arial, sans-serif;
        }
        .receipt {
            width: 700px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
        }
        .header {
            text-align: center;
        }
        .body {
            margin-top: 20px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="receipt">
    <div class="header">
        <img src="{{ public_path('/assets/img/yelema.png') }}" alt="">
        <h1>Votre Reçu</h1>
        <p>Numéro de commande : {{ $commande->id }}</p>
        <p>Date : {{ $commande->created_at }}</p>
    </div>
    <div class="body">
        <table>
            <tr>
                <th>Article</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
            </tr>

        </table>
        <p><strong>Montant total : 0</strong></p>
    </div>
    <div class="footer">
        <p>Merci de votre achat !</p>
    </div>
</div>
</body>
</html>
