<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    
public function index()
{
    $users = User::all(); // Obtém todos os usuários com as fotos
    return view('index', compact('users'));
}

public function updatePhoto(Request $request)
{
    $request->validate([
        'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = Auth::user();
    $fileName = $user->name . '.' . $request->file('profile_photo')->getClientOriginalExtension();

     // Salvar a imagem na pasta 'storage/profile_photos'
     $path = $request->file('profile_photo')->storeAs('profile_photos', $fileName, 'public');

    // Deleta a foto antiga, se existir
    if ($user->profile_photo) {
        Storage::disk('public')->delete($user->profile_photo);
    }

    // Salva a nova foto
    $file = $request->file('profile_photo');
    $path = $file->store('profile_photos', 'public');

    // Atualiza a coluna 'profile_photo' na tabela users
    $user->profile_photo = $path;
    $user->save();

    return redirect()->back()->with('success', 'Foto de perfil atualizada com sucesso!');
}
}

