<div id="divAlerta">
</div>

<!-- Button trigger modal -->
<button id="btnAgregar" type="button" class="btn btn-success mb-sm-3" data-toggle="modal" data-target="#modal"><i
        class='fas fa-plus'></i> Agregar</button>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalTitulo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitulo"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="formularioContenedor"></div>
        </div>
    </div>
</div>
<!-- Fin modal -->


<table id="marca_table" class="table table-striped table-bordered dt-responsive nowrap">
    <thead>
        <tr>
            <th>Código</th>
            <th>Descripción</th>
            <th>Mantenimiento</th>
        </tr>
    </thead>
    <tbody id="tbody">
    </tbody>
    <tfoot>
        <tr>
            <th>Código</th>
            <th>Descripción</th>
            <th>Mantenimiento</th>
        </tr>
    </tfoot>
</table>
