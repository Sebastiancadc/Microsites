<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Error 500</title>
     <!-- Favicon -->
     <link rel="icon" href="{{asset('plantilla/img/theme/IsotipoCOS.png')}}" type="image/png">
    <link href='https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;1,100;1,400;1,700&display=hidden' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset("plantilla/css/faq/plugins.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("css/style-400.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("plantilla/bootstrap/css/bootstrap.css")}}" type="text/css">
</head>

<body class="error404 text-center">
    <div class="container-fluid  error-content">
        <div class="">
            <img alt="image-404" src="{{asset("images/errores/500.png")}}" class="img-cartoon">
            <h1 class="error-number">500</h1>
            <p class="error-des mb-0">¡Error de servidor interno!</p>
            <p class="error-text mb-4 mt-1">Volver a la página anterior.</p>    
            <a href="{{url('home')}}" class="btn btn-gradient-info btn-rounded mt-4">Volver</a>
        </div>
    </div>    
</body>
</html> 