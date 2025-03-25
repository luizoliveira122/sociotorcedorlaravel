<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Exibe os comentários e a página, com filtragem por tema
    public function index(Request $request)
    {
        // Obtém o tema do parâmetro de consulta (query parameter)
        $theme = $request->get('theme');

        // Se o tema for especificado, filtramos os comentários
        if ($theme) {
            $comments = Comment::where('theme', $theme)->with('user')->get();
        } else {
            // Se não, mostramos todos os comentários
            $comments = Comment::with('user')->get();
        }

        return view('comentarios', compact('comments'));
    }

    // Armazena o novo comentário
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required',
            'theme' => 'required',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'text' => $request->text,
            'theme' => $request->theme,
        ]);

        return redirect()->route('comments.index');
    }

    // Remove o comentário (para administradores)
    public function destroy(Comment $comment)
    {
        if (Auth::user()->perfil == 'administrador') {  // Verifica se o usuário é admin
            $comment->delete();
            return back()->with('message', 'Comentário removido!');
        }

        return back()->with('message', 'Você não tem permissão para excluir este comentário.');
    }
}
