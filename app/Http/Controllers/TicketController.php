<?php

    namespace App\Http\Controllers;

    use App\Models\Ticket;
    use Illuminate\Http\Request;
    use App\Models\Game;

    class TicketController extends Controller {
    
        public function store(Request $request)
        {
            $request->validate([
                'game_id' => 'required|exists:games,id',
                'user_id' => 'required|exists:users,id',
                'quantity' => 'required|integer|min:1',
            ]);

            $game = Game::findOrFail($request->game_id);

            $ticketsSold = $game->tickets()->sum('quantity');
            $ticketsAvailable = $game->tickets_available - $ticketsSold;

            if($request->quantity > $ticketsAvailable) {
                return response()->json([
                    'message' => 'Not enough tickets available'
                ], 400);
            }

            Ticket::create([
                'game_id' => $game->id,
                'user_id' => $request->user_id,
                'quantity' => $request->quantity,
            ]);

            $game->tickets_available -= $request->quantity;
            $game->save();

            return back()->with('success','Ticket boughted');


        }

    }

?>