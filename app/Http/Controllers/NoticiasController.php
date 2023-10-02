<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class NoticiasController extends Controller
{
    public function listData(Request $request)
    {
        $mensaje = 'Noticias listadas con exito';
        $noticias = Noticia::join('users', 'users.id', '=', 'noticias.autor_id')
            ->select('noticias.*', 'users.name as autor')
            ->orderBy('noticias.id', 'desc')
            ->get();
        return response()->json([
            'success' => true,
            'message' => $mensaje,
            'noticias' => $noticias
        ], 200);
    }
}
