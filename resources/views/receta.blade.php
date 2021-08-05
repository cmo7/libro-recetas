<x-layout-principal>

    <div class="p-5 mb-4 bg-dark rounded-3"
        style="background-image: url({{ $receta->imagen }}); background-repeat: no-repeat; background-position: center center; background-size: cover; filter: brightness(0.8);">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold text-light">{{ $receta->nombre }}</h1>
            <p class="col-md-8 fs-4 text-light">{{ $receta->extracto }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <h5><i class="bi bi-alarm-fill"></i> {{ $receta->tiempo }} </h5>
                <h5><i class="bi bi-chevron-double-up"></i> {{ $receta->dificultad }}</h5>
                <h5><i class="bi bi-people-fill"></i> {{ $receta->comensales }}</h5>
            </div>
            <div class="row">
                <h3>Elaboración</h3>
                <p>{{ $receta->proceso }}</p>
            </div>
            @auth
                @if ($receta->user_id == auth()->user()->id)
                    <form action="/borrar_receta" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $receta->id }}">
                        <input type="submit" class="btn btn-danger" value="Borrar">
                    </form>
                @endif
            @endauth

        </div>

        <div class="col-md-6">
            <div class="card mx-auto" style="">
                <div class="card-body">
                    <h5 class="card-title text-center">Ingredientes</h5>

                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($receta->ingredientes as $ingrediente)
                        <li class="list-group-item">{{ $ingrediente->nombre }} : {{ $ingrediente->pivot->cantidad }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <h3>Comentarios</h3>
    @auth
        <div class="row">
            <div class="col">
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="/comentario_nuevo" method="post">
                            @csrf
                            <input type="hidden" name="receta_id" value="{{ $receta->id }}">
                            <label for="contenido" class="form-label">Tu Comentario</label>
                            <input type="text" name="contenido" id="contenido" class="form-control">
                            <label for="puntuacion" class="form-label"></label>
                            <input class="form-range" type="range" name="puntuacion" id="puntuacion" min="0" max="10"
                                step="1">
                            <input class="btn btn-primary" type="submit" value="Enviar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    <div class="row">
        @if ($receta->comentarios->count() > 0)
            @foreach ($receta->comentarios as $comentario)
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/user/{{ $comentario->user_id }}">{{ $comentario->user->name }} </a>
                                {{ $comentario->created_at->locale('es')->diffForHumans() }}
                            </h5>
                            @for ($i = 0; $i < $comentario->puntuacion; $i++)
                                ⭐
                            @endfor
                            <br>
                            {{ $comentario->contenido }}
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-secondary" role="alert">
                Aun no hay comentarios
            </div>
        @endif
    </div>


</x-layout-principal>
