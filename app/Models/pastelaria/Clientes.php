<?php

namespace App\Models\pastelaria;
use Illuminate\Validation\Rules;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clientes extends Model
{
    use HasFactory;

    use SoftDeletes;
    
    public static $rules = [
        'nome' => 'required',
        'email' => 'required|email|unique:clientes',
    ];


    protected $fillable = [
        'nome',
        'email',
        'data_de_nascimento',
        'endereco',
        'complemento',
        'bairro',
        'cep',
    ];

    public function pedidos(){ return $this->hasMany(Pedidos::class,'cliente_id','id');  }
}
