<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;

class Crearvacante extends Component
{
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $fecha;
    public $Descripcion;
    public $imagen;

    use WithFileUploads;

    protected $rules =[
        'titulo' =>'required|string',
        'salario' =>'required',
        'categoria' =>'required',
        'empresa' =>'required',
        'fecha' =>'required',
        'Descripcion' =>'required',
        'imagen' =>'required|image|max:1024',
    ];

    public function crearVacante() {
        
        $Datos= $this->validate();

        //almacenar la imagen
          $imagen = $this->imagen->store('public/vacantes');
          $Datos['imagen'] = str_replace('public/vacantes/', '', $imagen);

          //dd($nombreImagen);
        //crear la vancante

        Vacante::create([
            'titulo' => $Datos['titulo'],
            'salario_id' => $Datos['salario'],
            'categoria_id' => $Datos['categoria'],
            'empresa' => $Datos['empresa'],
            'fecha' =>$Datos['fecha'],
            'Descripcion' =>$Datos['Descripcion'],
            'imagen' =>$Datos['imagen'],
            'user_id' => auth()->user()->id,
        ]);
        //crear un mensaje
       session()->flash('mensaje', 'la vancate se publico correctamente');

        //redireccionar
        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        //consultar bd
        $Salarios = Salario::all();
        $Categorias = Categoria::all();



        return view('livewire.crearvacante',[
            'salarios' => $Salarios,
            'categorias' => $Categorias
        ]);
    }
}
