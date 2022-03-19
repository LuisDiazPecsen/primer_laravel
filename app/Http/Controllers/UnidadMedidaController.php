<?php

namespace App\Http\Controllers;

use App\UnidadMedida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnidadMedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidadesmedida = UnidadMedida::select([
            'codigo',
            'descripcion',
        ])
            ->whereNull('deleted_at')->get();

        $viewUnidadMedidaRender = view('unidadmedida.index')->render();

        return response()->json(array('html' => $viewUnidadMedidaRender, 'registros' => $unidadesmedida));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewCreateUnidadMedidaRender = view('unidadmedida.create')->render();

        return response()->json(array('html' => $viewCreateUnidadMedidaRender));
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
            $unidadmedida = new UnidadMedida();
            $unidadmedida->codigo = 'U';
            $unidadmedida->descripcion = $request->input('txtDescripcion');
            $unidadmedida->save();

            $unidadmedida->codigo = 'M' . $unidadmedida->id;
            $unidadmedida->update();

            return response()->json([
                'status' => 200,
                'message' => '¡Unidad de medida agregada con éxito!',
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
            $unidadesmedida = UnidadMedida::select(['codigo', 'descripcion'])
                ->where('descripcion', 'like', '%' . $keywords . '%')
                ->whereNull('deleted_at')
                ->orderBy('descripcion')
                ->take(10)->get();

            $viewSearchUnidadMedidaRender = view('unidadmedida.search', compact('unidadesmedida'))->render();
            return response()->json(array('html' => $viewSearchUnidadMedidaRender));
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
        $unidadmedida = UnidadMedida::find($id);
        if ($unidadmedida) {
            $viewEditUnidadMedidaRender = view('unidadmedida.edit', compact('unidadmedida'))->render();

            return response()->json(array('html' => $viewEditUnidadMedidaRender));
        } else {
            return response()->json([
                'status' => 404,
                'errors' => "Unidad de medida no encontrada",
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
            $unidadmedida = UnidadMedida::find($id);
            if ($unidadmedida) {
                $unidadmedida->descripcion = $request->input('txtDescripcion');
                $unidadmedida->update();

                return response()->json([
                    'status' => 200,
                    'message' => '¡Unidad de medida actualizada con éxito!',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Unidad de medida no encontrada',
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
        $unidadmedida = UnidadMedida::find($id);
        $unidadmedida->delete();
        return response()->json([
            'status' => 200,
            'message' => '¡Unidad de medida eliminada con éxito!',
        ]);
    }
}
