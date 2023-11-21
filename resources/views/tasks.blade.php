<h1>Tareas</h1>


<a href="/createTask">Crear tarea</a> <br><br>

@if(session("task"))
    Task <b>"{{ session("task")['nombre'] }}"</b> creada. <br>
@endif
@if(session("eliminado"))
    Task {{ session("eliminado") }} eliminada. <br><br>
@endif


@foreach($tasks as $t)
    <a href="/task/{{ $t['id'] }}">{{ $t['id'] }}</a> 
    {{ Str::title($t['title'])}}
       
    {{ $t['body']}}
    <a href="/deleteTask/{{ $t['id'] }}">Eliminar</a>
       
@endforeach
