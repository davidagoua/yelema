@extends('front.base')


@section('content')
    <div class="flex justify-center w-full md:mt-10">

        <div class="md:w-9/12 text-center relative">

            <h3 data-aos="fade-up" data-aos-duration="2000" class="bg-gradient-to-r text-center from-orange-400 md:text-5xl text-3xl  font-bold to-red-500 inline-block text-transparent bg-clip-text">
                YELEMA, VOTRE EQUIPE D'EXPERT
                <br> DEDIEE AU DEMENAGEMENT</h3>

            <div class="text-center mt-3 flex justify-center">
                <img src="/assets/img/elan3.png" height="250" width="500" class="z-30" alt="">
            </div>
        </div>

    </div>
    <div class="text-center z-50 bg-gradient-to-r mt-16 from-red-500 via-red-400 to-red-500 py-10 md:px-48"><h3 class="text-lg">Nos
            experts expérimentés vous accompagnent à chaque étape du processus <br> de l'emballage sécusié de vos biens
            à leur transport sûr vers votre nouvelle destination </h3>
        <div class="mt-4">
            <a href="{{ route('front.inscription.localisation') }}" class="p-button p-component md:w-4/12 w-8/12 bg-white rounded-md p-3 font-bold text-orange-800"
                    type="button" data-pc-name="button" data-pc-section="root">Programmer un demangement
            </a>
        </div>
    </div>
@endsection
