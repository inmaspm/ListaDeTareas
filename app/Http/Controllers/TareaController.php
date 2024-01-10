<?php
namespace App\Http\Controllers;
use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::all();
        return view('tareas.index', compact('tareas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
        ]);

        Tarea::create(['nombre' => $request->nombre]);

        return redirect('/tareas');
    }

    public function update(Tarea $tarea)
    {
        $tarea->update(['completada' => !$tarea->completada]);
    
        return redirect('/tareas');
    }
    

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();

        return redirect('/tareas');
    }
}

?>