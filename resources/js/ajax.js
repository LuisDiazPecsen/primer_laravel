const $tituloPagina = document.getElementById('tituloPagina');
const $tituloCard = document.getElementById('tituloCard');
const $cuerpoCard = document.getElementById('cuerpoCard');
const $btnSBIindex = document.getElementById('btnSBIndex');
const $btnSBUsuario = document.getElementById('btnSBUsuario');
const $btnSBProducto = document.getElementById('btnSBProducto');
const $btnSBMarca = document.getElementById('btnSBMarca');
const $btnSBCategoria = document.getElementById('btnSBCategoria');
const $btnSBUnidadMedida = document.getElementById('btnSBUnidadMedida');
const $btnLBIindex = document.getElementById('btnLBIndex');
const $btnLBProducto = document.getElementById('btnLBProducto');
const $btnLBMarca = document.getElementById('btnLBMarca');
const $btnLBCategoria = document.getElementById('btnLBCategoria');
const $btnLBUnidadMedida = document.getElementById('btnLBUnidadMedida');
let $btnAgregar = document.createElement('button');
var tipo = 'index';

const $fragment = document.createDocumentFragment();

function capitalizeFirstLetter(string) {
   return string.charAt(0).toUpperCase() + string.slice(1);
}

// Revisa qué item de la SideBar debe activarse
function activarSideBar() {
   $btnSBUsuario.classList.remove('active');
   $btnSBProducto.classList.remove('active');
   $btnSBMarca.classList.remove('active');
   $btnSBCategoria.classList.remove('active');
   $btnSBUnidadMedida.classList.remove('active');
   switch (tipo) {
      case 'usuario':
         $btnSBUsuario.classList.add('active');
         break;
      case 'producto':
         $btnSBProducto.classList.add('active');
         break;
      case 'marca':
         $btnSBMarca.classList.add('active');
         break;
      case 'categoria':
         $btnSBCategoria.classList.add('active');
         break;
      case 'unidadMedida':
         $btnSBUnidadMedida.classList.add('active');
         break;
      default:
         break;
   }
}

