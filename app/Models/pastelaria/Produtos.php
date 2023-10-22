<?php

namespace App\Models\pastelaria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produtos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome', 'preco', 'descricao', 'foto'];

    
    public function pedidos()
    {
        return $this->belongsToMany(Pedidos::class, 'pedido_produto', 'produto_id', 'pedido_id');
    }
}
