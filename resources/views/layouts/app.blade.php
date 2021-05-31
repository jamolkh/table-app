<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

    </head>
    <body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">

        @include('layouts.navigation')

            <!-- Page Heading -->

            <!-- Page Content -->
            <div class="flex flex-col md:flex-row">

                <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">
                    <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">
                        <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                            <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                                <x-left-nav :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                    {{ __('Проекты') }}
                                </x-left-nav>
                                <x-left-nav :href="route('view.variable_costs')" :active="request()->routeIs('dashboard1')">
                                    {{ __('Переменные Затраты') }}
                                </x-left-nav>
                                <x-left-nav :href="route('view.fixed_costs')" :active="request()->routeIs('dashboard2')">
                                    {{ __('Постоянные Затраты') }}
                                </x-left-nav>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
                    <div class="bg-gray-800 pt-3">
                        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                            <h3 class="font-bold pl-2">{{ $header }}</h3>
                        </div>
                    </div>
                {{$slot}}
                </div>
            </div>

            <script>
                /*Toggle dropdown list*/
                function toggleDD(myDropMenu) {
                    document.getElementById(myDropMenu).classList.toggle("invisible");
                }
                /*Filter dropdown options*/
                function filterDD(myDropMenu, myDropMenuSearch) {
                    var input, filter, ul, li, a, i;
                    input = document.getElementById(myDropMenuSearch);
                    filter = input.value.toUpperCase();
                    div = document.getElementById(myDropMenu);
                    a = div.getElementsByTagName("a");
                    for (i = 0; i < a.length; i++) {
                        if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                            a[i].style.display = "";
                        } else {
                            a[i].style.display = "none";
                        }
                    }
                }
                // Close the dropdown menu if the user clicks outside of it
                window.onclick = function(event) {
                    if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                        var dropdowns = document.getElementsByClassName("dropdownlist");
                        for (var i = 0; i < dropdowns.length; i++) {
                            var openDropdown = dropdowns[i];
                            if (!openDropdown.classList.contains('invisible')) {
                                openDropdown.classList.add('invisible');
                            }
                        }
                    }
                }
            </script>

    </body>
</html>
