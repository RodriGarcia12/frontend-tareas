<h1>Crear una tarea</h1>

<form action="/createTask" method="post">
    @csrf
    Titulo: <input type="text" name="title" id=""> <br>
    Contenido: <input type="text" name="body" id=""> <br>
    Autor: <input type="number" name="authorId" id="" placeholder="1"> <br>
    Usuario asignado: <input type="number" name="userAssignedId" id="" placeholder="1"> <br>
    <input type="submit" value="Enviar">
</form>