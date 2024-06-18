<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div>
                @if (session()->has('mensaje'))
                <div class="uppercase border border-green-600 bg-green-300 text-green-500 font-bold p-2 my-2">
                    {{session('mensaje')}}
                </div>
                    
                 @endif
            </div>
          <livewire:mostrar-vacantes></
        </div>
    </div>
</x-app-layout>