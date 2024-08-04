@extends('front.base')


@section('content')
<form action="" method="post">
    @csrf
    <div x-data="{}" class="md:flex mb-16 md:space-x-5 pt-12 md:px-16 px-5">
        <div class="md:w-1/2" id="drop-target">
            <div id="map" class="shadow-lg rounded"></div>
        </div>
        <div  class="md:w-1/2  mt-2 md:mt-0">
            <div class="py-3 px-2 bg-white  ">
                <div class="text-center font-bold text-lg">Localisation</div>
                <div class="flex justify-center">
                    <div class="w-full p-3">
                        <div class="w-full">
                            <span>Lieu de ramassage</span>
                            <input name="origine" class="p-2 bg-gray-100 mt-2 border-gray-300 border w-full" id="origine_point" placeholder="Position actuelle"/>
                        </div>
                        <div class="flex space-x-3 mt-3 ">
                            <div class="w-1/2">
                                <span>Type de local</span>
                                <select name="origin_type_local" id="" class="block p-2 bg-gray-100 mt-2 border-gray-300 border w-full">
                                    <option>Apartement</option>
                                    <option>Maison basse</option>
                                </select>
                            </div>
                            <div class="w-1/2">
                                <span>Nombre de pièces</span>
                                <input type="number" name="origin-nb_piece" class="block p-2 bg-gray-100 mt-2 border-gray-300 border w-full" id="">
                            </div>
                        </div>
                        <hr class="m-5">
                        <div class="w-full">
                            <span>Destination</span>
                            <input name="destination" class="p-2 bg-gray-100 mt-2 border-gray-300 border w-full" placeholder="Position actuelle"/>
                        </div>
                        <div class="flex space-x-3 mt-3 ">
                            <div class="w-1/2">
                                <span>Type de local</span>
                                <select name="destination_type_local" id="" class="block p-2 bg-gray-100 mt-2 border-gray-300 border w-full">
                                    <option>Apartement</option>
                                    <option>Maison basse</option>
                                </select>
                            </div>
                            <div class="w-1/2">
                                <span>Nombre de pièces</span>
                                <input type="number" name="destination_nb_piece" class="block p-2 bg-gray-100 mt-2 border-gray-300 border w-full" id="">
                            </div>
                        </div>
                        <hr class="m-5">

                    </div>
                </div>
                <div class="text-center font-bold text-lg">Date et heure</div>
                <div class="flex px-2 mt-3 space-x-3 ">
                    <div class="w-1/2">
                        <input class="p-2 bg-gray-100 border-gray-300 border w-full" name="date" type="date" placeholder="Position actuelle"/>
                    </div>
                    <div class="w-1/2 relative">
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <input type="time" id="time" name="time" class="bg-gray-100 border leading-none border-gray-300 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="09:00" max="18:00" value="00:00" required />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="z-index: 1000" class="p-3 bg-white w-full fixed bottom-0 flex shadow-lg justify-between">
        <div x-show="false">
        </div>
        <div>
            <button type="submit"   class="button today-btn text-white bg-blue-700 !bg-primary-700 dark:bg-blue-600 dark:!bg-primary-600 hover:bg-blue-800 hover:!bg-primary-800 dark:hover:bg-blue-700 dark:hover:!bg-primary-700 focus:ring-4 focus:ring-blue-300 focus:!ring-primary-300 font-medium rounded-lg text-sm px-5 py-2 text-center">Suivant</button>
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
