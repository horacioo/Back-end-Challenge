<?php

namespace App\Models\pastelaria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\pastelaria\Produtos;
use App\Models\pastelaria\Clientes;


class Pedidos extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'cliente_id',
        'produto_id',
    ];



    public function produtos()
    {
        return $this->belongsToMany(Produtos::class, 'pedido_produto', 'pedido_id', 'produto_id');
    }



    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'cliente_id');
    }

}