// Inserta formulario
function formulario() {
   // INICIO - Formulario
   if (document.getElementById('modalBody').children.length < 2) {
      // Obtener formulario
      const $modalBody = document.getElementById('modalBody');

      // Fila 00
      const $divFormRow0 = document.createElement('div');
      $divFormRow0.setAttribute('class', 'form-row');

      // Grupo 01 - Fila 00
      const $divFormGroup01 = document.createElement('div');
      $divFormGroup01.setAttribute('class', 'form-group col-md-12');
      const $inputCodigo = document.createElement('input');
      $inputCodigo.setAttribute('type', 'text');
      $inputCodigo.setAttribute('class', 'form-control');
      $inputCodigo.setAttribute('id', 'txtCodigo');
      $inputCodigo.setAttribute('name', 'txtCodigo');
      $inputCodigo.setAttribute('readOnly', 'true');
      $inputCodigo.setAttribute('value', '');
      $divFormGroup01.appendChild($inputCodigo);
      $divFormRow0.appendChild($divFormGroup01);
      $divFormRow0.setAttribute('hidden', 'true');
      //console.log($divFormRow0);
      // FIN Grupo 01 - Fila 00

      // FIN Fila 00

      // Fila 01
      const $divFormRow1 = document.createElement('div');
      $divFormRow1.setAttribute('class', 'form-row');

      // Grupo 01 - Fila 01
      const $divFormGroup11 = document.createElement('div');
      $divFormGroup11.setAttribute('class', 'form-group col-md-12');
      const $label11 = document.createElement('label');
      $label11.setAttribute('for', 'txtDescipcion');
      $label11.innerHTML = 'Descripción';
      const $inputDescripcion = document.createElement('input');
      $inputDescripcion.setAttribute('type', 'text');
      $inputDescripcion.setAttribute('class', 'form-control');
      $inputDescripcion.setAttribute('id', 'txtDescripcion');
      $inputDescripcion.setAttribute('name', 'txtDescripcion');
      switch (tipo) {
         case 'producto':
            $inputDescripcion.setAttribute('placeholder', 'Descripción del producto');
            break;
         case 'marca':
            $inputDescripcion.setAttribute('placeholder', 'Descripción de la marca');
            break;
         case 'categoria':
            $inputDescripcion.setAttribute('placeholder', 'Descripción de la categoría');
            break;
         case 'unidadMedida':
            $inputDescripcion.setAttribute('placeholder', 'Descripción de la unidad de medida');
            break;
      }
      $divFormGroup11.appendChild($label11);
      $divFormGroup11.appendChild($inputDescripcion);
      $divFormRow1.appendChild($divFormGroup11);
      //console.log($divFormRow1);
      // FIN Grupo 01 - Fila 01

      // FIN Fila 01

      $modalBody.appendChild($divFormRow0);
      $modalBody.appendChild($divFormRow1);

      if (tipo == 'producto') {
         // Fila 02
         const $divFormRow2 = document.createElement('div');
         $divFormRow2.setAttribute('class', 'form-row');

         // Grupo 01 - Fila 02
         const $divFormGroup21 = document.createElement('div');
         $divFormGroup21.setAttribute('class', 'form-group col-md-6');
         const $label21 = document.createElement('label');
         $label21.setAttribute('for', 'txtPrecioCompra');
         $label21.innerHTML = 'Precio de compra';
         const $inputPrecioCompra = document.createElement('input');
         $inputPrecioCompra.setAttribute('type', 'text');
         $inputPrecioCompra.setAttribute('class', 'form-control');
         $inputPrecioCompra.setAttribute('id', 'txtPrecioCompra');
         $inputPrecioCompra.setAttribute('name', 'txtPrecioCompra');
         $inputPrecioCompra.setAttribute('placeholder', '0.00');
         $divFormGroup21.appendChild($label21);
         $divFormGroup21.appendChild($inputPrecioCompra);
         $divFormRow2.appendChild($divFormGroup21);
         // FIN Grupo 01 - Fila 02

         // Grupo 02 - Fila 02
         const $divFormGroup22 = document.createElement('div');
         $divFormGroup22.setAttribute('class', 'form-group col-md-6');
         const $label22 = document.createElement('label');
         $label22.setAttribute('for', 'txtPrecioVenta');
         $label22.innerHTML = 'Precio de venta';
         const $inputPrecioVenta = document.createElement('input');
         $inputPrecioVenta.setAttribute('type', 'text');
         $inputPrecioVenta.setAttribute('class', 'form-control');
         $inputPrecioVenta.setAttribute('id', 'txtPrecioVenta');
         $inputPrecioVenta.setAttribute('name', 'txtPrecioVenta');
         $inputPrecioVenta.setAttribute('placeholder', '0.00');
         $divFormGroup22.appendChild($label22);
         $divFormGroup22.appendChild($inputPrecioVenta);
         $divFormRow2.appendChild($divFormGroup22);
         // FIN Grupo 02 - Fila 02

         // Fila 02


         // Fila 03
         const $divFormRow3 = document.createElement('div');
         $divFormRow3.setAttribute('class', 'form-row');

         // Grupo 01 - Fila 03
         const $divFormGroup31 = document.createElement('div');
         $divFormGroup31.setAttribute('class', 'form-group col-md-3');
         const $label31 = document.createElement('label');
         $label31.setAttribute('for', 'txtStock');
         $label31.innerHTML = 'Stock';
         const $inputStock = document.createElement('input');
         $inputStock.setAttribute('type', 'text');
         $inputStock.setAttribute('class', 'form-control');
         $inputStock.setAttribute('id', 'txtStock');
         $inputStock.setAttribute('name', 'txtStock');
         $inputStock.setAttribute('placeholder', '0.00');
         $divFormGroup31.appendChild($label31);
         $divFormGroup31.appendChild($inputStock);
         $divFormRow3.appendChild($divFormGroup31);
         // FIN Grupo 01 - Fila 03

         // Grupo 02 - Fila 03
         const $divFormGroup32 = document.createElement('div');
         $divFormGroup32.setAttribute('class', 'form-group col-md-3');
         const $label32 = document.createElement('label');
         $label32.setAttribute('for', 'txtStockMinimo');
         $label32.innerHTML = 'Stock mínimo';
         const $inputStockMinimo = document.createElement('input');
         $inputStockMinimo.setAttribute('type', 'text');
         $inputStockMinimo.setAttribute('class', 'form-control');
         $inputStockMinimo.setAttribute('id', 'txtStockMinimo');
         $inputStockMinimo.setAttribute('name', 'txtStockMinimo');
         $inputStockMinimo.setAttribute('placeholder', '0.00');
         $divFormGroup32.appendChild($label32);
         $divFormGroup32.appendChild($inputStockMinimo);
         $divFormRow3.appendChild($divFormGroup32);
         // FIN Grupo 02 - Fila 03

         // Grupo 03 - Fila 03
         const $divFormGroup33 = document.createElement('div');
         $divFormGroup33.setAttribute('class', 'form-group col-md-6');
         const $label33 = document.createElement('label');
         $label33.setAttribute('for', 'txtUnidadMedida');
         $label33.innerHTML = 'Unidad de medida';
         const $inputUnidadMedida = document.createElement('input');
         $inputUnidadMedida.setAttribute('type', 'text');
         $inputUnidadMedida.setAttribute('class', 'form-control');
         $inputUnidadMedida.setAttribute('id', 'txtUnidadMedida');
         $inputUnidadMedida.setAttribute('name', 'txtUnidadMedida');
         $inputUnidadMedida.setAttribute('placeholder', 'Buscar...');
         const $aUnidadMedida = document.createElement('a');
         $aUnidadMedida.setAttribute('href', '#');
         $aUnidadMedida.setAttribute('id', 'btnCambiarUnidadMedida');
         $aUnidadMedida.setAttribute('class', 'btn btn-warning');
         $aUnidadMedida.setAttribute('hidden', 'true');
         $aUnidadMedida.style.marginTop = '10px';
         $aUnidadMedida.innerHTML = 'Cambiar';
         const $spanUnidadMedida = document.createElement('span');
         $spanUnidadMedida.setAttribute('id', 'unidadMedidaList');

         $divFormGroup33.appendChild($label33);
         $divFormGroup33.appendChild($inputUnidadMedida);
         $divFormGroup33.appendChild($aUnidadMedida);
         $divFormGroup33.appendChild($spanUnidadMedida);
         $divFormRow3.appendChild($divFormGroup33);
         // FIN Grupo 03 - Fila 03

         // Fila 03


         // Fila 04
         const $divFormRow4 = document.createElement('div');
         $divFormRow4.setAttribute('class', 'form-row');

         // Grupo 01 - Fila 04
         const $divFormGroup41 = document.createElement('div');
         $divFormGroup41.setAttribute('class', 'form-group col-md-6');
         const $label41 = document.createElement('label');
         $label41.setAttribute('for', 'txtMarca');
         $label41.innerHTML = 'Marca';
         const $inputMarca = document.createElement('input');
         $inputMarca.setAttribute('type', 'text');
         $inputMarca.setAttribute('class', 'form-control');
         $inputMarca.setAttribute('id', 'txtMarca');
         $inputMarca.setAttribute('name', 'txtMarca');
         $inputMarca.setAttribute('placeholder', 'Buscar...');
         const $aMarca = document.createElement('a');
         $aMarca.setAttribute('href', '#');
         $aMarca.setAttribute('id', 'btnCambiarMarca');
         $aMarca.setAttribute('class', 'btn btn-warning');
         $aMarca.setAttribute('hidden', 'true');
         $aMarca.style.marginTop = '10px';
         $aMarca.innerHTML = 'Cambiar';
         const $spanMarca = document.createElement('span');
         $spanMarca.setAttribute('id', 'marcaList');

         $divFormGroup41.appendChild($label41);
         $divFormGroup41.appendChild($inputMarca);
         $divFormGroup41.appendChild($aMarca);
         $divFormGroup41.appendChild($spanMarca);
         $divFormRow4.appendChild($divFormGroup41);
         // FIN Grupo 01 - Fila 04

         // Grupo 02 - Fila 04
         const $divFormGroup42 = document.createElement('div');
         $divFormGroup42.setAttribute('class', 'form-group col-md-6');
         const $label42 = document.createElement('label');
         $label42.setAttribute('for', 'txtCategoria');
         $label42.innerHTML = 'Categoría';
         const $inputCategoria = document.createElement('input');
         $inputCategoria.setAttribute('type', 'text');
         $inputCategoria.setAttribute('class', 'form-control');
         $inputCategoria.setAttribute('id', 'txtCategoria');
         $inputCategoria.setAttribute('name', 'txtCategoria');
         $inputCategoria.setAttribute('placeholder', 'Buscar...');
         const $aCategoria = document.createElement('a');
         $aCategoria.setAttribute('href', '#');
         $aCategoria.setAttribute('id', 'btnCambiarCategoria');
         $aCategoria.setAttribute('class', 'btn btn-warning');
         $aCategoria.setAttribute('hidden', 'true');
         $aCategoria.style.marginTop = '10px';
         $aCategoria.innerHTML = 'Cambiar';
         const $spanCategoria = document.createElement('span');
         $spanCategoria.setAttribute('id', 'categoriaList');

         $divFormGroup42.appendChild($label42);
         $divFormGroup42.appendChild($inputCategoria);
         $divFormGroup42.appendChild($aCategoria);
         $divFormGroup42.appendChild($spanCategoria);
         $divFormRow4.appendChild($divFormGroup42);
         // FIN Grupo 02 - Fila 04

         // FIN Fila 04

         $modalBody.appendChild($divFormRow2);
         $modalBody.appendChild($divFormRow3);
         $modalBody.appendChild($divFormRow4);

         autocompleteSearchBars();
      }

      document.getElementById('form').addEventListener('submit', function (event) {
         event.preventDefault();
         if (validar()) {
            submit();
         }
      });
   } else {
      document.getElementById('modalBody').children[1].remove();
   }
   // FIN - Formulario
}

