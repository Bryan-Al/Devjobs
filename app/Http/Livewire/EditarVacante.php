<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class EditarVacante extends Component
{
    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $fecha;
    public $Descripcion;
    public $imagen;
    public $imagen_nueva;

    use WithFileUploads;

    protected $rules =[
        'titulo' =>'required|string',
        'salario' =>'required',
        'categoria' =>'required',
        'empresa' =>'required',
        'fecha' =>'required',
        'Descripcion' =>'required',
        'imagen_nueva' =>'nullable|image|max:1024',
       
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->fecha = Carbon::parse($vacante->fecha)->format('Y-m-d');
        $this->Descripcion = $vacante->Descripcion;
        $this->imagen = $vacante->imagen;
    }

    public function editarVacante(){



        $Datos= $this->validate();

        //si hay imagen nueva
        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $Datos['imagen'] = str_replace('public/vacantes/', '', $imagen);
        }

        //encontrar la vacante a edit
       $vacante = Vacante::find($this->vacante_id);

            //assignar la vacante
        $vacante->titulo = $Datos['titulo'];
        $vacante->salario_id = $Datos['salario'];
        $vacante->categoria_id = $Datos['categoria'];
        $vacante->empresa= $Datos['empresa'];
        $vacante->fecha = $Datos['fecha'];
        $vacante->Descripcion = $Datos['Descripcion'];
        $vacante->imagen = $Datos['imagen'] ?? $vacante->imagen;

       //guardar 
       $vacante->save();

           //crear un mensaje
           session()->flash('mensaje', 'la vancante se actualizo correctamente');

           //redireccionar
           return redirect()->route('vacantes.index');
       
    }

    public function render()
    {
         //consultar bd
         $Salarios = Salario::all();
         $Categorias = Categoria::all();
 
        return view('livewire.editar-vacante',[
            'salarios' => $Salarios,
            'categorias' => $Categorias
    ]);
    }
}
