<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

    @forelse ($vacantes as $vacante)
        <div class="p-6 text-gray-900 dark:text-gray-100 border-blue-500 border-b md:flex justify-between items-center">
            <div class=" space-y-2">
                <a class=" text-xl font-bold" href="#">{{ $vacante->titulo }}</a>
                <p class=" text-sm  text-gray-300"> {{ $vacante->empresa }}</p>
                <p class=" text-sm text-gray-500"> Ultimo dia:{{ $vacante->fecha->format('d/m/Y') }}</p>
            </div>
            <div class="  gap-3  flex-col flex md:flex-row items-stretch mt-5 md:mt-0">
                <a class=" bg-slate-50 py-2  px-4 uppercase rounded-lg text-black font-bold  text-center"
                    href="">candidato</a>
                <a class=" bg-blue-600  py-2  px-4 uppercase rounded-lg text-black font-bold text-center"
                    href="{{route('vacantes.edit',$vacante->id)}}">Editar</a>
                <a class="  bg-red-600 py-2  px-4 uppercase rounded-lg text-black font-bold  text-center"
                    href="">Eliminar</a>
            </div>
        </div>

    @empty
        <p class="text-center text-white p-2">NO HAY VACANTES...</p>
    @endforelse
</div>

<div class="  mt-10 ">
{{ $vacantes->links()}}
</div>