// Inserta botón de agregar nuevo registro
function btnAgregar() {
   // Button trigger modal
   if (document.getElementById('btnAgregar') == null) {
      $btnAgregar.setAttribute('id', 'btnAgregar');
      $btnAgregar.setAttribute('type', 'button');
      $btnAgregar.setAttribute('class', 'btn btn-success mb-sm-3');
      $btnAgregar.setAttribute('data-toggle', 'modal');
      $btnAgregar.addEventListener('click', function () {
         $('#modal').modal('show');
         accion = 'registrar';
      });
      const $iconPlus = document.createElement('i');
      $iconPlus.setAttribute('class', 'fas fa-plus');
      $btnAgregar.appendChild($iconPlus);
      $btnAgregar.innerHTML = 'Agregar nuevo';
      $btnAgregar.addEventListener('click', function () { agregar(); });

      $cuerpoCard.appendChild($btnAgregar);
   }
   // FIN - Button trigger modal
}

// Actualizar títulos del index.php
function titulo() {
   switch (tipo) {
      case 'index':
         $tituloPagina.innerHTML = 'Inicio';
         $tituloCard.innerHTML = 'Inicio';
         break;
      case 'usuario':
         $tituloPagina.innerHTML = 'Panel de usuario';
         $tituloCard.innerHTML = 'Panel de usuario';
         break;
      case 'producto':
         $tituloPagina.innerHTML = 'Productos';
         $tituloCard.innerHTML = 'Productos';
         break;
      case 'marca':
         $tituloPagina.innerHTML = 'Marcas';
         $tituloCard.innerHTML = 'Marcas';
         break;
      case 'categoria':
         $tituloPagina.innerHTML = 'Categorías';
         $tituloCard.innerHTML = 'Categorías';
         break;
      case 'unidadMedida':
         $tituloPagina.innerHTML = 'Unidades de medida';
         $tituloCard.innerHTML = 'Unidades de medida';
         break;
      default:
         break;
   }
}

// Inserta tabla de 'productos, unidades de medida, marcas y categorías
const listarTable = function listarTable(json) {
   if (document.getElementById(tipo + '_table') != null) {
      document.getElementById(tipo + '_table').remove();
   }
   if (document.getElementById(tipo + '_table_wrapper') != null) {
      document.getElementById(tipo + '_table_wrapper').remove();
   }
   const $table = document.createElement('table');
   $table.setAttribute('id', tipo + '_table');
   $table.setAttribute('class', 'table table-striped table-bordered dt-responsive nowrap');

   const $thead = document.createElement('thead');
   const $trTitulos = document.createElement('tr');

   let titulosColumnas = [];
   switch (tipo) {
      case 'producto':
         titulosColumnas.push(...[
            'Código',
            'Descripción',
            'Precio de compra',
            'Precio de venta',
            'Stock',
            'Stock mínimo',
            'Unidad de medida',
            'Marca',
            'Categoría',
            'Mantenimiento'
         ]);
         break;
      case 'marca':
         titulosColumnas.push(...[
            'Código',
            'Descripción',
            'Mantenimiento'
         ]);
         break;
      case 'categoria':
         titulosColumnas.push(...[
            'Código',
            'Descripción',
            'Mantenimiento'
         ]);
         break;
      case 'unidadMedida':
         titulosColumnas.push(...[
            'Código',
            'Descripción',
            'Mantenimiento'
         ]);
         break;
      default:
         break;
   }

   titulosColumnas.forEach(element => {
      let $td = document.createElement('td');
      $td.innerHTML = element;
      $trTitulos.appendChild($td);
   });

   $thead.appendChild($trTitulos);

   const $tbody = document.createElement('tbody');

   json.forEach((elemento) => {
      let $tr = document.createElement('tr');
      $tr.setAttribute('id', elemento.codigo);
      for (const [clave, valor] of Object.entries(elemento)) {
         console.log(elemento);
         let crear = true;
         let $td = document.createElement('td');
         switch (clave) {
            /*case 'unidad_medida_id':
               $td.setAttribute('value', elemento.unidad_medida_codigo);
               $td.innerHTML = elemento.unidad_medida_descripcion;
               break;
            case 'marca_id':
               $td.setAttribute('value', elemento.marca_codigo);
               $td.innerHTML = elemento.marca_descripcion;
               break;
            case 'categoria_id':
               $td.setAttribute('value', elemento.categoria_codigo);
               $td.innerHTML = elemento.categoria_descripcion;
               break;*/
            case 'unidad_medida_codigo':
               $td.setAttribute('value', valor);
               $td.innerHTML = elemento.unidad_medida_descripcion;
               break;
            case 'marca_codigo':
               $td.setAttribute('value', valor);
               $td.innerHTML = elemento.marca_descripcion;
               break;
            case 'categoria_codigo':
               $td.setAttribute('value', valor);
               $td.innerHTML = elemento.categoria_descripcion;
               break;
            case 'unidad_medida_descripcion':
            case 'marca_descripcion':
            case 'categoria_descripcion':
               crear = false;
               break;
            default:
               $td.innerHTML = valor;
               break;
         }
         if (crear) {
            $tr.appendChild($td);
         }
         crear = true;
      }

      let $td = document.createElement('td');
      let $btnEditar = document.createElement('button');
      $btnEditar.setAttribute('type', 'button');
      $btnEditar.setAttribute('name', elemento.codigo);
      $btnEditar.setAttribute('class', 'btn btn-warning editar');
      $btnEditar.setAttribute('data-toggle', 'modal');
      $btnEditar.setAttribute('data-target', '#modal');
      $btnEditar.setAttribute('onclick', 'editar(this)');
      $btnEditar.style.marginRight = '10px';
      /*$btnEditar.addEventListener('click', function() {
         editar(this);
      });*/
      let $iconEdit = document.createElement('i');
      $iconEdit.setAttribute('class', 'fas fa-edit');
      $btnEditar.appendChild($iconEdit);

      let $btnEliminar = document.createElement('button');
      $btnEliminar.setAttribute('type', 'button');
      $btnEliminar.setAttribute('id', 'eliminar' + elemento.codigo);
      $btnEliminar.setAttribute('class', 'btn btn-danger eliminar');
      $btnEliminar.setAttribute('onclick', 'eliminar(this)');
      /*$btnEliminar.addEventListener('click', function() {
         eliminar(this);
      });*/
      let $iconDelete = document.createElement('i');
      $iconDelete.setAttribute('class', 'fas fa-trash-alt');
      $btnEliminar.appendChild($iconDelete);

      $td.appendChild($btnEditar);
      $td.appendChild($btnEliminar);

      $tr.appendChild($td);

      $fragment.appendChild($tr);
   });

   $tbody.appendChild($fragment);

   const $tfoot = document.createElement('tfoot');
   const $trSubtitulos = document.createElement('tr');

   titulosColumnas.forEach(element => {
      let $td = document.createElement('td');
      $td.innerHTML = element;
      $trSubtitulos.appendChild($td);
   });

   $tfoot.appendChild($trSubtitulos);

   $table.appendChild($thead);
   $table.appendChild($tbody);
   $table.appendChild($tfoot);

   $cuerpoCard.appendChild($table);

   let $tabla = $('#' + tipo + '_table').DataTable({
      responsive: true,
      autoWidth: false,
      lengthChange: false,
      dom: 'Bfrtip',
      buttons:
         [
            {
               extend: 'copy',
               title: capitalizeFirstLetter(tipo),
               exportOptions: {
                  columns: (tipo == 'producto') ? [0, 1, 2, 3, 4, 5, 6, 7, 8] : [0, 1, 2]
               }
            },
            {
               extend: 'excel',
               title: capitalizeFirstLetter(tipo),
               exportOptions: {
                  columns: (tipo == 'producto') ? [0, 1, 2, 3, 4, 5, 6, 7, 8] : [0, 1, 2]
               }
            },
            {
               extend: 'pdf',
               title: capitalizeFirstLetter(tipo),
               exportOptions: {
                  columns: (tipo == 'producto') ? [0, 1, 2, 3, 4, 5, 6, 7, 8] : [0, 1, 2]
               }
            },
            {
               extend: 'print',
               title: capitalizeFirstLetter(tipo),
               exportOptions: {
                  columns: (tipo == 'producto') ? [0, 1, 2, 3, 4, 5, 6, 7, 8] : [0, 1, 2]
               }
            }
         ],
      language: {
         "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
      }
   });

   $tabla.buttons().container()
      .appendTo('#' + tipo + '_table_wrapper .col-md-6:eq(0)');
}

