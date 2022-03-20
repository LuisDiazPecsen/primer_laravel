<div class="list-group autocomplete-items">
    @foreach ($categorias as $categoria)
        <a type="button"
            onClick="selectname_categoria('{{ $categoria['codigo'] . ' - ' . $categoria['descripcion'] }}')"
            class="list-group-item list-group-item-action">{{ $categoria['descripcion'] }}</a>
    @endforeach
</div>
