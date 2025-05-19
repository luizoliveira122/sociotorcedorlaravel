<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacao; 

class HomeController extends Controller
{
    public function index()
{
    $publicacoes = Publicacao::latest()->take(5)->get(); 

    return view('sua-view', compact('publicacoes'));
}
}