// Inicializa panel de usuario
const cambiarContrasenia = async function cambiarContrasenia() {
   let form = new FormData(document.getElementById('formUser'));
   try {
      loading();
      let options = {
         method: 'POST',
         body: form
      },
         response = await fetch('/primer_proyecto/users/update', options),
         json = await response.json();
      if (!response.ok) {
         throw {
            status: response.status,
            statusText: response.statusText
         };
      }

      console.log(json);
      document.getElementById('txtPasswordAntigua').value = '';
      document.getElementById('txtPasswordNueva').value = '';

      // Código para mostrar resultado
      const $divAlert = document.createElement('div');
      if (json[0] == 'EXITO') {
         $divAlert.setAttribute('class', 'alert alert-dismissible fade show alert-success');
      } else {
         $divAlert.setAttribute('class', 'alert alert-dismissible fade show alert-danger');
      }
      $divAlert.setAttribute('role', 'alert');
      const $iconCheck = document.createElement('i');
      if (json[0] == 'EXITO') {
         $iconCheck.setAttribute('class', 'fas fa-check-circle');
      } else {
         $iconCheck.setAttribute('class', 'fas fa-exclamation-triangle');
      }
      const $mensaje = document.createTextNode(' ' + json[1]);
      const $btnClose = document.createElement('button');
      $btnClose.setAttribute('type', 'button');
      $btnClose.setAttribute('class', 'close');
      $btnClose.setAttribute('data-dismiss', 'alert');
      $btnClose.setAttribute('aria-label', 'Close');
      const $span = document.createElement('span');
      $span.setAttribute('aria-hidden', 'true');
      $span.innerHTML = "&times;";

      $btnClose.appendChild($span);
      $divAlert.appendChild($iconCheck);
      $divAlert.appendChild($mensaje);
      $divAlert.appendChild($btnClose);

      // Mostrar alerta de éxito o de error en POST
      $cuerpoCard.insertBefore($divAlert, document.getElementById('modal'));
      setTimeout(() => {
         $('.alertaResultado').alert('close');
      }, 3000);

      removeLoading();
   } catch (error) {
      let message = error.statusText || "Ocurrió un error";
      $cuerpoCard.innerHTML = error;
   }
}

const validarFormUsuario = function validarFormUsuario() {
   var $inputsList = [];
   var errorList = [];

   let $form = document.getElementById('formUser');
   $inputsList = $form.getElementsByTagName('input');

   for (const $input of $inputsList) {
      switch ($input.name) {
         case 'txtPasswordAntigua':
            if ($input.value == '') {
               errorList.push('La contraseña antigua es obligatoria.');
            }
            break;
         case 'txtPasswordNueva':
            if ($input.value == '') {
               errorList.push('La nueva contraseña es obligatoria.');
            }
            break;
         default:
            break;
      }
   }

   if (errorList.length != 0) {
      var summary = "";
      errorList.forEach(error => {
         summary += "<li>" + error + "</li>";
      });

      console.log("Entró error list");
      console.log(summary);
      quitarAlerta();

      const $errorDiv = document.createElement('div');
      $errorDiv.setAttribute('id', 'errorDiv');
      $errorDiv.setAttribute('class', 'alert alert-danger alert-dismissible fade show');
      $errorDiv.setAttribute('role', 'alert');
      const $ul = document.createElement('ul');
      $ul.setAttribute('id', 'listaErrores');
      const $button = document.createElement('button');
      $button.setAttribute('type', 'button');
      $button.setAttribute('class', 'close');
      $button.setAttribute('data-dismiss', 'alert');
      $button.setAttribute('aria-label', 'Close');
      const $span = document.createElement('span');
      $span.setAttribute('aria-hidden', 'true');
      $span.innerHTML = "&times;";
      $button.appendChild($span);
      $errorDiv.appendChild($ul);
      $errorDiv.appendChild($button);

      document.getElementById('filaErrorUser').appendChild($errorDiv);
      document.getElementById('listaErrores').innerHTML = summary;

      return false;
   } else {
      return true;
   }
}

