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
                <h5><i class="bi bi-alarm-fill"></i> {{$receta->tiempo}} </h5>
                <h5><i class="bi bi-chevron-double-up"></i> {{$receta->dificultad}}</h5>
                <h5><i class="bi bi-people-fill"></i> {{$receta->comensales}}</h5>
            </div>
            <div class="row">
                <h3>Elaboración</h3>
                <p>{{$receta->proceso}}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mx-auto" style="">
                <div class="card-body">
                    <h5 class="card-title text-center">Ingredientes</h5>

                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($receta->ingredientes as $ingrediente)
                        <li class="list-group-item">{{$ingrediente->nombre}} : {{$ingrediente->pivot->cantidad}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


</x-layout-principal>
