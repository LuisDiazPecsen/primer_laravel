<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::select([
            'producto.codigo',
            'producto.descripcion',
            'producto.precio_compra',
            'producto.precio_venta',
            'producto.stock',
            'producto.stock_minimo',
            'producto.unidad_medida_id',
            'unidad_medida.codigo AS unidad_medida_codigo',
            'unidad_medida.descripcion AS unidad_medida_descripcion',
            'producto.marca_id',
            'marca.codigo AS marca_codigo',
            'marca.descripcion AS marca_descripcion',
            'producto.categoria_id',
            'categoria.codigo AS categoria_codigo',
            'categoria.descripcion AS categoria_descripcion'
        ])
            ->join('unidad_medida', 'producto.unidad_medida_id', '=', 'unidad_medida.id')
            ->join('marca', 'producto.marca_id', '=', 'marca.id')
            ->join('categoria', 'producto.categoria_id', '=', 'categoria.id')
            ->whereNull('producto.deleted_at')->get();

        $viewProductoRender = view('producto.index')->render();

        return response()->json(array('html' => $viewProductoRender, 'registros' => $productos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewCreateProductoRender = view('producto.create')->render();

        return response()->json(array('html' => $viewCreateProductoRender));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'txtDescripcion.required' => 'La descripción es obligatoria.',
            'txtDescripcion.max' => 'La descripción no puede superar los 200 caracteres.',
            'txtPrecioCompra.required' => 'El precio de compra es obligatorio.',
            'txtPrecioCompra.numeric' => 'El precio de compra no es válido.',
            'txtPrecioVenta.required' => 'El precio de venta es obligatorio.',
            'txtPrecioVenta.numeric' => 'El precio de venta no es válido.',
            'txtStock.required' => 'El stock es obligatorio.',
            'txtStock.numeric' => 'El stock no es válido.',
            'txtStockMinimo.required' => 'El stock mínimo es obligatorio.',
            'txtStockMinimo.numeric' => 'El stock mínimo no es válido.',
            'listaUnidadMedida.accepted' => 'Debes seleccionar una unidad de medida de la lista.',
            'listaMarca.accepted' => 'Debes seleccionar una marca de la lista.',
            'listaCategoria.accepted' => 'Debes seleccionar una categoría de la lista.'
        ];

        $validator = Validator::make($request->all(), [
            'txtDescripcion' => 'bail|required|max:200',
            'txtPrecioCompra' => 'bail|required|numeric',
            'txtPrecioVenta' => 'bail|required|numeric',
            'txtStock' => 'bail|required|numeric',
            'txtStockMinimo' => 'bail|required|numeric',
            'listaUnidadMedida' => 'accepted',
            'listaMarca' => 'accepted',
            'listaCategoria' => 'accepted',
        ], $messages);

        if ($validator->fails()) {
            return response()->json(array(
                'status' => 400,
                'errors' => $validator->errors(),
            ));
        } else {
            $producto = new Producto();
            $producto->codigo = 'P';
            $producto->descripcion = $request->input('txtDescripcion');
            $producto->precio_compra = $request->input('txtPrecioCompra');
            $producto->precio_venta = $request->input('txtPrecioVenta');
            $producto->stock = $request->input('txtStock');
            $producto->stock_minimo = $request->input('txtStock_minimo');
            $producto->marca_id = intval(substr(explode(' - ', $request->input('txtMarca'))[0], 1));
            $producto->unidad_medida_id = intval(substr(explode(' - ', $request->input('txtUnidadMedida'))[0], 1));
            $producto->categoria_id = intval(substr(explode(' - ', $request->input('txtCategoria'))[0], 1));
            $producto->save();

            $producto->codigo = 'P' . $producto->id;
            $producto->update();

            return response()->json([
                'status' => 200,
                'message' => '¡Producto agregado con éxito!',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        if ($producto) {
            $producto->addSelect([
                'unidad_medida.codigo AS unidad_medida_codigo',
                'unidad_medida.descripcion AS unidad_medida_descripcion',
                'marca.codigo AS marca_codigo',
                'marca.descripcion AS marca_descripcion',
                'categoria.codigo AS categoria_codigo',
                'categoria.descripcion AS categoria_descripcion'
            ])
                ->join('unidad_medida', 'producto.unidad_medida_id', '=', 'unidad_medida.id')
                ->join('marca', 'producto.marca_id', '=', 'marca.id')
                ->join('categoria', 'producto.categoria_id', '=', 'categoria.id')->get();

            $viewEditProductoRender = view('producto.edit', compact('producto'))->render();

            return response()->json(array('html' => $viewEditProductoRender));
        } else {
            return response()->json([
                'status' => 404,
                'errors' => "Producto no encontrado",
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'txtDescipcion.required' => 'La descripción es obligatoria.',
            'txtDescipcion.max' => 'La descripción no puede superar los 200 caracteres.',
            'txtPrecioCompra.required' => 'El precio de compra es obligatorio.',
            'txtPrecioCompra.numeric' => 'El precio de compra no es válido.',
            'txtPrecioVenta.required' => 'El precio de venta es obligatorio.',
            'txtPrecioVenta.numeric' => 'El precio de venta no es válido.',
            'txtStock.required' => 'El stock es obligatorio.',
            'txtStock.numeric' => 'El stock no es válido.',
            'txtStockMinimo.required' => 'El stock mínimo es obligatorio.',
            'txtStockMinimo.numeric' => 'El stock mínimo no es válido.',
            'listaUnidadMedida.accepted' => 'Debes seleccionar una unidad de medida de la lista.',
            'listaMarca.accepted' => 'Debes seleccionar una marca de la lista.',
            'listaCategoria.accepted' => 'Debes seleccionar una categoría de la lista.'
        ];

        $validator = Validator::make($request->all(), [
            'txtDescripcion' => 'bail|required|max:200',
            'txtPrecioCompra' => 'bail|required|numeric',
            'txtPrecioVenta' => 'bail|required|numeric',
            'txtStock' => 'bail|required|numeric',
            'txtStockMinimo' => 'bail|required|numeric',
            'listaUnidadMedida' => 'accepted',
            'listaMarca' => 'accepted',
            'listaCategoria' => 'accepted',
        ], $messages);

        if ($validator->fails()) {
            return response()->json(array(
                'status' => 400,
                'errors' => $validator->errors(),
            ));
        } else {
            $producto = Producto::find($id);
            if ($producto) {
                $producto->descripcion = $request->input('txtDescripcion');
                $producto->precio_compra = $request->input('txtPrecioCompra');
                $producto->precio_venta = $request->input('txtPrecioVenta');
                $producto->stock = $request->input('txtStock');
                $producto->stock_minimo = $request->input('txtStock_minimo');
                $producto->marca_id = intval(substr(explode(' - ', $request->input('txtMarca'))[0], 1));
                $producto->unidad_medida_id = intval(substr(explode(' - ', $request->input('txtUnidadMedida'))[0], 1));
                $producto->categoria_id = intval(substr(explode(' - ', $request->input('txtCategoria'))[0], 1));
                $producto->update();

                return response()->json([
                    'status' => 200,
                    'message' => '¡Producto actualizado con éxito!',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Producto no encontrado',
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return response()->json([
            'status' => 200,
            'message' => '¡Producto eliminado con éxito!',
        ]);
    }
}
