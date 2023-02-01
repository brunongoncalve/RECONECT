<?php

namespace App\Http\Controllers\Teste;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Teste\Teste;

class TesteController extends Controller
{
    public function index()
    {
        return view('Teste.teste_index');
    }

    public function store(Request $request)
    {
        if($request->hasFile('file')) {
        } else {
            $fileNameToStore = 'erroplanilha.xlsx';
        }

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $reader->setReadDataOnly(true);
            $planilha = $reader->load($request->file('file'));
            $planilha->setActiveSheetIndexByName('Planilha1'); 
            $coluna = $planilha->setActiveSheetIndex(0)->getHighestColumn();
            $linha = $planilha->setActiveSheetIndex(0)->getHighestRow();
            $celulas = $planilha->getActiveSheet()->toArray();
            $celulas = array_slice($celulas, 0, 100);

        DB::transaction(function() use ($request) {   
            foreach($celulas as $li) {
                $teste = new Teste;

                $teste->field_1 = $li[0];
                $teste->field_2 = $li[1];
         
                if($li[0]) 
        
               $teste->save();
             }
        });

        return 'SUCESSO';
    }
}
