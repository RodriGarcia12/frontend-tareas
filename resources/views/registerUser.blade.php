<h1>Registrarse</h1>

<form action="/registerUser" method="post">
    @csrf
    Nombre: <input type="text" name="name" id=""> <br>
    Email: <input type="email" name="email" id=""> <br>
    Contraseña: <input type="password" name="password" id=""> <br>
    Confirmar contraseña: <input type="password" name="password_confirmation" id=""> <br>
    <input type="submit" value="Enviar">
</form>