const panelUsuario = async function panelUsuario() {
   try {
      loading();

      let response = await fetch('/primer_proyecto/users/user');

      titulo();
      activarSideBar();
      vaciarPlantilla();

      if (!response.ok) {
         throw {
            status: response.status,
            statusText: response.statusText
         };
      }

      let json = await response.json();

      const $formUsuario = document.createElement('form');
      $formUsuario.setAttribute('id', 'formUser');

      const $formGroup0 = document.createElement('div');
      $formGroup0.setAttribute('id', 'filaErrorUser');

      const $formGroup1 = document.createElement('div');
      $formGroup1.setAttribute('class', 'form-group col-md-6');
      const $label1 = document.createElement('label');
      $label1.innerHTML = 'Nombre de usuario';
      const $br1 = document.createElement('br');
      const $username = document.createTextNode(json.username);
      $formGroup1.appendChild($label1);
      $formGroup1.appendChild($br1);
      $formGroup1.appendChild($username);

      const $formGroup2 = document.createElement('div');
      $formGroup2.setAttribute('class', 'form-group col-md-6');
      const $label2 = document.createElement('label');
      $label2.setAttribute('for', 'txtPasswordAntigua');
      $label2.innerHTML = 'Contraseña antigua';
      const $inputPasswordAntigua = document.createElement('input');
      $inputPasswordAntigua.setAttribute('type', 'password');
      $inputPasswordAntigua.setAttribute('name', 'txtPasswordAntigua');
      $inputPasswordAntigua.setAttribute('class', 'form-control');
      $inputPasswordAntigua.setAttribute('id', 'txtPasswordAntigua');
      $formGroup2.appendChild($label2);
      $formGroup2.appendChild($inputPasswordAntigua);

      const $formGroup3 = document.createElement('div');
      $formGroup3.setAttribute('class', 'form-group col-md-6');
      const $label3 = document.createElement('label');
      $label3.setAttribute('for', 'txtPasswordNueva');
      $label3.innerHTML = 'Nueva contraseña';
      const $inputPasswordNueva = document.createElement('input');
      $inputPasswordNueva.setAttribute('type', 'password');
      $inputPasswordNueva.setAttribute('name', 'txtPasswordNueva');
      $inputPasswordNueva.setAttribute('class', 'form-control');
      $inputPasswordNueva.setAttribute('id', 'txtPasswordNueva');
      $formGroup3.appendChild($label3);
      $formGroup3.appendChild($inputPasswordNueva);

      const $formGroup4 = document.createElement('div');
      $formGroup4.setAttribute('class', 'form-group col-md-6');
      const $aLogout = document.createElement('a');
      $aLogout.setAttribute('href', '/primer_proyecto/users/logout');
      $aLogout.setAttribute('type', 'button');
      $aLogout.setAttribute('class', 'btn btn-danger');
      $aLogout.style.marginRight = '10px';
      $aLogout.innerHTML = 'Cerrar sesión';

      const $btnSubmit = document.createElement('input');
      $btnSubmit.setAttribute('id', 'btnActualizar');
      $btnSubmit.setAttribute('type', 'submit');
      $btnSubmit.setAttribute('class', 'btn btn-primary');
      $btnSubmit.setAttribute('value', 'Cambiar contraseña');

      $formGroup4.appendChild($aLogout);
      $formGroup4.appendChild($btnSubmit);

      $formUsuario.appendChild($formGroup0);
      $formUsuario.appendChild($formGroup1);
      $formUsuario.appendChild($formGroup2);
      $formUsuario.appendChild($formGroup3);
      /*$formUsuario.appendChild($aLogout);
      $formUsuario.appendChild($inputSubmit);*/
      $formUsuario.appendChild($formGroup4);

      $cuerpoCard.appendChild($formUsuario);
      $formUsuario.addEventListener('submit', function (event) {
         event.preventDefault();
         if (validarFormUsuario()) {
            cambiarContrasenia();
         }
      });

      removeLoading();

   } catch (error) {
      let code = error.status;
      let message = error.statusText || "Ocurrió un error";
      $cuerpoCard.innerHTML = code + ' - ' + message;
      removeLoading();
   }
   
}

// Agregar cargando
const loading = function loading() {
   const $contenedorCarga = document.getElementById('contenedor_carga');
   $contenedorCarga.style.visibility = 'visible';
}

// Quitar cargando
const removeLoading = function removeLoading() {
   const $contenedorCarga = document.getElementById('contenedor_carga');
   $contenedorCarga.style.visibility = 'hidden';
}

// Simula cambio entre páginas (actualiza títulos, activa la SideBar, inserta formulario, inserta botón de nuevo registro y lista los registros en una tabla)
const getPage = async () => {
   try {
      if (tipo != 'usuario') {
         loading();

         titulo();
         activarSideBar();
         vaciarPlantilla();
         
         let response = await fetch('/primer_proyecto/' + tipo + '/index');

         if (!response.ok) {
            throw {
               status: response.status,
               statusText: response.statusText
            };
         }

         let json = await response.json();

         formulario();
         btnAgregar();
         listarTable(json);

         removeLoading();
      } else {
         panelUsuario();
      }

   } catch (error) {
      let code = error.status;
      let message = error.statusText || "Ocurrió un error";
      $cuerpoCard.innerHTML = code + ' - ' + message;
      removeLoading();
   }
}

// Inicializa LeftBar y SideBar
function inicializarBotonesDireccion() {
   $btnSBIindex.addEventListener('click', function () {
      tipo = 'index';
      index();
   });
   $btnSBUsuario.addEventListener('click', function () {
      tipo = 'usuario';
      //vaciarPlantilla();
      getPage();
   });
   $btnSBProducto.addEventListener('click', function () {
      tipo = 'producto';
      //vaciarPlantilla();
      getPage();
   });
   $btnSBMarca.addEventListener('click', function () {
      tipo = 'marca';
      //vaciarPlantilla();
      getPage();
   });
   $btnSBCategoria.addEventListener('click', function () {
      tipo = 'categoria';
      //vaciarPlantilla();
      getPage();
   });
   $btnSBUnidadMedida.addEventListener('click', function () {
      tipo = 'unidadMedida';
      //vaciarPlantilla();
      getPage();
   });
   $btnLBIindex.addEventListener('click', function () {
      tipo = 'index';
      //vaciarPlantilla();
      index();
   })
   $btnLBProducto.addEventListener('click', function () {
      tipo = 'producto';
      //vaciarPlantilla();
      getPage();
   });
   $btnLBMarca.addEventListener('click', function () {
      tipo = 'marca';
      //vaciarPlantilla();
      getPage();
   });
   $btnLBCategoria.addEventListener('click', function () {
      tipo = 'categoria';
      //vaciarPlantilla();
      getPage();
   });
   $btnLBUnidadMedida.addEventListener('click', function () {
      tipo = 'unidadMedida';
      //vaciarPlantilla();
      getPage();
   });
}
inicializarBotonesDireccion();


// Al hacer click muestra modal en modo "Agregar registro"
const agregar = function agregar() {
   document.getElementById("modalTitulo").innerHTML = "Agregar " + tipo;
   let campos = [];
   switch (tipo) {
      case 'producto':
         campos.push(...[
            'txtCodigo',
            'txtDescripcion',
            'txtPrecioCompra',
            'txtPrecioVenta',
            'txtStock',
            'txtStockMinimo',
            'txtUnidadMedida',
            'txtMarca',
            'txtCategoria'
         ]);
         break;
      case 'marca':
         campos.push(...[
            'txtCodigo',
            'txtDescripcion'
         ]);
         break;
      case 'categoria':
         campos.push(...[
            'txtCodigo',
            'txtDescripcion'
         ]);
         break;
      case 'unidadMedida':
         campos.push(...[
            'txtCodigo',
            'txtDescripcion'
         ]);
         break;
      default:
         break;
   }
   campos.forEach(element => {
      document.getElementById(element).value = '';
   });
   if (tipo == 'producto') {
      vaciarListas();
   }
   quitarAlerta();
   document.getElementById("btnAceptar").value = 'Registrar';
}

