

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Actividades Escolares</title>
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Tu hoja de estilos personalizada -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>


   <!-- Contenido principal -->
    <main class="container">
      <h1 class="text-center mb-4">Actividades extra Escolares</h1>
    <main class="container text-center">
    <img src="{{ asset('css/imagen/escuela.jpg') }}" alt="Logo Escuela" width="375" class="mb-3">
   


      @yield('content')
    </main>
    

 

    <!-- Barras animadas decorativas -->
    <div class="anim-container">
        <div class="barra"></div>
        <div class="barra1"></div>
    </div>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
