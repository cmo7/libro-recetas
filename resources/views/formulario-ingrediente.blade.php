<x-layout-principal>
    <form action="/ingrediente_nuevo" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nombreIngrediente" class="form-label">Nombre del Ingrediente</label>
        <input name="nombre" type="text" class="form-control" id="nombreIngrediente" placeholder="Ingredientes ">
      </div>
      <input type="submit" value="Ingresar" class="btn btn-primary">
    </form>
</x-layout-principal>
