<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::select([
            'codigo',
            'descripcion',
        ])
            ->whereNull('deleted_at')->get();

        $viewCategoriaRender = view('categoria.index')->render();

        return response()->json(array('html' => $viewCategoriaRender, 'registros' => $categorias));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewCreateCategoriaRender = view('categoria.create')->render();

        return response()->json(array('html' => $viewCreateCategoriaRender));
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
            'txtDescripcion.max' => 'La descripción no puede superar los 100 caracteres.',
        ];

        $validator = Validator::make($request->all(), [
            'txtDescripcion' => 'bail|required|max:100',
        ], $messages);

        if ($validator->fails()) {
            return response()->json(array(
                'status' => 400,
                'errors' => $validator->errors(),
            ));
        } else {
            $categoria = new Categoria();
            $categoria->codigo = 'C';
            $categoria->descripcion = $request->input('txtDescripcion');
            $categoria->save();

            $categoria->codigo = 'C' . $categoria->id;
            $categoria->update();

            return response()->json([
                'status' => 200,
                'message' => '¡Categoría agregada con éxito!',
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

    public function search($keywords)
    {
        if (strlen($keywords) != 0) {
            $categorias = Categoria::select(['codigo', 'descripcion'])
                ->where('descripcion', 'like', '%' . $keywords . '%')
                ->whereNull('deleted_at')
                ->orderBy('descripcion')
                ->take(10)->get();

            $viewSearchCategoriaRender = view('categoria.search', compact('categorias'))->render();
            return response()->json(array('html' => $viewSearchCategoriaRender));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        if ($categoria) {
            $viewEditCategoriaRender = view('categoria.edit', compact('categoria'))->render();

            return response()->json(array('html' => $viewEditCategoriaRender));
        } else {
            return response()->json([
                'status' => 404,
                'errors' => "Categoría no encontrada",
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
            'txtDescipcion.max' => 'La descripción no puede superar los 100 caracteres.',
        ];

        $validator = Validator::make($request->all(), [
            'txtDescripcion' => 'bail|required|max:100',
        ], $messages);

        if ($validator->fails()) {
            return response()->json(array(
                'status' => 400,
                'errors' => $validator->errors(),
            ));
        } else {
            $categoria = Categoria::find($id);
            if ($categoria) {
                $categoria->descripcion = $request->input('txtDescripcion');
                $categoria->update();

                return response()->json([
                    'status' => 200,
                    'message' => '¡Categoría actualizada con éxito!',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Categoría no encontrada',
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
        $categoria = Categoria::find($id);
        $categoria->delete();
        return response()->json([
            'status' => 200,
            'message' => '¡Categoría eliminada con éxito!',
        ]);
    }
}
