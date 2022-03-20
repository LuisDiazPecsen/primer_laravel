<div class="list-group autocomplete-items">
    @foreach ($marcas as $marca)
        <a type="button" onClick="selectname_marca('{{ $marca['codigo'] . ' - ' . $marca['descripcion'] }}')"
            class="list-group-item list-group-item-action">{{ $marca['descripcion'] }}</a>
    @endforeach
</div>
