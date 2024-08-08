@extends('front.base')

@section('content')
    <script src="//unpkg.com/alpinejs" defer></script>
    <form action="" method="post">
        @csrf
        <div x-data="{selectedBiens: [], selectedBien: null}" @change="selectedBiens.push(selectedBien)" class="md:flex mb-10 md:space-x-5 pt-12 md:px-16 px-5">
            <div class="md:w-1/2" id="drop-target">
                <div id="map" class="shadow-lg rounded"></div>
            </div>
            <div  class="md:w-1/2  mt-2 md:mt-0">
                <div class="py-3 px-2 bg-white  ">
                    <div class="text-center font-bold text-lg">Biens ou Materiels à Demenager</div>
                    <div class="md:grid md:grid-cols-1 mt-5 space-y-5">

                        @foreach($items as $item)
                            <div>
                                <label for="">Combien de {{ $item->name }}  avez-vous ?</label>
                                <div class="relative flex mt-2 items-center ">
                                    <button type="button" id="decrement-button" data-input-counter-decrement="{{$item->name}}-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                        </svg>
                                    </button>
                                    <input name="{{$item->id}}" type="text" id="{{$item->name}}-input" data-input-counter data-input-counter-min="1" data-input-counter-max="5" aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" value="0" required />

                                    <button type="button" id="increment-button" data-input-counter-increment="{{$item->name}}-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300  p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="p-3 bg-white w-full fixed bottom-0 flex shadow-lg justify-between">
            <div x-show="false">
                <button type="submit" formtarget="#form"  class="button today-btn text-white bg-blue-700 !bg-primary-700 dark:bg-blue-600 dark:!bg-primary-600 hover:bg-blue-800 hover:!bg-primary-800 dark:hover:bg-blue-700 dark:hover:!bg-primary-700 focus:ring-4 focus:ring-blue-300 focus:!ring-primary-300 font-medium rounded-lg text-sm px-5 py-2 text-center">Précedent</button>
            </div>
            <div>
                <button type="submit" formtarget="#form"  class="button today-btn text-white bg-blue-700 !bg-primary-700 dark:bg-blue-600 dark:!bg-primary-600 hover:bg-blue-800 hover:!bg-primary-800 dark:hover:bg-blue-700 dark:hover:!bg-primary-700 focus:ring-4 focus:ring-blue-300 focus:!ring-primary-300 font-medium rounded-lg text-sm px-5 py-2 text-center">Suivant</button>
            </div>
        </div>
    </form>
@endsection




@push('script')
    <script src="https://unpkg.com/htmx.org@2.0.1"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet-locationpicker@0.3.4/src/leaflet-locationpicker.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>

        var map = L.map('map').setView([5.343924, -4.0645722], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);



    </script>
@endpush

@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-locationpicker@0.3.4/src/leaflet-locationpicker.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <style>
        #map { height: 550px; }

    </style>
@endpush
