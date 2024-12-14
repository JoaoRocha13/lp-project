<?php

    namespace App\Http\Controllers;

    use App\Models\Fatura;
    use Illuminate\Http\Request;

    class FaturaController extends Controller {
    
        public function store(Request $request)
        {
            $fatura = Fatura::create($request->all());
            return response()->json(['message' => 'Fatura criada com sucesso!', 'fatura' => $fatura]);
        }

    }


?>