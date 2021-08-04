<x-layout-principal>
    <form action="/receta_nueva" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de la Receta</label>
                    <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre Receta ">
                    @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tiempo" class="form-label">Tiempo de preparación</label>
                    <input name="tiempo" type="time" class="form-control" id="numero" placeholder="Tiempo de preparación ">
                    @error('tiempo')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="comensales" class="form-label">Número de comensales</label>
                    <input name="comensales" type="number" class="form-control" id="comensales">
                    @error('comensales')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="dificultad" class="form-label">Dificultad de la Receta</label>
                    <select name="dificultad" class="form-select" aria-label="Default select example">
                        <option selected>Dificultad</option>
                        <option value="Fácil">Fácil</option>
                        <option value="Medio">Medio</option>
                        <option value="Difícil">Difícil</option>
                    </select>
                    @error('dificultad')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="extracto" class="form-label">Extracto de la receta</label>
                    <div class="form-floating">
                        <textarea name="extracto" class="form-control" placeholder="Escribe el extracto de la receta" id="extracto" style="height: 60px"></textarea>
                        <label for="extracto">Extracto</label>
                    </div>
                    @error('extracto')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="proceso" class="form-label">Proceso de preparación</label>
                    <div class="form-floating">
                        <textarea name="proceso" class="form-control" placeholder="Escribe el proceso de preparación" id="proceso" style="height: 100px"></textarea>
                        <label for="proceso">Proceso</label>
                    </div>
                    @error('proceso')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Cargar Imagen</label>
                    <input name="imagen" class="form-control" type="file" id="imagen">
                    @error('imagen')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input type="submit" value="Ingresar" class="btn btn-primary">
            </div>
            <div class="col-6">
                <fieldset>
                @foreach ($ingredientes as $ingrediente)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="ingredientes[]" value="{{$ingrediente->id}}" id="ingrediente-{{$ingrediente->id}}">
                        <label class="form-check-label" for="ingrediente-{{$ingrediente->id}}">
                            {{$ingrediente->nombre}}
                        </label>
                    </div>
                </fieldset>
                @endforeach
            </div>
        </div>
    </form>
</x-layout-principal>



