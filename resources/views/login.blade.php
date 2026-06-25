<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login</title>

     <meta name="csrf-token" content="{{ csrf_token() }}">

     <link rel="icon" href="{{ asset('imagen/logo150.png')}}">
     <!-- CSs -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
     @vite(['resources/css/login.css', 'resources/js/login.js', 'resources/css/general.css'])
</head>
<body>

<div id="alertaPrincipal" class="alerta ocultar">
     <div class="alerta-contenido shadow">
          <p id="txtAlerta" class="mb-3 text-center" >default</p>
          <div  class="text-center">
               <button id="btnAlertaCerrar" class="botonBaseUno">
               Cerrar
               </button>
          </div>
     </div>
</div>   

<div class="fondoLogin">
     <div class="cabeceraLogin">
          <img src="{{ asset('imagen/logo150.png')}}">
          <h1>Ticket150</h1>
     </div> 
     <div class="cuerpoLogin">
          <input id="txtUsuario" class="inputBaseUno" type="" placeholder="Ingresa usuario">
          <input id="txtContrasena" class="inputBaseUno" type="" placeholder="Ingresa contraseña">
          <button id="btnIniciar" class="botonBaseUno">INICIAR</button>
     </div>
</div>

     <!-- js -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>