<div class="list-group autocomplete-items">
    @foreach ($unidadesmedida as $unidadmedida)
        <a type="button"
            onClick="selectname_unidadMedida('{{ $unidadmedida['codigo'] . ' - ' . $unidadmedida['descripcion'] }}')"
            class="list-group-item list-group-item-action">{{ $unidadmedida['descripcion'] }}</a>
    @endforeach
</div>
