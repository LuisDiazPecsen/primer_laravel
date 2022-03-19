<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<!-- JQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- AdminLTE -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js">
</script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>

<script type="text/javascript">
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
            case 'usuarios':
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
            case 'unidadmedida':
                $btnSBUnidadMedida.classList.add('active');
                break;
            default:
                break;
        }
    }

    // Actualizar títulos del index.php
    function titulo() {
        switch (tipo) {
            case 'index':
                $tituloPagina.innerHTML = 'Inicio';
                $tituloCard.innerHTML = 'Inicio';
                break;
            case 'usuarios':
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
            case 'unidadmedida':
                $tituloPagina.innerHTML = 'Unidades de medida';
                $tituloCard.innerHTML = 'Unidades de medida';
                break;
            default:
                break;
        }
    }

    // Inserta tabla de productos, unidades de medida, marcas y categorías
    const listarTable = function listarTable(respuesta) {
        $cuerpoCard.innerHTML = respuesta.html;
        document.getElementById('btnAgregar').addEventListener('click', function() {
            agregar();
        });

        // Recorrer registros
        respuesta.registros.forEach((elemento) => {
            // Crear fila para registro:
            let $tr = document.createElement('tr');
            $tr.setAttribute('id', elemento.codigo);
            // Recorrer columnas del registro:
            for (const [clave, valor] of Object.entries(elemento)) {
                console.log(elemento);
                let crear = true;
                let $td = document.createElement('td');
                switch (clave) {
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

            // *** COLUMNA MANTENIMIENTO ***
            let $td = document.createElement('td');

            // Botón editar:
            let $btnEditar = document.createElement('button');
            $btnEditar.setAttribute('type', 'button');
            $btnEditar.setAttribute('value', elemento.codigo);
            $btnEditar.setAttribute('class', 'btn btn-warning editar');
            $btnEditar.setAttribute('data-toggle', 'modal');
            $btnEditar.setAttribute('data-target', '#modal');
            $btnEditar.setAttribute('onclick', 'editar(this)');
            $btnEditar.style.marginRight = '10px';
            let $iconEdit = document.createElement('i');
            $iconEdit.setAttribute('class', 'fas fa-edit');
            $btnEditar.appendChild($iconEdit);

            // Botón eliminar:
            let $btnEliminar = document.createElement('button');
            $btnEliminar.setAttribute('type', 'button');
            $btnEliminar.setAttribute('value', elemento.codigo);
            $btnEliminar.setAttribute('class', 'btn btn-danger eliminar');
            $btnEliminar.setAttribute('onclick', 'eliminar(this)');
            let $iconDelete = document.createElement('i');
            $iconDelete.setAttribute('class', 'fas fa-trash-alt');
            $btnEliminar.appendChild($iconDelete);

            $td.appendChild($btnEditar);
            $td.appendChild($btnEliminar);

            // *** FIN - COLUMNA MANTENIMIENTO ***

            $tr.appendChild($td);
            $fragment.appendChild($tr);
        });

        // Agregar filas en el cuerpo de tabla
        document.getElementById('tbody').appendChild($fragment);

        // DataTables:
        let $tabla = $('#' + tipo + '_table').DataTable({
            responsive: true,
            autoWidth: false,
            lengthChange: false,
            dom: 'Bfrtip',
            buttons: [{
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
            $formUsuario.addEventListener('submit', function(event) {
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

                let options = {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                };

                let response;
                switch (tipo) {
                    case 'producto':
                        response = await fetch("{{ route('producto.index') }}", options);
                        break;
                    case 'marca':
                        response = await fetch("{{ route('marca.index') }}", options);
                        break;
                    case 'categoria':
                        response = await fetch("{{ route('categoria.index') }}", options);
                        break;
                    case 'unidadmedida':
                        response = await fetch("{{ route('unidadmedida.index') }}", options);
                        break;
                    default:
                        break;
                }


                if (!response.ok) {
                    throw {
                        status: response.status,
                        statusText: response.statusText
                    };
                }

                let respuesta = await response.json();
                console.log(respuesta);
                listarTable(respuesta);

                removeLoading();
            } else {
                panelUsuario();
            }

        } catch (error) {
            let code = error.status;
            let message = error.statusText || "Ocurrió un error";
            $cuerpoCard.innerHTML = code + ' - ' + message + " | " + error;
            removeLoading();
        }
    }

    // Inicializa LeftBar y SideBar
    function inicializarBotonesDireccion() {
        $btnSBIindex.addEventListener('click', function() {
            tipo = 'index';
            index();
        });
        $btnSBUsuario.addEventListener('click', function() {
            tipo = 'usuarios';
            //vaciarPlantilla();
            getPage();
        });
        $btnSBProducto.addEventListener('click', function() {
            tipo = 'producto';
            //vaciarPlantilla();
            getPage();
        });
        $btnSBMarca.addEventListener('click', function() {
            tipo = 'marca';
            //vaciarPlantilla();
            getPage();
        });
        $btnSBCategoria.addEventListener('click', function() {
            tipo = 'categoria';
            //vaciarPlantilla();
            getPage();
        });
        $btnSBUnidadMedida.addEventListener('click', function() {
            tipo = 'unidadmedida';
            //vaciarPlantilla();
            getPage();
        });
        $btnLBIindex.addEventListener('click', function() {
            tipo = 'index';
            //vaciarPlantilla();
            index();
        })
        $btnLBProducto.addEventListener('click', function() {
            tipo = 'producto';
            //vaciarPlantilla();
            getPage();
        });
        $btnLBMarca.addEventListener('click', function() {
            tipo = 'marca';
            //vaciarPlantilla();
            getPage();
        });
        $btnLBCategoria.addEventListener('click', function() {
            tipo = 'categoria';
            //vaciarPlantilla();
            getPage();
        });
        $btnLBUnidadMedida.addEventListener('click', function() {
            tipo = 'unidadmedida';
            //vaciarPlantilla();
            getPage();
        });
    }
    inicializarBotonesDireccion();

    const deshabilitarBoton = function deshabilitarBoton() {
        const $btnAgregar = document.getElementById('btnAgregar');
        const $span = document.createElement('span');
        $span.setAttribute('class', 'spinner-border spinner-border-sm');
        $span.setAttribute('role', 'status');
        $span.setAttribute('aria-hidden', 'true');
        const $cargando = document.createTextNode('Cargando...');
        $btnAgregar.setAttribute('disabled');
        $btnAgregar.appendChild($span);
        $btnAgregar.appendChild($cargando);
    }

    const habilitarBoton = function habilitarBoton() {
        const $btnAgregar = document.getElementById('btnAgregar');
        const $iconPlus = document.createElement('i');
        $iconPlus.setAttribute('class', 'fas fa-plus');
        const $agregar = document.createTextNode(' Agregar');
        $btnAgregar.appendChild($iconPlus);
        $btnAgregar.appendChild($agregar);
        $btnAgregar.setAttribute('disabled', 'false');
    }

    // Al hacer click muestra modal en modo "Agregar registro"
    const agregar = async function agregar() {
        try {
            document.getElementById('formularioContenedor').innerHTML = '';
            let options = {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
            };

            let url;
            switch (tipo) {
                case 'producto':
                    url = "{{ route('producto.create') }}";
                    break;
                case 'marca':
                    url = "{{ route('marca.create') }}";
                    break;
                case 'categoria':
                    url = "{{ route('categoria.create') }}";
                    break;
                case 'unidadmedida':
                    url = "{{ route('unidadmedida.create') }}";
                    break;
                default:
                    break;
            }

            let response = await fetch(url, options);

            if (!response.ok) {
                throw {
                    status: response.status,
                    statusText: response.statusText
                };
            }

            let respuesta = await response.json();
            document.getElementById('formularioContenedor').innerHTML = respuesta.html;
            document.getElementById("modalTitulo").innerHTML = "Agregar " + tipo;
            document.getElementById("btnAceptar").innerHTML = 'Registrar';
            document.getElementById('btnAceptar').addEventListener('click', function() {
                submit();
            });
        } catch (error) {
            document.getElementById('formularioContenedor').innerHTML = "Se produjo un error";
            document.getElementById("modalTitulo").innerHTML = "Error";
        }
    }

    // Al hacer click muestra modal en modo "Editar registro"
    const editar = async function editar(element) {
        try {
            document.getElementById('formularioContenedor').innerHTML = '';
            let options = {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content'),
                    'Content-Type': 'application/json',
                },
            };

            let id = element.getAttribute('value').substring(1),
                url;

            switch (tipo) {
                case 'producto':
                    url = "{{ route('producto.edit', ':id') }}";
                    break;
                case 'marca':
                    url = "{{ route('marca.edit', ':id') }}";
                    break;
                case 'categoria':
                    url = "{{ route('categoria.edit', ':id') }}";
                    break;
                case 'unidadmedida':
                    url = "{{ route('unidadmedida.edit', ':id') }}";
                    break;
                default:
                    break;
            }

            url = url.replace(':id', id);
            let response = await fetch(url, options);

            if (!response.ok) {
                throw {
                    status: response.status,
                    statusText: response.statusText
                };
            }

            let respuesta = await response.json();
            document.getElementById('formularioContenedor').innerHTML = respuesta.html;
            document.getElementById("modalTitulo").innerHTML = "Editar " + tipo;
            document.getElementById("btnAceptar").value = id;
            document.getElementById('btnAceptar').addEventListener('click', function() {
                submit(this);
            });
        } catch (error) {
            document.getElementById('formularioContenedor').innerHTML = "Se produjo un error";
            document.getElementById("modalTitulo").innerHTML = "Error";
        }
    }

    // Quitar alerta de error del modal
    function quitarAlerta() {
        if (document.getElementById('errorDiv')) {
            document.getElementById('filaError').removeChild(document.getElementById('errorDiv'));
        }
    }

    // Al hacer click elimina el registro y actualiza la página
    const eliminar = async function eliminar(element) {
        loading();

        try {
            let id = element.getAttribute('value').substring(1),
                url;

            switch (tipo) {
                case 'producto':
                    url = "{{ route('producto.destroy', ':id') }}";
                    break;
                case 'marca':
                    url = "{{ route('marca.destroy', ':id') }}";
                    break;
                case 'categoria':
                    url = "{{ route('categoria.destroy', ':id') }}";
                    break;
                case 'unidadmedida':
                    url = "{{ route('unidadmedida.destroy', ':id') }}";
                    break;
                default:
                    break;
            }

            url = url.replace(':id', id);
            let options = {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                        'Content-Type': 'application/json',
                    }
                },
                response = await fetch(url, options);

            if (!response.ok) {
                throw {
                    status: response.status,
                    statusText: response.statusText
                };
            }

            let respuesta = await response.json();

            $('#modal').modal('hide');
            $cuerpoCard.innerHTML = '';

            const $divAlert = document.createElement('div');
            $divAlert.setAttribute('class',
                'alert alertaResultado alert-dismissible fade show alert-success');
            $divAlert.setAttribute('role', 'alert');
            const $iconCheck = document.createElement('i');
            $iconCheck.setAttribute('class', 'fas fa-check-circle');

            const $mensaje = document.createTextNode(' ' + respuesta.message);
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

            // Listar elementos
            options = {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
            };

            switch (tipo) {
                case 'producto':
                    response = await fetch("{{ route('producto.index') }}", options);
                    break;
                case 'marca':
                    response = await fetch("{{ route('marca.index') }}", options);
                    break;
                case 'categoria':
                    response = await fetch("{{ route('categoria.index') }}", options);
                    break;
                case 'unidadmedida':
                    response = await fetch("{{ route('unidadmedida.index') }}", options);
                    break;
                default:
                    break;
            }

            if (!response.ok) {
                throw {
                    status: response.status,
                    statusText: response.statusText
                };
            }

            respuesta = await response.json();
            listarTable(respuesta);

            // Mostrar alerta de éxito o de error en POST
            document.getElementById('divAlerta').appendChild($divAlert);
            setTimeout(() => {
                $('.alertaResultado').alert('close');
            }, 3000);

            removeLoading();
        } catch (error) {
            let code = error.status;
            let message = error.statusText || "Ocurrió un error";
            $cuerpoCard.innerHTML = code + ' - ' + message;
            removeLoading();
        }
    }

    // Cuando se envía formulario, se ejecuta
    const submit = async function submit(element = null) {
        loading();
        let data = {
            txtCodigo: document.getElementById('txtCodigo').value,
            txtDescripcion: document.getElementById('txtDescripcion').value,
        }
        if (tipo == 'producto') {
            data.txtPrecioCompra = document.getElementById('txtPrecioCompra').value;
            data.txtPrecioVenta = document.getElementById('txtPrecioVenta').value;
            data.txtStock = document.getElementById('txtStock').value;
            data.txtStockMinimo = document.getElementById('txtStockMinimo').value;
            data.txtUnidadMedida = document.getElementById('txtUnidadMedida').value;
            data.txtMarca = document.getElementById('txtMarca').value;
            data.txtCategoria = document.getElementById('txtCategoria').value;
            if (document.getElementById('txtUnidadMedida').readOnly) {
                data.listaUnidadMedida = true;
            } else {
                data.listaUnidadMedida = false;
            }
            if (document.getElementById('txtMarca').readOnly) {
                data.listaMarca = true;
            } else {
                data.listaMarca = false;
            }
            if (document.getElementById('txtCategoria').readOnly) {
                data.listaCategoria = true;
            } else {
                data.listaCategoria = false;
            }
        }

        const $txtCodigo = document.getElementById('txtCodigo');

        if ($txtCodigo.value == '') {
            // Store - POST
            try {
                let url;

                switch (tipo) {
                    case 'producto':
                        url = "{{ route('producto.store') }}";
                        break;
                    case 'marca':
                        url = "{{ route('marca.store') }}";
                        break;
                    case 'categoria':
                        url = "{{ route('categoria.store') }}";
                        break;
                    case 'unidadmedida':
                        url = "{{ route('unidadmedida.store') }}";
                        break;
                    default:
                        break;
                }

                let options = {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute(
                                    'content'),
                        },
                        body: JSON.stringify(data),
                    },
                    response = await fetch(url, options);

                if (!response.ok) {
                    throw {
                        status: response.status,
                        statusText: response.statusText
                    };
                }

                let respuesta = await response.json();
                console.log(respuesta);

                if (respuesta.status == '400') {
                    var summary = "";
                    for (const [clave, valor] of Object.entries(respuesta.errors)) {
                        summary += "<li>" + valor[0] + "</li>";
                    }
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
                } else {
                    $('#modal').modal('hide');
                    $cuerpoCard.innerHTML = '';

                    const $divAlert = document.createElement('div');
                    $divAlert.setAttribute('class',
                        'alert alertaResultado alert-dismissible fade show alert-success');
                    $divAlert.setAttribute('role', 'alert');
                    const $iconCheck = document.createElement('i');
                    $iconCheck.setAttribute('class', 'fas fa-check-circle');

                    const $mensaje = document.createTextNode(' ' + respuesta.message);
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

                    // Listar elementos
                    options = {
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                    };

                    switch (tipo) {
                        case 'producto':
                            response = await fetch("{{ route('producto.index') }}", options);
                            break;
                        case 'marca':
                            response = await fetch("{{ route('marca.index') }}", options);
                            break;
                        case 'categoria':
                            response = await fetch("{{ route('categoria.index') }}", options);
                            break;
                        case 'unidadmedida':
                            response = await fetch("{{ route('unidadmedida.index') }}", options);
                            break;
                        default:
                            break;
                    }

                    if (!response.ok) {
                        throw {
                            status: response.status,
                            statusText: response.statusText
                        };
                    }

                    respuesta = await response.json();
                    listarTable(respuesta);

                    // Mostrar alerta de éxito o de error en POST
                    document.getElementById('divAlerta').appendChild($divAlert);
                    setTimeout(() => {
                        $('.alertaResultado').alert('close');
                    }, 3000);
                }
                removeLoading();
            } catch (error) {
                let code = error.status;
                let message = error.statusText || "Ocurrió un error";
                $cuerpoCard.innerHTML = code + ' - ' + message + error;
                console.log(error);
                removeLoading();
            }
        } else {
            // Update - PUT
            try {
                let id = element.getAttribute('value'),
                    url;

                switch (tipo) {
                    case 'producto':
                        url = "{{ route('producto.update', ':id') }}";
                        break;
                    case 'marca':
                        url = "{{ route('marca.update', ':id') }}";
                        break;
                    case 'categoria':
                        url = "{{ route('categoria.update', ':id') }}";
                        break;
                    case 'unidadmedida':
                        url = "{{ route('unidadmedida.update', ':id') }}";
                        break;
                    default:
                        break;
                }

                url = url.replace(':id', id);

                let options = {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute(
                                    'content'),
                        },
                        body: JSON.stringify(data),
                    },
                    response = await fetch(url, options);

                if (!response.ok) {
                    throw {
                        status: response.status,
                        statusText: response.statusText
                    };
                }

                let respuesta = await response.json();
                console.log(respuesta);

                if (respuesta.status == '400') {
                    var summary = "";
                    for (const [clave, valor] of Object.entries(respuesta.errors)) {
                        summary += "<li>" + valor[0] + "</li>";
                    }
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

                    removeLoading();
                } else if (respuesta.status == '404') {
                    $('#modal').modal('hide');
                    $cuerpoCard.innerHTML = '';

                    const $divAlert = document.createElement('div');
                    $divAlert.setAttribute('class',
                        'alert alertaResultado alert-dismissible fade show alert-danger');
                    $divAlert.setAttribute('role', 'alert');
                    const $iconCheck = document.createElement('i');
                    $iconCheck.setAttribute('class', 'fas fa-exclamation-triangle');

                    const $mensaje = document.createTextNode(' ' + respuesta.message);
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

                    // Listar elementos
                    options = {
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                    };

                    switch (tipo) {
                        case 'producto':
                            response = await fetch("{{ route('producto.index') }}", options);
                            break;
                        case 'marca':
                            response = await fetch("{{ route('marca.index') }}", options);
                            break;
                        case 'categoria':
                            response = await fetch("{{ route('categoria.index') }}", options);
                            break;
                        case 'unidadmedida':
                            response = await fetch("{{ route('unidadmedida.index') }}", options);
                            break;
                        default:
                            break;
                    }

                    if (!response.ok) {
                        throw {
                            status: response.status,
                            statusText: response.statusText
                        };
                    }

                    respuesta = await response.json();
                    listarTable(respuesta);

                    // Mostrar alerta de éxito o de error en PUT
                    document.getElementById('divAlerta').appendChild($divAlert);
                    setTimeout(() => {
                        $('.alertaResultado').alert('close');
                    }, 3000);
                } else {
                    $('#modal').modal('hide');
                    $cuerpoCard.innerHTML = '';

                    const $divAlert = document.createElement('div');
                    $divAlert.setAttribute('class',
                        'alert alertaResultado alert-dismissible fade show alert-success');
                    $divAlert.setAttribute('role', 'alert');
                    const $iconCheck = document.createElement('i');
                    $iconCheck.setAttribute('class', 'fas fa-check-circle');

                    const $mensaje = document.createTextNode(' ' + respuesta.message);
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

                    // Listar elementos
                    options = {
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                    };

                    switch (tipo) {
                        case 'producto':
                            response = await fetch("{{ route('producto.index') }}", options);
                            break;
                        case 'marca':
                            response = await fetch("{{ route('marca.index') }}", options);
                            break;
                        case 'categoria':
                            response = await fetch("{{ route('categoria.index') }}", options);
                            break;
                        case 'unidadmedida':
                            response = await fetch("{{ route('unidadmedida.index') }}", options);
                            break;
                        default:
                            break;
                    }

                    if (!response.ok) {
                        throw {
                            status: response.status,
                            statusText: response.statusText
                        };
                    }

                    respuesta = await response.json();
                    listarTable(respuesta);

                    // Mostrar alerta de éxito o de error en PUT
                    document.getElementById('divAlerta').appendChild($divAlert);
                    setTimeout(() => {
                        $('.alertaResultado').alert('close');
                    }, 3000);
                }
                removeLoading();
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
        $txtUnidadMedida.addEventListener('keyup', function() {
            let descripcionUnidadMedida = this.value;
            if (descripcionUnidadMedida != '') {
                //console.log(descripcionUnidadMedida);
                $.ajax({
                    url: '/primer_proyecto/unidadmedida/searchUnidadMedida',
                    method: 'POST',
                    data: {
                        descripcionUnidadMedida
                    },
                    success: function(data) {
                        //console.log(data);
                        const $unidadMedidaList = document.getElementById(
                            'unidadMedidaList');
                        $unidadMedidaList.hidden = false;
                        $unidadMedidaList.innerHTML = data;
                    }
                });
            } else {
                $('#unidadMedidaList').html('');
            }
        });
        const $txtMarca = document.getElementById('txtMarca');
        $txtMarca.addEventListener('keyup', function() {
            let descripcionMarca = this.value;
            if (descripcionMarca != '') {
                //console.log(descripcionMarca);
                $.ajax({
                    url: '/primer_proyecto/marca/searchMarca',
                    method: 'POST',
                    data: {
                        descripcionMarca
                    },
                    success: function(data) {
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
        $txtCategoria.addEventListener('keyup', function() {
            let descripcionCategoria = this.value;
            if (descripcionCategoria != '') {
                //console.log(descripcionCategoria);
                $.ajax({
                    url: '/primer_proyecto/categoria/searchCategoria',
                    method: 'POST',
                    data: {
                        descripcionCategoria
                    },
                    success: function(data) {
                        //console.log(data);
                        const $categoriaList = document.getElementById(
                            'categoriaList');
                        $categoriaList.hidden = false;
                        $categoriaList.innerHTML = data;
                    }
                });
            } else {
                $('#categoriaList').html('');
            }
        });

        const $btnCambiarUnidadMedida = document.getElementById('btnCambiarUnidadMedida');
        $btnCambiarUnidadMedida.addEventListener('click', function() {
            vaciarUnidadMedida();
        });
        const $btnCambiarMarca = document.getElementById('btnCambiarMarca');
        $btnCambiarMarca.addEventListener('click', function() {
            vaciarMarca();
        });
        const $btnCambiarCategoria = document.getElementById('btnCambiarCategoria');
        $btnCambiarCategoria.addEventListener('click', function() {
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

    const vaciarPlantilla = function vaciarPlantilla() {
        while ($cuerpoCard.firstChild) {
            $cuerpoCard.removeChild($cuerpoCard.firstChild);
        }
    }

    const index = async function index() {
        try {
            loading();

            titulo();
            activarSideBar();
            vaciarPlantilla();

            let response = await fetch('/prsfsdfimer_proyecto/index/about');

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
</script>
