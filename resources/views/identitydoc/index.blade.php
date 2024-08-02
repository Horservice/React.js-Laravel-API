<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Identitydoc') }}
        </h2>
    </x-slot>

    @if(Session::has('message'))
        <p class="">{{ Session::get('message') }}</p>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @foreach($identitydocs as $identitydoc)

                        <table class="border-collapse border border-slate-500 text-center  ..." style="width: 100%">
                            <thead>
                            <tr>
                                <th class="border border-slate-600 ...">id</th>
                                <th class="border border-slate-600 ...">name</th>
                                <th class="border border-slate-600 ...">Country</th>
                                <th class="border border-slate-600 ...">Cart Id(entifiant)</th>
                                <th class="border border-slate-600 ...">Date délivrance</th>
                                <th class="border border-slate-600 ...">Date d'expiration</th>
                                <th class="border border-slate-600 ...">Image</th>
                                <th class="border border-slate-600 ...">Chemin de l'image</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="border border-slate-600 ...">{{$identitydoc['id']}}</td>
                                <td class="border border-slate-600 ...">{{$identitydoc['name']}}</td>
                                <td class="border border-slate-600 ...">{{$identitydoc['contry']}}</td>
                                <td class="border border-slate-600 ...">{{$identitydoc['cartId']}}</td>
                                <td class="border border-slate-600 ...">{{$identitydoc['dateDel']}}</td>
                                <td class="border border-slate-600 ...">{{$identitydoc['dateExp']}}</td>
                                <td class="border border-slate-600 ...">{{$identitydoc['img']}}</td>
                                <td class="border border-slate-600 ...">{{$identitydoc['fileName']}}</td>

                            </tr>
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
