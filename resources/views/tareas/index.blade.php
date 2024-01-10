@extends('layouts.app')

@section('content')

<main>
    <div class="container py-4" style="margin-left: 10px;" >

    <h1>Tareas</h1>
    <table class="table table-hover my-3">
    <ul>
        @foreach($tareas as $tarea)
            <li class="table-primary">
                <form action="{{ route('tareas.update', $tarea->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="checkbox" name="completada" {{ $tarea->completada ? 'checked' : '' }} onchange="this.form.submit()">
                    <label class="{{ $tarea->completada ? 'completed' : '' }}">{{ $tarea->nombre }}</label>
                </form>
                    </button>
                </form>

                <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>

    <form action="{{ route('tareas.store') }}" method="POST">
        @csrf
        <label for="nombre">Nueva Tarea:</label>
        <input type="text" name="nombre" required>
        <button type="submit">Agregar Tarea</button>
    </form>
</table>
</main>
@endsection
