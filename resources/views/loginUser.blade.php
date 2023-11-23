<h1>Inicie sesion</h1>

<form action="/loginUser" method="post">
    @csrf
    Correo: <input type="email" name="username" id=""> <br>
    Clave: <input type="password" name="password" id=""> <br>
    <input type="submit" value="Enviar">
</form>