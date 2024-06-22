<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

        @forelse ($vacantes as $vacante)
            <div
                class="p-6 text-gray-900 dark:text-gray-100 border-blue-500 border-b md:flex justify-between items-center">
                <div class=" space-y-2">
                    <a class=" text-xl font-bold" href="#">{{ $vacante->titulo }}</a>
                    <p class=" text-sm  text-gray-300"> {{ $vacante->empresa }}</p>
                    <p class=" text-sm text-gray-500"> Ultimo dia:{{ $vacante->fecha->format('d/m/Y') }}</p>
                </div>
                <div class="  gap-3  flex-col flex md:flex-row items-stretch mt-5 md:mt-0">
                    <a class=" bg-slate-50 py-2  px-4 uppercase rounded-lg text-black font-bold  text-center"
                        href="">candidato</a>
                    <a class=" bg-blue-600  py-2  px-4 uppercase rounded-lg text-black font-bold text-center"
                        href="{{ route('vacantes.edit', $vacante->id) }}">Editar</a>
                    <button wire:click ="$emit('mostrar-alerta',{{ $vacante->id }})"
                        class="  bg-red-600 py-2  px-4 uppercase rounded-lg text-black font-bold  text-center"
                        href="">Eliminar</button>
                </div>
            </div>

        @empty
            <p class="text-center text-white p-2">NO HAY VACANTES...</p>
        @endforelse
    </div>

    <div class="  mt-10 ">
        {{ $vacantes->links() }}
    </div>
</div>
@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        livewire.on('mostrar-alerta', vacanteId => {

            // El siguiente código es el Alert utilizado

            Swal.fire({
                title: '¿Deseas eliminar la vacante?',
                text: "una vez borrada no hay marcha atras!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Borrar!',
                cancelButtonText: 'cancelar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    livewire.emit('eliminarVacante', vacanteId)

                    Swal.fire(
                        'Eliminado!',
                        'la vacante se elimino.',
                        'success'
                    )
                }
            })
        });
    </script>
@endpush
