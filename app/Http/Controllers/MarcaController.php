<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::select([
            'codigo',
            'descripcion',
        ])
            ->whereNull('deleted_at')->get();

        $viewMarcaRender = view('marca.index')->render();

        return response()->json(array('html' => $viewMarcaRender, 'registros' => $marcas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewCreateMarcaRender = view('marca.create')->render();

        return response()->json(array('html' => $viewCreateMarcaRender));
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
            $marca = new Marca();
            $marca->codigo = 'M';
            $marca->descripcion = $request->input('txtDescripcion');
            $marca->save();

            $marca->codigo = 'M' . $marca->id;
            $marca->update();

            return response()->json([
                'status' => 200,
                'message' => '¡Marca agregada con éxito!',
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
            $marcas = Marca::select(['codigo', 'descripcion'])
                ->where('descripcion', 'like', '%' . $keywords . '%')
                ->whereNull('deleted_at')
                ->orderBy('descripcion')
                ->take(10)->get();

            $viewSearchMarcaRender = view('marca.search', compact('marcas'))->render();
            return response()->json(array('html' => $viewSearchMarcaRender));
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
        $marca = Marca::find($id);
        if ($marca) {
            $viewEditMarcaRender = view('marca.edit', compact('marca'))->render();

            return response()->json(array('html' => $viewEditMarcaRender));
        } else {
            return response()->json([
                'status' => 404,
                'errors' => "Marca no encontrada",
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
            $marca = Marca::find($id);
            if ($marca) {
                $marca->descripcion = $request->input('txtDescripcion');
                $marca->update();

                return response()->json([
                    'status' => 200,
                    'message' => '¡Marca actualizada con éxito!',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Marca no encontrada',
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
        $marca = Marca::find($id);
        $marca->delete();

        return response()->json([
            'status' => 200,
            'message' => '¡Marca eliminada con éxito!',
        ]);
    }
}
