<?php

    namespace App\Http\Controllers;

    use App\Models\Ticket;
    use Illuminate\Http\Request;

    class TicketController extends Controller {
    
        public function store(Request $request)
        {
            $ticket = Ticket::create($request->all());
            return response()->json(['message' => 'Bilhete criado com sucesso!', 'ticket' => $ticket]);
        }

    }

?>