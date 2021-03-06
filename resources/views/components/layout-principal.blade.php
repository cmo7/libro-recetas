<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Libro de Recetas</title>

</head>

<body class="d-flex flex-column h-100">
    <!--Header-->
    <div class="container">
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img class="d-inline-block ml-" src="/img/logo.png" alt="Logo Principal"
                    style="width: auto; height: 3rem;">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <!--Trampa para añadir espacios HACK MALIGNO-->
                <span class="d-inline-block ml-1">Recetas de Cocina</span>
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
            </ul>

            <div class="col-md-3 text-end">
                @guest
                    <a href="/login" class="btn btn-outline-primary me-2">Acceder</a>
                    <a href="/register" class="btn btn-primary">Registrarse</a>
                @endguest
                @auth
                    <form action="/logout" method="POST">
                        @csrf
                        <input class="btn btn-primary" type="submit" value="Salir">
                    </form>
                @endauth
            </div>
        </header>
    </div>

    <!--Recetas-->
    <main class="container flex-shrink-0">

        {{$slot}}   <!-- Todas las recetas de la página principal -->

    </main>

    <div class="my-5"></div>
    <!--Footer-->
    <footer class="footer py-3 bg-light fixed-bottom">
        <div class="container">
            <span class="text-muted">Recetas de Cocina Super TOP &copy; 2021</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
