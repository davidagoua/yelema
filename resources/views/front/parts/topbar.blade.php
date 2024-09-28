<div>
    <style>
        #menu_button{
            transition: position 1s ease-in-out;
        }
    </style>
    <ul id="navbar-menu" class="bg-black/80 p-3   transition-position overflow-hidden -px-5 text-white z-50 backdrop-blur-sm  transtion-all duration-300 easy-in-out transition  left-[-100%] absolute min-w-[70vw] justify-center flex gap-8 top-0 flex-col  min-h-screen">
        <li>
            <a href="/" class="text-xl pl-5 hover:text-orange-400">Acceuil</a>
        </li>
        <li>
            <a href="{{ route('front.about') }}" class="text-xl pl-5 hover:text-orange-400">Qui sommes nous ?</a>
        </li>
        <li class="flex-1">

        </li>

        <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="p-3 rounded mb-10  bg-gradient-to-r font-bold text-lg text-white from-orange-400 to-orange-600"> <i class="fa-solid fa-headset mr-2"></i> Parler à un agent</button>

    </ul>
    <div class="flex bg-orange-50 items-center justify-between py-5 md:px-20 px-5">
        <a href="{{ route('front.about') }}" class="  hidden md:block ">
            <span class="fa fa-home fa-3x text-xl text-red-400"></span>
            <span class="text-gray-500">&nbsp; Qui sommes-nous ?</span>
        </a>
        <div class="text-center">
            <a href="/"><img src="/assets/img/yelema.png" height="125" width="125" alt=""></a>
        </div>
        <div class=" hidden md:block">
            <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="p-3 rounded  bg-gradient-to-r font-bold text-lg text-white from-orange-400 to-orange-600"> <i class="fa-solid fa-headset mr-2"></i> Parler à un agent</button>
        </div>
        <div class=" md:hidden">
            <button id="menu_button"  class="p-3 rounded  bg-gradient-to-r font-bold text-lg text-white from-orange-400 to-orange-600"> <i class="fa fa-bars "></i> </button>
        </div>

        <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden z-100 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Contactez-Nous
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex space-x-4 w-full justify-center items-center p-4 md:p-5 text-center border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="default-modal" type="button" class="text-white flex items-center  text-center hover:text-green-500 w-2/4 bg-green-700 hover:bg-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <img src="/assets/img/w.png" width="30" alt="">
                            <span> Par whatsapp</span>
                        </button>
                        <button data-modal-hide="default-modal" type="button" class=" flex border- items-center  text-center hover:text-black w-2/4 bg-white border-black border hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <span class="fa fa-phone"></span>&nbsp;
                            <span> Par Appel</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let navbarMenu = document.querySelector("#navbar-menu")
    let menuButton = document.querySelector("#menu_button")

    menuButton.addEventListener('click', ()=>{
        navbarMenu.classList.toggle("left-[-100%]")
    })
</script>