// Al hacer click muestra modal en modo "Editar registro"
const editar = function editar(element) {
   document.getElementById("modalTitulo").innerHTML = "Editar " + tipo;
   $fila = document.getElementById(element.name);
   $columnas = $fila.children;
   console.log($columnas);
   switch (tipo) {
      case 'producto':
         let producto = {
            codigo: $columnas[0].innerHTML,
            descripcion: $columnas[1].innerHTML,
            precio_compra: $columnas[2].innerHTML,
            precio_venta: $columnas[3].innerHTML,
            stock: $columnas[4].innerHTML,
            stock_minimo: $columnas[5].innerHTML,
            unidad_medida: $columnas[6].getAttribute('value') + ' - ' + $columnas[6].innerHTML,
            marca: $columnas[7].getAttribute('value') + ' - ' + $columnas[7].innerHTML,
            categoria: $columnas[8].getAttribute('value') + ' - ' + $columnas[8].innerHTML
         }

         document.getElementById("txtCodigo").setAttribute('value', producto.codigo);
         document.getElementById("txtDescripcion").value = producto.descripcion;
         document.getElementById("txtPrecioCompra").value = producto.precio_compra;
         document.getElementById("txtPrecioVenta").value = producto.precio_venta;
         document.getElementById("txtStock").value = producto.stock;
         document.getElementById("txtStockMinimo").value = producto.stock_minimo;

         const $txtUnidadMedida = document.getElementById('txtUnidadMedida');
         $txtUnidadMedida.readOnly = true;
         $txtUnidadMedida.value = producto.unidad_medida;
         document.getElementById('btnCambiarUnidadMedida').hidden = false;

         const $txtMarca = document.getElementById('txtMarca');
         $txtMarca.readOnly = true;
         $txtMarca.value = producto.marca;
         document.getElementById('btnCambiarMarca').hidden = false;

         const $txtCategoria = document.getElementById('txtCategoria');
         $txtCategoria.readOnly = true;
         $txtCategoria.value = producto.categoria;
         document.getElementById('btnCambiarCategoria').hidden = false;
         break;
      case 'marca':
         let marca = {
            codigo: $columnas[0].innerHTML,
            descripcion: $columnas[1].innerHTML
         }

         document.getElementById("txtCodigo").setAttribute('value', marca.codigo);
         document.getElementById("txtDescripcion").value = marca.descripcion;
         break;
      case 'categoria':
         let categoria = {
            codigo: $columnas[0].innerHTML,
            descripcion: $columnas[1].innerHTML
         }

         document.getElementById("txtCodigo").setAttribute('value', categoria.codigo);
         document.getElementById("txtDescripcion").value = categoria.descripcion;
         break;
      case 'unidadMedida':
         let unidadMedida = {
            codigo: $columnas[0].innerHTML,
            descripcion: $columnas[1].innerHTML
         }

         document.getElementById("txtCodigo").setAttribute('value', unidadMedida.codigo);
         document.getElementById("txtDescripcion").value = unidadMedida.descripcion;
         break;
      default:
         break;
   }

   quitarAlerta();
   document.getElementById("btnAceptar").value = 'Actualizar';
}

// Quitar alerta de error del modal
function quitarAlerta() {
   if (document.getElementById('errorDiv')) {
      document.getElementById('filaError').removeChild(document.getElementById('errorDiv'));
   }
}

// Al hacer click elimina el registro y actualiza la página
const eliminar = async function eliminar(element) {
   let $codigo = element.getAttribute('id').substring(8);
   loading();

   try {
      let options = {
         method: 'POST',
         body: JSON.stringify({ codigo: $codigo }),
         headers: {
            'Content-Type': 'application/json'
         }
      },
         response = await fetch('/primer_proyecto/' + tipo + '/destroy', options);

      if (!response.ok) {
         throw {
            status: response.status,
            statusText: response.statusText
         };
      }

      let json = await response.json();

      // Código para mostrar resultado
      const $divAlert = document.createElement('div');
      if (json[0] == 'EXITO') {
         $divAlert.setAttribute('class', 'alert alert-dismissible fade show alert-success');
      } else {
         $divAlert.setAttribute('class', 'alert alert-dismissible fade show alert-danger');
      }
      $divAlert.setAttribute('role', 'alert');
      const $iconCheck = document.createElement('i');
      if (json[0] == 'EXITO') {
         $iconCheck.setAttribute('class', 'fas fa-check-circle');
      } else {
         $iconCheck.setAttribute('class', 'fas fa-exclamation-triangle');
      }
      const $mensaje = document.createTextNode(' ' + json[1]);
      const $btnClose = document.createElement('button');
      $btnClose.setAttribute('type', 'button');
      $btnClose.setAttribute('class', 'close alertaResultado');
      $btnClose.setAttribute('data-dismiss', 'alert');
      $btnClose.setAttribute('aria-label', 'Close');
      const $span = document.createElement('span');
      $span.setAttribute('aria-hidden', 'true');
      $span.innerHTML = "&times;";

      $btnClose.appendChild($span);
      $divAlert.appendChild($iconCheck);
      $divAlert.appendChild($mensaje);
      $divAlert.appendChild($btnClose);

      // Actualizar página
      getPage();

      // Mostrar alerta de éxito o de error en DELETE
      $cuerpoCard.insertBefore($divAlert, document.getElementById('modal'));
      setTimeout(() => {
         $('.alertaResultado').alert('close');
      }, 3000);
      
   } catch (error) {
      let code = error.status;
      let message = error.statusText || "Ocurrió un error";
      $cuerpoCard.innerHTML = code + ' - ' + message;
      removeLoading();
   }
}

// Cuando se envía formulario, se ejecuta
const submit = async function submit() {
   let form = new FormData(document.getElementById('form'));
   const $txtCodigo = document.getElementById('txtCodigo');
   loading();

   if ($txtCodigo.getAttribute('value') == '') {
      // Create - POST
      try {
         let options = {
            method: 'POST',
            body: form
         },
            response = await fetch('/primer_proyecto/' + tipo + '/store', options);

         if (!response.ok) {
            throw {
               status: response.status,
               statusText: response.statusText
            };
         }

         let json = await response.json();

         // Código para mostrar resultado
         const $divAlert = document.createElement('div');
         if (json[0] == 'EXITO') {
            $divAlert.setAttribute('class', 'alert alertaResultado alert-dismissible fade show alert-success');
         } else {
            $divAlert.setAttribute('class', 'alert alertaResultado alert-dismissible fade show alert-danger');
         }
         $divAlert.setAttribute('role', 'alert');
         const $iconCheck = document.createElement('i');
         if (json[0] == 'EXITO') {
            $iconCheck.setAttribute('class', 'fas fa-check-circle');
         } else {
            $iconCheck.setAttribute('class', 'fas fa-exclamation-triangle');
         }
         const $mensaje = document.createTextNode(' ' + json[1]);
         const $btnClose = document.createElement('button');
         $btnClose.setAttribute('type', 'button');
         $btnClose.setAttribute('class', 'close');
         $btnClose.setAttribute('data-dismiss', 'alert');
         $btnClose.setAttribute('aria-label', 'Close');
         const $span = document.createElement('span');
         $span.setAttribute('aria-hidden', 'true');
         $span.innerHTML = "&times;";

         $btnClose.appendChild($span);
         $divAlert.appendChild($iconCheck);
         $divAlert.appendChild($mensaje);
         $divAlert.appendChild($btnClose);

         $('#modal').modal('hide');

         // Listar elementos
         getPage();

         // Mostrar alerta de éxito o de error en POST
         $cuerpoCard.insertBefore($divAlert, document.getElementById('modal'));
         setTimeout(() => {
            $('.alertaResultado').alert('close');
         }, 3000);     

      } catch (error) {
         let code = error.status;
         let message = error.statusText || "Ocurrió un error";
         $cuerpoCard.innerHTML = code + ' - ' + message;
         removeLoading();
      }
   } else {
      // Create - POST
      try {
         let options = {
               method: 'POST',
               body: form
            },
            response = await fetch('/primer_proyecto/' + tipo + '/update', options);

         if (!response.ok) {
            throw {
               status: response.status,
               statusText: response.statusText
            };
         }

         let json = await response.json();

         // Código para mostrar resultado
         const $divAlert = document.createElement('div');
         if (json[0] == 'EXITO') {
            $divAlert.setAttribute('class', 'alert alertaResultado alert-dismissible fade show alert-success');
         } else {
            $divAlert.setAttribute('class', 'alert alertaResultado alert-dismissible fade show alert-danger');
         }
         $divAlert.setAttribute('role', 'alert');
         const $iconCheck = document.createElement('i');
         if (json[0] == 'EXITO') {
            $iconCheck.setAttribute('class', 'fas fa-check-circle');
         } else {
            $iconCheck.setAttribute('class', 'fas fa-exclamation-triangle');
         }
         const $mensaje = document.createTextNode(' ' + json[1]);
         const $btnClose = document.createElement('button');
         $btnClose.setAttribute('type', 'button');
         $btnClose.setAttribute('class', 'close');
         $btnClose.setAttribute('data-dismiss', 'alert');
         $btnClose.setAttribute('aria-label', 'Close');
         const $span = document.createElement('span');
         $span.setAttribute('aria-hidden', 'true');
         $span.innerHTML = "&times;";

         $btnClose.appendChild($span);
         $divAlert.appendChild($iconCheck);
         $divAlert.appendChild($mensaje);
         $divAlert.appendChild($btnClose);

         $('#modal').modal('hide');

         // Listar elementos
         getPage();

         // Mostrar alerta de éxito o de error en PUT
         $cuerpoCard.insertBefore($divAlert, document.getElementById('modal'));
         setTimeout(() => {
            $('.alertaResultado').alert('close');
         }, 3000);
      } catch (error) {
         let code = error.status;
         let message = error.statusText || "Ocurrió un error";
         $cuerpoCard.innerHTML = code + ' - ' + message;
         removeLoading();
      }
   }
}

