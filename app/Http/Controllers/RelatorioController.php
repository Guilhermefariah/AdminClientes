<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Carbon\Carbon;

class RelatorioController extends Controller
{
    public function index(Request $request)
    {
        $filtro = $request->input('filtro', 'hoje');
        
        $clientes = Cliente::query();

        if ($filtro === 'hoje') {
            $clientes->whereDate('created_at', Carbon::today());
        } elseif ($filtro === 'semana') {
            $clientes->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($filtro === 'mês') {
            $clientes->whereMonth('created_at', Carbon::now()->month);
        }

        $clientes = $clientes->get();

        $rendaMedia = Cliente::avg('renda_familiar');

        $maioresDeIdadeComMaisRenda = $clientes->filter(function ($cliente) use ($rendaMedia) {
            return Carbon::parse($cliente->data_nascimento)->age >= 18 && $cliente->renda_familiar > $rendaMedia;
        })->count();

        $classeA = $clientes->where('renda_familiar', '<=', 980)->count();
        $classeB = $clientes->whereBetween('renda_familiar', [980.01, 2500])->count();
        $classeC = $clientes->where('renda_familiar', '>', 2500)->count();

        return view('relatorios.index', [
            'clientes' => $clientes,
            'filtro' => $filtro,
            'maioresDeIdadeComMaisRenda' => $maioresDeIdadeComMaisRenda,
            'classeA' => $classeA,
            'classeB' => $classeB,
            'classeC' => $classeC,  
        ]);
    }
}
