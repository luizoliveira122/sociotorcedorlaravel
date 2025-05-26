<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class NoticiaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'texto' => 'required|string',
        ]);

        Noticia::create($request->only('titulo', 'texto'));

        return redirect()->back()->with('success', 'Notícia publicada com sucesso!');
    }

    public function index()
{
    $noticias = Noticia::orderBy('created_at', 'desc')->get(); // Ordena as notícias pela data mais recente
    return view('admin.noticias', compact('noticias')); // Passa as notícias para a view
}

public function ultimasPostagens()
{
    $ultimasNoticias = Noticia::latest()->take(5)->get(); // Busca as 5 últimas notícias
    return view('home', compact('ultimasNoticias')); // Passa as notícias para a view
}

public function destroy($id)
{
    $noticia = Noticia::findOrFail($id); // Busca a notícia pelo ID
    $noticia->delete(); // Exclui a notícia

    return redirect()->back()->with('success', 'Notícia excluída com sucesso!');
}
}
