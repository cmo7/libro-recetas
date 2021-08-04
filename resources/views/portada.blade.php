<x-layout-principal>
    <!--offcanva-->
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
        aria-controls="offcanvasTop">Buscador</button>

    <!--Esto es el OffCanvas-->
    <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasTopLabel">Buscador de Recetas</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="/" method="get">

                <div class="row">
                    <div class="col-4">
                        <fieldset>
                            <h6>Comensales</h6>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="minimo">Mínimo</label>
                                    <input class="form-control" type="number" id="minimo" name="minimo">
                                </div>
                                <div class="col">
                                    <label class="form-label" for="maximo">Máximo</label>
                                    <input class="form-control" type="number" id="maximo" name="maximo">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-4">
                        <fieldset>
                            <label for="dificultad" class="form-label h6">Dificultad de la Receta</label>
                            <select name="dificultad" class="form-select" aria-label="Default select example">
                                <option selected></option>
                                <option value="Fácil">Fácil</option>
                                <option value="Media">Media</option>
                                <option value="Difícil">Difícil</option>
                            </select>
                            <label for="tiempo" class="form-label h6">Tiempo de preparación</label>
                            <input name="tiempo" type="time" class="form-control" id="numero"
                                placeholder="Tiempo de preparación ">
                        </fieldset>
                    </div>


                    <div class="col-4">
                        <fieldset>
                            <label for="ingrediente" class="form-label h6">Seleccionar ingrediente</label>
                            <select name="ingrediente" class="form-select" aria-label="Default select example">
                                <option selected></option>

                                @foreach ($ingredientes as $ingrediente)
                                    <option value="{{ $ingrediente->id }}">{{ $ingrediente->nombre }}</option>
                                @endforeach
                            </select>
                        </fieldset>

                        <fieldset>
                            <label for="autor" class="form-label h6">Seleccionar Autor</label>
                            <select name="autor" class="form-select" aria-label="Default select example">
                                <option selected></option>

                                @foreach ($autores as $autor)
                                    <option value="{{ $autor->id }}">{{ $autor->name }}</option>
                                @endforeach
                            </select>
                        </fieldset>
                    </div>

                </div>
                <input class="btn btn-primary" type="submit" value="Buscar">

            </form>
        </div>
    </div>

    <!-- Mostrar todas las recetas en la portada principal-->

    <div class="row">
        @foreach ($todaslasrecetas as $receta)
            <div class="col-3 g-3">
                <div class="card mx-auto" style="">
                    <img src="{{ $receta->imagen }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $receta->nombre }}</h5>
                        <p class="card-text text-justify">{{ $receta->extracto }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Duración: {{ $receta->tiempo }}</li>
                        <li class="list-group-item">Comensales: {{ $receta->comensales }}</li>
                        <li class="list-group-item">Dificultad: {{ $receta->dificultad }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/receta/{{ $receta->id }}" class="card-link">Ver más</a>
                        <a href="/user/{{ $receta->user_id }}" class="card-link">Autor</a>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

</x-layout-principal>
