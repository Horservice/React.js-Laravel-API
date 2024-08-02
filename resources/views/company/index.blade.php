<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company') }}
        </h2>
    </x-slot>

    @if(Session::has('message'))
        <p class="">{{ Session::get('message') }}</p>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    @foreach($companys as $company)

                        <table class="border-collapse border border-slate-500 text-center  ..." style="width: 100%">
                            <thead>
                            <tr>
                                <th class="border border-slate-600 ...">id</th>
                                <th class="border border-slate-600 ...">name</th>
                                <th class="border border-slate-600 ...">email</th>
                                <th class="border border-slate-600 ...">address</th>
                                <th class="border border-slate-600 ...">website</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="border border-slate-600 ...">{{$company['id']}}</td>
                                <td class="border border-slate-600 ...">{{$company['name']}}</td>
                                <td class="border border-slate-600 ...">{{$company['email']}}</td>
                                <td class="border border-slate-600 ...">{{$company['address']}}</td>
                                <td class="border border-slate-600 ...">{{$company['website']}}</td>
                            </tr>
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