// ********   AUTOCOMPLETE SEARCH BARS   ********
const autocompleteSearchBars = function autocompleteSearchBars() {
   const $txtUnidadMedida = document.getElementById('txtUnidadMedida');
   $txtUnidadMedida.addEventListener('keyup', function () {
      let descripcionUnidadMedida = this.value;
      if (descripcionUnidadMedida != '') {
         //console.log(descripcionUnidadMedida);
         $.ajax({
            url: '/primer_proyecto/unidadmedida/searchUnidadMedida',
            method: 'POST',
            data: {
               descripcionUnidadMedida
            },
            success: function (data) {
               //console.log(data);
               const $unidadMedidaList = document.getElementById('unidadMedidaList');
               $unidadMedidaList.hidden = false;
               $unidadMedidaList.innerHTML = data;
            }
         });
      } else {
         $('#unidadMedidaList').html('');
      }
   });
   const $txtMarca = document.getElementById('txtMarca');
   $txtMarca.addEventListener('keyup', function () {
      let descripcionMarca = this.value;
      if (descripcionMarca != '') {
         //console.log(descripcionMarca);
         $.ajax({
            url: '/primer_proyecto/marca/searchMarca',
            method: 'POST',
            data: {
               descripcionMarca
            },
            success: function (data) {
               //console.log(data);
               const $marcaList = document.getElementById('marcaList');
               $marcaList.hidden = false;
               $marcaList.innerHTML = data;
            }
         });
      } else {
         $('#marcaList').html('');
      }
   });
   const $txtCategoria = document.getElementById('txtCategoria');
   $txtCategoria.addEventListener('keyup', function () {
      let descripcionCategoria = this.value;
      if (descripcionCategoria != '') {
         //console.log(descripcionCategoria);
         $.ajax({
            url: '/primer_proyecto/categoria/searchCategoria',
            method: 'POST',
            data: {
               descripcionCategoria
            },
            success: function (data) {
               //console.log(data);
               const $categoriaList = document.getElementById('categoriaList');
               $categoriaList.hidden = false;
               $categoriaList.innerHTML = data;
            }
         });
      } else {
         $('#categoriaList').html('');
      }
   });

   const $btnCambiarUnidadMedida = document.getElementById('btnCambiarUnidadMedida');
   $btnCambiarUnidadMedida.addEventListener('click', function () {
      vaciarUnidadMedida();
   });
   const $btnCambiarMarca = document.getElementById('btnCambiarMarca');
   $btnCambiarMarca.addEventListener('click', function () {
      vaciarMarca();
   });
   const $btnCambiarCategoria = document.getElementById('btnCambiarCategoria');
   $btnCambiarCategoria.addEventListener('click', function () {
      vaciarCategoria();
   });
}
// Vaciar los seleccionados
function vaciarListas() {
   vaciarUnidadMedida();
   vaciarMarca();
   vaciarCategoria();
}
function vaciarUnidadMedida() {
   const $txtUnidadMedida = document.getElementById('txtUnidadMedida');
   $txtUnidadMedida.value = '';
   $txtUnidadMedida.readOnly = false;

   document.getElementById('btnCambiarUnidadMedida').hidden = true;
}
function vaciarMarca() {
   const $txtMarca = document.getElementById('txtMarca');
   $txtMarca.value = '';
   $txtMarca.readOnly = false;

   document.getElementById('btnCambiarMarca').hidden = true;
}
function vaciarCategoria() {
   const $txtCategoria = document.getElementById('txtCategoria');
   $txtCategoria.value = '';
   $txtCategoria.readOnly = false;

   document.getElementById('btnCambiarCategoria').hidden = true;
}
// Seleccionar listas
function selectname_unidadMedida(selected_value) {
   const $txtUnidadMedida = document.getElementById('txtUnidadMedida');
   $txtUnidadMedida.readOnly = true;
   $txtUnidadMedida.value = selected_value;

   document.getElementById('unidadMedidaList').hidden = true;
   document.getElementById('btnCambiarUnidadMedida').hidden = false;
}
function selectname_marca(selected_value) {
   const $txtMarca = document.getElementById('txtMarca');
   $txtMarca.readOnly = true;
   $txtMarca.value = selected_value;

   document.getElementById('marcaList').hidden = true;
   document.getElementById('btnCambiarMarca').hidden = false;
}
function selectname_categoria(selected_value) {
   const $txtCategoria = document.getElementById('txtCategoria');
   $txtCategoria.readOnly = true;
   $txtCategoria.value = selected_value;

   document.getElementById('categoriaList').hidden = true;
   document.getElementById('btnCambiarCategoria').hidden = false;
}
// ********   FIN - AUTOCOMPLETE SEARCH BARS   ********


