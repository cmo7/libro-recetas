<x-layout-principal>
    <div class="row">
        <h1 class="display-5 fw-bold text-dark">{{ $user->name }}</h1>
        @foreach ($user->recetas as $receta)
            <div class="col-3 g-3">
                <div class="card mx-auto" style="">
                    <img src="{{$receta->imagen}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$receta->nombre}}</h5>
                        <p class="card-text text-justify">{{$receta->extracto}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Duración: {{$receta->tiempo}}</li>
                        <li class="list-group-item">Comensales: {{$receta->comensales}}</li>
                        <li class="list-group-item">Dificultad: {{$receta->dificultad}}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/receta/{{$receta->id}}" class="card-link">Ver más</a>
                        <a href="/user/{{$receta->user_id}}" class="card-link">Autor</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout-principal>
