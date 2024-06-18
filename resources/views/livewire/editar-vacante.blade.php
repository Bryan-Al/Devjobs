<form action="" class=" md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>
    <div>
        <x-input-label for="titulo" :value="__('TITULO')" />

        <x-text-input id="email" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')"
            placeholder="TITULO VACANTE" />
        @error('titulo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="salario" :value="__('SALARIO MENSUAL')" />
        <select wire:model="salario" id="salario"
            class=" w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'">
            <option>--seleccione salario--</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach

        </select>
        @error('salario')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="categoria" :value="__('CATEGORIA')" />
        <select wire:model ="categoria" id="categoria"
            class=" w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'">
            <option>--seleccione categoria--</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>
        @error('categoria')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />

        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')"
            placeholder="Uber,netfilx, etc." />
        @error('empresa')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="fecha" :value="__('ULTIMO DIA PARA POSTULARSE')" />

        <x-text-input id="fecha" class="block mt-1 w-full" type="date" wire:model="fecha" :value="old('fecha')" />
        @error('fecha')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="Descripcion" :value="__('DESCRIPCION')" />
        <textarea
            class=" h-72 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            wire:model="Descripcion" id="Descripcion"></textarea>
        @error('Descripcion')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="imagen" :value="__('IMAGEN')" />

        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen" accept="image/*" />

        <div class=" my-5 w-80">
             <x-input-label :value="__('IMAGEN ACTUAL')" />

             <img src="{{ asset('storage/vacantes'. $imagen) }}" alt="{{'imagen vacante' . $titulo}}">
        </div>
       {{--<div class=" my-5 w-80">
            @if ($imagen)
                Imagen:
                <img src="{{ $imagen->temporaryUrl() }}">
            @endif
        </div>--}}

        @error('imagen')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <x-primary-button class="w-full justify-center ">
        guardar cambios
    </x-primary-button>


</form>