// ********   VALIDACIÓN FORMULARIO   ********
function validar() {
   var $inputsList = [];
   var errorList = [];
   const numeroDecimal = /^\d+(?:.\d+)?$/;

   let $form = document.getElementById('form');
   $inputsList = $form.getElementsByTagName('input');

   if (tipo == 'producto') {
      for (const $input of $inputsList) {
         switch ($input.name) {
            case 'txtDescripcion':
               if ($input.value == '') {
                  errorList.push('La descripción es obligatoria.');
               } else {
                  if ($input.value.length > 200) {
                     errorList.push('No puedes superar los 200 caracteres.');
                  }
               }
               break;
            case 'txtPrecioCompra':
               if ($input.value == '') {
                  errorList.push('El precio de compra es obligatorio.');
               } else {
                  if (!numeroDecimal.test($input.value)) {
                     //console.log("NO VALIDO");
                     errorList.push('El precio de compra no es válido');
                  }
               }
               break;
            case 'txtPrecioVenta':
               if ($input.value == '') {
                  errorList.push('El precio de venta es obligatorio.');
               } else {
                  if (!numeroDecimal.test($input.value)) {
                     errorList.push('El precio de venta no es válido');
                  }
               }
               break;
            case 'txtStock':
               if ($input.value == '') {
                  errorList.push('El stock es obligatorio.');
               } else {
                  if (!numeroDecimal.test($input.value)) {
                     errorList.push('El stock no es válido');
                  }
               }
               break;
            case 'txtStockMinimo':
               if ($input.value == '') {
                  errorList.push('El stock mínimo es obligatorio.');
               } else {
                  if (!numeroDecimal.test($input.value)) {
                     errorList.push('El stock mínimo no es válido');
                  }
               }
               break;
            case 'txtMarca':
               if ($input.value == '') {
                  errorList.push('La marca es obligatoria.');
               } else {
                  if (!$input.readOnly) {
                     errorList.push('Debes seleccionar un elemento de la lista');
                  }
               }
               break;
            case 'txtUnidadMedida':
               if ($input.value == '') {
                  errorList.push('La unidad de medida es obligatoria.');
               } else {
                  if (!$input.readOnly) {
                     errorList.push('Debes seleccionar un elemento de la lista');
                  }
               }
               break;
            case 'txtCategoria':
               if ($input.value == '') {
                  errorList.push('La categoría es obligatoria.');
               } else {
                  if (!$input.readOnly) {
                     errorList.push('Debes seleccionar un elemento de la lista');
                  }
               }
               break;
            default:
               break;
         }
      }
   } else {
      for (const $input of $inputsList) {
         switch ($input.name) {
            case 'txtDescripcion':
               if ($input.value == '') {
                  errorList.push('La descripción es obligatoria.');
               } else {
                  if ($input.value.length > 100) {
                     errorList.push('No puedes superar los 100 caracteres.');
                  }
               }
               break;
            default:
               break;
         }
      }
   }

   if (errorList.length != 0) {
      var summary = "";
      errorList.forEach(error => {
         summary += "<li>" + error + "</li>";
      });
      //console.log(summary);

      quitarAlerta();

      const $errorDiv = document.createElement('div');
      $errorDiv.setAttribute('id', 'errorDiv');
      $errorDiv.setAttribute('class', 'alert alert-danger alert-dismissible fade show');
      $errorDiv.setAttribute('role', 'alert');
      const $ul = document.createElement('ul');
      $ul.setAttribute('id', 'listaErrores');
      const $button = document.createElement('button');
      $button.setAttribute('type', 'button');
      $button.setAttribute('class', 'close');
      $button.setAttribute('data-dismiss', 'alert');
      $button.setAttribute('aria-label', 'Close');
      const $span = document.createElement('span');
      $span.setAttribute('aria-hidden', 'true');
      $span.innerHTML = "&times;";
      $button.appendChild($span);
      $errorDiv.appendChild($ul);
      $errorDiv.appendChild($button);

      document.getElementById('filaError').appendChild($errorDiv);
      document.getElementById('listaErrores').innerHTML = summary;

      return false;
   } else {
      return true;
   }
}
// ********   FIN - VALIDACIÓN FORMULARIO   ********

const vaciarPlantilla = function vaciarPlantilla() {
   while ($cuerpoCard.firstChild) {
      $cuerpoCard.removeChild($cuerpoCard.firstChild);
   }

   const $modal = document.createElement('div');
   $modal.setAttribute('class', 'modal fade');
   $modal.setAttribute('id', 'modal');
   $modal.setAttribute('tabindex', '-1');
   $modal.setAttribute('role', 'dialog');
   $modal.setAttribute('aria-labelledby', 'modalTitulo');
   $modal.setAttribute('aria-hidden', 'true');
   const $modalDialog = document.createElement('div');
   $modalDialog.setAttribute('class', 'modal-dialog modal-dialog-centered');
   $modalDialog.setAttribute('role', 'document');
   const $modalContent = document.createElement('div');
   $modalContent.setAttribute('class', 'modal-content');
   const $modalHeader = document.createElement('div');
   $modalHeader.setAttribute('class', 'modal-header');
   const $modalTitle = document.createElement('h5');
   $modalTitle.setAttribute('class', 'modal-title');
   $modalTitle.setAttribute('id', 'modalTitulo');
   const $btnClose = document.createElement('button');
   $btnClose.setAttribute('type', 'button');
   $btnClose.setAttribute('class', 'close');
   $btnClose.setAttribute('data-dismiss', 'modal');
   $btnClose.setAttribute('aria-label', 'Close');
   const $span = document.createElement('span');
   $span.setAttribute('aria-hidden', 'true');
   $span.innerHTML = "&times;";
   $btnClose.appendChild($span);
   $modalHeader.appendChild($modalTitle);
   $modalHeader.appendChild($btnClose);
   const $form = document.createElement('form');
   $form.setAttribute('id', 'form');
   const $modalBody = document.createElement('div');
   $modalBody.setAttribute('id', 'modalBody');
   $modalBody.setAttribute('class', 'modal-body');
   const $filaError = document.createElement('div');
   $filaError.setAttribute('id', 'filaError');
   $modalBody.appendChild($filaError);
   const $modalFooter = document.createElement('div');
   $modalFooter.setAttribute('class', 'modal-footer');
   const $btnCancelar = document.createElement('button');
   $btnCancelar.setAttribute('type', 'button');
   $btnCancelar.setAttribute('class', 'btn btn-secondary');
   $btnCancelar.setAttribute('data-dismiss', 'modal');
   $btnCancelar.innerHTML = 'Cancelar';
   const $btnAceptar = document.createElement('input');
   $btnAceptar.setAttribute('id', 'btnAceptar');
   $btnAceptar.setAttribute('type', 'submit');
   $btnAceptar.setAttribute('class', 'btn btn-primary');
   $modalFooter.appendChild($btnCancelar);
   $modalFooter.appendChild($btnAceptar);
   $form.appendChild($modalBody);
   $form.appendChild($modalFooter);
   $modalContent.appendChild($modalHeader);
   $modalContent.appendChild($form);
   $modalDialog.appendChild($modalContent);
   $modal.appendChild($modalDialog);

   $cuerpoCard.appendChild($modal);
}

const index = async function index() {
   try {
      loading();

      titulo();
      activarSideBar();
      vaciarPlantilla();

      let response = await fetch('/primer_proyecto/index/about');

      if (!response.ok) {
         throw {
            status: response.status,
            statusText: response.statusText
         };
      }

      let json = await response.json();
      const $lorem = document.createTextNode(json);
      $cuerpoCard.appendChild($lorem);

      removeLoading();

   } catch (error) {
      let code = error.status;
      let message = error.statusText || "Ocurrió un error";
      $cuerpoCard.innerHTML = code + ' - ' + message;
      removeLoading();
   }
}

window.addEventListener("load", function() {
   index();
});
