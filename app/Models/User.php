<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Campos que podem ser preenchidos
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'cpf', 
        'telefone', 
        'data_nascimento', 
        'perfil',
    ];

    // Campos que devem ser ocultados quando o usuário for retornado
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    // Casts para conversões automáticas
    protected $casts = [
        'email_verified_at' => 'datetime',
        'data_nascimento' => 'date', // Corrigido para 'data_nascimento' que é o nome correto no banco
    ];

    /**
     * Definição do campo "perfil".
     * Controla o tipo de perfil do usuário, como "torcedor", "admin", etc.
     * 
     * @return string
     */
    public function setPerfilAttribute($value)
    {
        // Definir um valor padrão de perfil, caso o usuário não forneça
        $this->attributes['perfil'] = $value ?: 'torcedor';
    }

    /**
     * Validação personalizada no modelo (se necessário).
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'cpf' => 'required|string|max:14|unique:users,cpf',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'telefone' => 'required|string',  // Corrigido para 'telefone' em vez de 'phone'
        'data_nascimento' => 'required|date', // Corrigido para 'data_nascimento' em vez de 'dob'
    ];
}
