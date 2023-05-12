<?php

namespace App\Http\Controllers;

use App\Apartamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ApartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*
        if(Gate::denies('e1-view')){
            abort(403,"Não autorizado!");
        }
        */
        $query = Apartamento::query();

        $iguais = $request->only('id');
        foreach ($iguais as $campo => $igual) {
            if ($igual) {
                $query->where($campo, '=', $igual);
            }
        }

        $termos = $request->only('unidade');
        foreach ($termos as $nome => $valor) {
            if ($valor) {
                $query->where($nome, 'LIKE', '%' . $valor . '%');
            }
        }

        $apartamentos = $query->orderBy('created_at', 'desc')->get();

        return view('apartamentos.index', compact('apartamentos'));
    }

    public function apiApartamentos() {
        return Apartamento::all();
    }

}
