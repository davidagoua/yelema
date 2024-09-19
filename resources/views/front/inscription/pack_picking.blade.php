@extends('front.base')





@section('content')
    <form action="" method="post">
        @csrf
        <div x-data="{}" class=" mb-10 md:space-x-5 pt-12 md:px-16 px-5">
            <div class="p-3 w-full bg-white text-center">
                <span class="text-2xl">Choix du pack</span>
            </div>
            <div class="mt-4 md:grid md:grid-cols-3 md:space-x-3">
                @foreach($packs as $pack)
                <div class="bg-white col">
                    <div class="p-3 text-center bg-[#C54C44] text-lg">{{ $pack->name }}</div>
                    <div class="p-4 bg-white">
                        {{ $pack->description }}
                        @foreach($pack->specs()->get() as $spec)
                            <div class="flex py-2">
                                <b class="w-1/2">{{ $spec->label }}</b>
                                <span class="w-1/2">{{ $spec->value }}</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center p-5">
                        <a href="{{ route('front.inscription.info_perso') }}?pack={{ $pack->id }}" class="px-8 block hover:bg-orange-500 hover:text-white py-3 text-orange-500 border border-orange-500">Selectionner</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="p-3 bg-white w-full fixed bottom-0 flex shadow-lg justify-between">
            <div x-show="false">
                <a href="{{ route('front.inscription.setup_bien') }}" class="button today-btn text-white bg-blue-700 !bg-primary-700 dark:bg-blue-600 dark:!bg-primary-600 hover:bg-blue-800 hover:!bg-primary-800 dark:hover:bg-blue-700 dark:hover:!bg-primary-700 focus:ring-4 focus:ring-blue-300 focus:!ring-primary-300 font-medium rounded-lg text-sm px-5 py-2 text-center">Précedent</a>
            </div>
            <div>
                <button type="submit" formtarget="#form"  class="button today-btn text-white bg-blue-700 !bg-primary-700 dark:bg-blue-600 dark:!bg-primary-600 hover:bg-blue-800 hover:!bg-primary-800 dark:hover:bg-blue-700 dark:hover:!bg-primary-700 focus:ring-4 focus:ring-blue-300 focus:!ring-primary-300 font-medium rounded-lg text-sm px-5 py-2 text-center">Suivant</button>
            </div>
        </div>
    </form>
@endsection




@push('script')
    <script src="https://unpkg.com/htmx.org@2.0.1"></script>

@endpush

@push('style')

@endpush
