<?php

    namespace App\Http\Controllers;

    use App\Models\Fatura;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;


    class FaturaController extends Controller {
    
        public function store(Request $request)
        {
            $fatura = Fatura::create($request->all());
            return response()->json(['message' => 'Fatura criada com sucesso!', 'fatura' => $fatura]);
        }

        public function showPurchaseHistory()
        {
            // Recupera as faturas da base de dados 
            $faturas = Fatura::where('user_id', Auth::user()->id)->get();

            // Retorna a view com os dados
            return view('profile.purchase-history', compact('faturas'));
        }

        public function index()
        {
            // Recupera todas as faturas
            $faturas = Fatura::with('user')->get();

            // Retorna a view de administração com as faturas
            return view('admin.faturas', compact('faturas'));
        }

    }


?>