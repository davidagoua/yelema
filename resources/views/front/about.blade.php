@extends('front.base')


@section('content')

<div class="h-full flex-col">
    <div class="md:flex md:px-20 px-5">
        <div data-aos="fade-up" data-aos-duration="2000" class="text-center md:text-left pt-12 pb-7 order-last md:order-first md:w-7/12">
            <h3 class="bg-gradient-to-r from-orange-400 md:text-5xl text-3xl font-bold to-red-500 inline-block text-transparent bg-clip-text">À propos de YELEMA</h3>
            <p class="text-xl mt-5 text-gray-700">
                YELEMA est votre partenaire de confiance pour tous vos besoins en déménagement. Fondée en 2022, notre entreprise s'est bâtie sur des valeurs de professionnalisme, de fiabilité et d'attention aux détails.
            </p>
            <p class="text-xl mt-3 text-gray-700">
                Notre équipe d'experts dévoués s'engage à rendre votre expérience de déménagement aussi fluide et sans stress que possible.
            </p>
        </div>
        <div data-aos="fade-down" data-aos-duration="1000" class="text-center hidden md:block md:w-5/12 order-first md:order-last py-10 md:px-16">
            <img src="/assets/images/about-image.jpg" alt="Équipe YELEMA" class="rounded-lg shadow-lg">
        </div>
    </div>

    <div class="bg-orange-100 py-12 mt-10">
        <div class="container mx-auto px-5">
            <h4 class="text-3xl font-bold text-center text-orange-600 mb-8">Nos Services</h4>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h5 class="text-xl font-semibold mb-3">Emballage Sécurisé</h5>
                    <p>Nous utilisons des matériaux de haute qualité pour protéger vos biens précieux.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h5 class="text-xl font-semibold mb-3">Transport Fiable</h5>
                    <p>Notre flotte moderne assure un transport sûr et efficace de vos affaires.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h5 class="text-xl font-semibold mb-3">Installation Soignée</h5>
                    <p>Nous prenons soin de placer vos meubles et cartons exactement où vous le souhaitez.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="container mx-auto px-5 text-center">
            <h4 class="text-3xl font-bold text-gray-800 mb-8">Pourquoi Choisir YELEMA ?</h4>
            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <h5 class="text-xl font-semibold mb-3 text-orange-600">Expérience</h5>
                    <p>Plus de 10 ans d'expertise dans le domaine du déménagement.</p>
                </div>
                <div>
                    <h5 class="text-xl font-semibold mb-3 text-orange-600">Professionnalisme</h5>
                    <p>Une équipe formée et dévouée à votre satisfaction.</p>
                </div>
                <div>
                    <h5 class="text-xl font-semibold mb-3 text-orange-600">Sur-mesure</h5>
                    <p>Des solutions adaptées à vos besoins spécifiques.</p>
                </div>
                <div>
                    <h5 class="text-xl font-semibold mb-3 text-orange-600">Tranquillité d'esprit</h5>
                    <p>Nous prenons en charge tous les aspects de votre déménagement.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-orange-600 py-10 text-white text-center">
        <h4 class="text-3xl font-bold mb-4">Prêt à Déménager avec YELEMA ?</h4>
        <a href="{{ route('front.inscription.localisation') }}" class="inline-block bg-white text-orange-600 font-bold py-3 px-6 rounded-lg hover:bg-orange-100 transition duration-300">Programmer un Déménagement</a>
    </div>
</div>

@endsection
