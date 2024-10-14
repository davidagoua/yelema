<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Confirmation de votre commande</title>
    <style>
        /* Ajoutez ici vos styles CSS pour personnaliser l'apparence du mail */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius:
                5px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius:
                3px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Confirmation
        de votre commande</h1>

    <p>Bonjour {{ $commande->nom }} {{ $commande->prenoms }},</p>

    <p>Nous vous remercions pour votre commande passée le {{ $commande->created_at->format('d/m/Y') }}:</p>

    <table>
        <thead>
        <tr>
            <th>Article</th>
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
                                        @if($loop->index == 0)
                                        <td class="text-center" rowspan="$commande->items()->count()">
                                            {{ $commande->price }} FCFA
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
        </tbody>

    </table>

    <p>Vous serez notifié par mail dès que le traitement de votre mail sera effectif.</p>

    <p>Si vous avez des questions, n'hésitez pas à nous contacter à l'adresse suivante : contact@yelema.online.</p>

    <p>Cordialement,</p>
    <p>L'équipe <a href="https://yelema.online" class="btn">Yéléma</a></p>
</div>
</body>
</html>
