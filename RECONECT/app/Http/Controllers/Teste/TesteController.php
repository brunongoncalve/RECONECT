<?php

namespace App\Http\Controllers\Teste;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Teste\Teste;
use App\Exports\TarefasExport;
use Maatwebsite\Excel\Facades\Excel;

class TesteController extends Controller
{
    public function index()
    {
        return view('Teste.teste_index');
    }

    public function export(Request $request)
    {
        return Excel::download(new TarefasExport($request->bruno), 'tarefas.xlsx');
    }
}
