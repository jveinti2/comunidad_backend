<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class NoticiasController extends Controller
{
    public function listData(Request $request)
    {
        $mensaje = 'Noticias listadas con exito';
        $noticias = Noticia::get();
        return response()->json([
            'statusCode' => '200',
            'mensaje' => $mensaje,
            'noticias' => $noticias,
        ], 200);
    }
}
