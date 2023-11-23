<h1>Tareas</h1>


<a href="/createTask">Crear tarea</a> <br><br>

@if(session("task"))
    Task <b>"{{ session("task")['nombre'] }}"</b> creada. <br>
@endif
@if(session("eliminado"))
    Task {{ session("eliminado") }} eliminada. <br><br>
@endif


@foreach($tasks as $task)
    <a href="/task/{{ $task['id'] }}"><h3>{{ Str::title($task['title'])}} (ID: {{ $task['id'] }})</h3></a> 
       
    {{ $task['body']}}

    {{ $task['author_id']}}
    <a href="/deleteTask/{{ $task['id'] }}">Eliminar</a>
       
@endforeach
