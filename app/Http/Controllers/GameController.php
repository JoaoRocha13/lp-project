<?php

    namespace App\Http\Controllers;

    use App\Models\Game;
    use Illuminate\Http\Request;
    use App\Models\User;
    use App\Models\PreviousGame;


    class GameController extends Controller {
    
        public function index() {
            $games = Game::all();
            $users = User::all();
            $previousGames = Game::all();
            return view('games.index', compact('games', 'users', 'previousGames'));
        }

        public function store(Request $request)
        {
            $request->validate([
                'team_a' => 'required|string|max:25',
                'team_b' => 'required|string|max:25',
                'game_date' => 'required|date',
                'local' => 'required|string|max:50',
                'ticket_price' => 'required|numeric|min:0',
                'tickets_available' => 'required|integer|min:1',
            ]);

            try {
                Game::create([
                    'team_a' => $request->team_a,
                    'team_b' => $request->team_b,
                    'game_date' => $request->game_date,
                    'local' => $request->local,
                    'ticket_price' => $request->ticket_price,
                    'tickets_available' => $request->tickets_available,
                ]);
                
                return redirect()->route('games.index')->with('success', 'Game created successfully!');
        }
        catch (\Exception $e) {
            return redirect()->route('games.index')->with('error', 'An error occurred while creating the game');
        }

    }

    public function moveToPrevious($game_id) {
        $game = Game::findOrFail($game_id);
        
        try {
            $previousGameExists = PreviousGame::where('game_id', $game->id)->exists();

            if(!$previousGameExists) {

                $previousGame = PreviousGame::create([
                    'game_id' => $game->id,
                    'team_a' => $game->team_a,
                    'team_b' => $game->team_b,
                    'score_a' => rand(0, 10),
                    'score_b' => rand(0, 10),
                    'game_date' => $game->game_date,
                    
                ]);

                if ($previousGame) {
                    $game->delete();
                    return redirect()->route('games.index')->with('success', 'Game moved to previous games successfully!');
                } else {
                    return redirect()->route('games.index')->with('error', 'An error occurred while moving the game to previous games');
                }
            } else {
                $game->delete();
                return redirect()->route('games.index')->with('error', 'The game is already in previous games');
            }
        }   catch (\Exception $e) {
            return redirect()->route('games.index')->with('error', 'An error occurred while moving the game to previous games');
        }
    }

    public function ListPreviousGames() {

        $previousGames = PreviousGame::all();
        return view('games.previous', compact('previousGames'));
    }

}

?>