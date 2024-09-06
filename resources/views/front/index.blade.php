@extends('front.base')


@section('content')

<div class="h-100 flex-col">
    <div class="md:flex  md:px-20 px-5">
        <div data-aos="fade-up" data-aos-duration="2000" class="text-center md:text-left pt-12 pb-7 order-last md:order-first  md:w-7/12">
            <h3 class="bg-gradient-to-r from-orange-400 md:text-5xl text-3xl  font-bold to-red-500 inline-block text-transparent bg-clip-text">YELEMA, <br> VOTRE EQUIPE D'EXPERT
                <br>  DEDIEE AU DEMENAGEMENT</h3>
            <h3 style="font-family: Monospaced" class="text-2xl mt-5 text-gray-700" >Nos experts expérimentés vous accompagnent à chaque étape du processus <br> de l'emballage sécusié de vos biens
                à leur transport sûr vers votre nouvelle destination
            </h3>
            <div class="mt-4 mt-8 text-center w-full" >
                <a href="{{ route('front.inscription.localisation') }}"  class="md:w-6/12 block text-center hover:scale-105 transition-all duration-200  bg-gradient-to-r from-red-500 via-red-400 to-red-500 rounded-md p-3 font-bold text-white">Programmer un demangement</a>
            </div>
        </div>
        <div data-aos="fade-down" data-aos-duration="1000" class="text-center hidden md:block md:w-5/12 order-first md:order-last  py-10  md:px-16">
            <div id="lottie1" style="" ></div>
        </div>
    </div>
    <div class="flex-grow"></div>
    <div class="p-5 bg-orange-600"></div>
</div>
@endsection

@push('script')

<script>
    lottie.loadAnimation({
        container: document.querySelector('#lottie1'), // the dom element that will contain the animation
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: '/assets/lotties/lottie1.json' // the path to the animation json
    });


</script>
@endpush
