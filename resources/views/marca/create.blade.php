<form id="form">
    <div id="modalBody" class="modal-body">
        <div id="filaError">
        </div>
        <div class="form-row" hidden>
            <div class="form-group col-md-12">
                <input type="text" class="form-control" id="txtCodigo" name="txtCodigo" readOnly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="txtDescripcion">Descripción</label>
                <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion"
                    placeholder="Descripción" autofocus>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="btnAceptar" type="button" class="btn btn-primary"></button>
    </div>
</form>
