@extends('back.base')


@section('content')
    <section class="section">


        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h2>Invoice</h2>
                                <div class="invoice-number">Commande #{{ \Illuminate\Support\Str::padLeft($commande->id ,7, '0') }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Client:</strong><br>
                                        {{ $commande->prenoms }} {{ $commande->nom }}<br>
                                        {{ $commande->contact }}<br>
                                        {{ $commande->email }}<br>

                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Reservation:</strong><br>
                                        {{ $commande->localisation['date'] }} {{ $commande->localisation['time'] }}<br>
                                        {{ $commande->localisation['origine'] }}<br>
                                        {{ $commande->localisation['destination'] }}<br>
                                        {{ $commande->pack->name }}
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Local:</strong><br>
                                        {{ $commande->localisation['origin_type_local'] }}, {{ $commande->localisation['origin-nb_piece'] }} pièces<br>
                                        {{ $commande->localisation['destination_type_local'] }}, {{ $commande->localisation['destination_nb_piece'] }} pièces<br>
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Date de reservation:</strong><br>
                                        {{ \Carbon\Carbon::make($commande->created_at)->format('D, d M Y') }}<br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title">Articles</div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tbody><tr>
                                        <th data-width="40" style="width: 40px;">#</th>
                                        <th>Nom</th>
                                        <th class="text-center">Quantité</th>
                                        <th class="text-center">Prix</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Mouse Wireless</td>
                                        <td class="text-center">$10.99</td>
                                        <td class="text-center">1</td>
                                        <td class="text-right">$10.99</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Keyboard Wireless</td>
                                        <td class="text-center">$20.00</td>
                                        <td class="text-center">3</td>
                                        <td class="text-right">$60.00</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Headphone Blitz TDR-3000</td>
                                        <td class="text-center">$600.00</td>
                                        <td class="text-center">1</td>
                                        <td class="text-right">$600.00</td>
                                    </tr>
                                    </tbody></table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-8">
                                    <div class="section-title">Payment Method</div>
                                    <p class="section-lead">The payment method that we provide is to make it easier for you to pay invoices.</p>
                                    <div class="images">
                                        <img src="assets/img/visa.png" alt="visa">
                                        <img src="assets/img/jcb.png" alt="jcb">
                                        <img src="assets/img/mastercard.png" alt="mastercard">
                                        <img src="assets/img/paypal.png" alt="paypal">
                                    </div>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Subtotal</div>
                                        <div class="invoice-detail-value">$670.99</div>
                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Shipping</div>
                                        <div class="invoice-detail-value">$15</div>
                                    </div>
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Total</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">$685.99</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-md-right">
                    <div class="float-lg-left mb-lg-0 mb-3">
                        <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process Payment</button>
                        <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button>
                    </div>
                    <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
                </div>
            </div>
        </div>
    </section>
@endsection
