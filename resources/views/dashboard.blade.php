<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <a class="font-semibold" href="{{ url('/company') }}">Company</a>
                    <a class="font-semibold" href="{{ url('/identitydocs') }}">Identitydoc</a>
                    <a class="font-semibold" href="{{ url('/plats') }}">Plats</a>



                    <div class="row-end-1 pt-2">
                        {{ __("You're logged in!") }}

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
