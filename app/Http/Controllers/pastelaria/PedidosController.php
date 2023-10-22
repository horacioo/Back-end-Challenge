<?php

namespace App\Http\Controllers\pastelaria;

use App\Http\Controllers\Controller;
use App\Models\pastelaria\Clientes;
use App\Models\pastelaria\Pedidos;
use App\Models\pastelaria\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Unique;

class PedidosController extends Controller
{




    public function store(Request $request)
    {


        $erro = 0;
        $produtosId = json_decode($request->produto_id, true);

        $pedido = new Pedidos();
        foreach ($produtosId as $produtoId) {

            $pedido->cliente_id = $request->cliente_id;
            $pedido->produto_id = $produtoId; // Fornecer o campo produto_id
            $pedido->save();

            $pedido->produtos()->attach($produtoId);
        }


        if ($erro == 0) {
            return response()->json([
                'success' => true,
                'mensagem' => "cadastro realizado com sucesso",
                'erro' => $erro,
                'enviado' => $request->all()
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'mensagem' => "houve um problema, tente novamente",
                'erro' => $erro,
                'enviado' => $request->all()
            ], 200);
        }
    }








    /***************************************************************************/
    /***************************************************************************/
    /***************************************************************************/
    public function carrinho(Request $request)
    {
        $arrayPedidos = array();
        $Compras = array();
        $pedidos = array();
       

        $resultado = Pedidos::select('*')->where('cliente_id', $request->cliente_id)->get();



        foreach ($resultado as $re) {
            $produtos = $re->produtos;

            if ($produtos->isNotEmpty()) {
                $Compras[] = $produtos;
            }
        }


        $produtosSimples = [];
        foreach ($Compras as $produto) {
            $produtosSimples[] = $produto->toArray();
        }


        foreach ($produtosSimples as $ps) {
            foreach ($ps as $pp) {
                $pedidos[$pp['pivot']['pedido_id']]['produto'][] = array("produto" => $pp['nome'], "valor" => $pp['preco'], "id" => $pp['id']);
                $arrayPedidos[] = $pp['pivot']['pedido_id'];
            }
        }


        $arrayPedidos = array_unique($arrayPedidos);


        return response()->json([
            'success' => true,
            'mensagem' => "acesso bem sucedido",
            //'compras' => $Compras,
            'pedidos' => $arrayPedidos,
            'itens' => $pedidos,
        ], 200);
    }
    /***************************************************************************/
    /***************************************************************************/
    /***************************************************************************/




    /***************************************************************************/
    /***************************************************************************/
    /***************************************************************************/
    public function deletar($id)
    {
        $dados = explode("-", $id);
        $produto_id = $dados[0];
        $pedido_id = $dados[1];

        $pedido = Pedidos::find($pedido_id);
        $produtoId = $produto_id; // Substitua pelo ID do produto que você deseja remover
        if ($pedido->produtos()->detach($produtoId)) {
            return response()->json([
                'success' => true,
                'mensagem' => "exclusão bem sucedida",
            ], 200);
        }else{
            return response()->json([
                'success' => true,
                'mensagem' => "houve um problema ",
            ], 200);
        }
    }
    /***************************************************************************/
    /***************************************************************************/
    /***************************************************************************/
}
