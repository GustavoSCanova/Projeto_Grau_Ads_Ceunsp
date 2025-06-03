<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @php
        $user = Auth::user();
        $hora = now()->hour;
        $saudacao = $hora >= 5 && $hora < 12 ? 'Bom dia'
                  : ($hora >= 12 && $hora < 18 ? 'Boa tarde' : 'Boa noite');

        $tipoFormatado = ucfirst($user->tipo);
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-2">
                        {{ $saudacao }}, {{ $user->name }}!
                    </h1>
                    <p class="text-gray-700">
                        Você está logado como <span class="font-semibold">{{ $tipoFormatado }}</span>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
