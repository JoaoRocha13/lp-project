<?php

    namespace App\Http\Controllers;

    use App\Models\Game;
    use Illuminate\Http\Request;

    class GameController extends Controller {
    
        public function store(Request $request)
        {
            $game = Game::create($request->all());
            return response()->json(['message' => 'Jogo criado com sucesso!', 'game' => $game]);
        }

    }

?>