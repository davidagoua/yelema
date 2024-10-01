@extends('front.base')





@section('content')
    <form action="" method="post">
        @csrf
        <div x-data="{}" class=" mb-10 md:space-x-5 pt-12 md:px-16 px-5">
            <div class="p-3 w-full bg-white text-center">
                <span class="text-2xl">Informations personnelles</span>
            </div>
            <div class="mt-4 bg-white flex w-full justify-center">
                <div class=" w-10/12 md:w-6/12 mt-5">
                    <div class="mb-4 w-full">
                        <span>Nom</span>
                        <input name="nom" required class="p-2 bg-gray-100 mt-2 border-gray-300 border w-full" id="origine_point" placeholder="Entrez votre nom"/>
                    </div>
                    <div class="mb-4 w-full">
                        <span>Prénoms</span>
                        <input name="prenoms" required class="p-2 bg-gray-100 mt-2 border-gray-300 border w-full" id="origine_point" placeholder="Entrez votre prenoms"/>
                    </div>
                    <div class="mb-4 w-full">
                        <span>Email</span>
                        <input name="email" type="email" required class="p-2 bg-gray-100 mt-2 border-gray-300 border w-full" id="origine_point" placeholder="Entrez votre email"/>
                    </div>
                    <div class="mb-4 w-full">
                        <span>Contact</span>
                        <input name="contact" type="phone" pattern="[0-9]+" required class="p-2 bg-gray-100 mt-2 border-gray-300 border w-full" id="origine_point" placeholder="Entrez votre contact"/>
                    </div>
                    <p class="mt-5">&nbsp;</p>
                </div>
            </div>
        </div>
        <div class="p-3 bg-white w-full fixed bottom-0 flex shadow-lg justify-between">
            <div x-show="false">
                <a href="{{ route('front.inscription.pack_picking') }}"  class="button today-btn text-white bg-blue-700 !bg-primary-700 dark:bg-blue-600 dark:!bg-primary-600 hover:bg-blue-800 hover:!bg-primary-800 dark:hover:bg-blue-700 dark:hover:!bg-primary-700 focus:ring-4 focus:ring-blue-300 focus:!ring-primary-300 font-medium rounded-lg text-sm px-5 py-2 text-center">Précedent</a>
            </div>
            <div>
                <button type="submit" formtarget="#form"  class="button today-btn text-white bg-blue-700 !bg-primary-700 dark:bg-blue-600 dark:!bg-primary-600 hover:bg-blue-800 hover:!bg-primary-800 dark:hover:bg-blue-700 dark:hover:!bg-primary-700 focus:ring-4 focus:ring-blue-300 focus:!ring-primary-300 font-medium rounded-lg text-sm px-5 py-2 text-center">Terminé</button>
            </div>
        </div>
    </form>
@endsection




@push('script')
    <script src="https://unpkg.com/htmx.org@2.0.1"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet-locationpicker@0.3.4/src/leaflet-locationpicker.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
        <script>
            Swal.fire({
                title: "Félicitation",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif
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
