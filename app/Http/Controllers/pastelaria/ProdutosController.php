<?php

namespace App\Http\Controllers\pastelaria;

use App\Http\Controllers\Controller;
use App\Models\pastelaria\Produtos as PastelariaProdutos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = array();
        $x = new PastelariaProdutos();
        $all = $x::all();


        $linha = 0;
        foreach ($all as $all) {
            $relativo = 'uploads/' . $all['foto'];
            $baseURL = config('app.url');
            $urlCompleta = $baseURL . '/' . $relativo; //$urlCompleta = Storage::url($relativo);
            $produtos[$linha]['fotoUrl'] = $urlCompleta;
            $produtos[$linha]['produto'] = $all->nome;
            $produtos[$linha]['valor'] = "R$".number_format($all->preco, 2, ',', '.');
            $produtos[$linha]['id'] = $all->id;
            $produtos[$linha]['pedidos']= $all->pedidos;
            $linha++;
        }


        return response()->json([
            "succes" => true,
            "sucesso" => 1,
            "produtos" => $produtos,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        

        $nomeArquivo = $request->file('arquivo')->getClientOriginalName();
        $caminhoDestino = 'uploads/' . $nomeArquivo;
        $request->file('arquivo')->move(public_path('uploads'), $nomeArquivo);

        $x = new PastelariaProdutos();
        $x->nome = $request->produto;
        $x->preco = $this->Limpeza($request->valor);
        $x->foto = $request->file('arquivo')->getClientOriginalName();
        $x->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $produto = new PastelariaProdutos();
        $dados = $produto::find($request->id);
        $dados->nome = $request->produto;
        $dados->preco = $this->Limpeza($request->valor);

        print_r($dados->preco);

        $imagem_atual = $dados->foto;

        if ($request->foto !== "undefined") {
            $nomeArquivo = $request->file('foto')->getClientOriginalName();
            $caminhoDestino = 'uploads/' . $nomeArquivo;
            $request->file('foto')->move(public_path('uploads'), $nomeArquivo);
            $dados->foto = $request->file('foto')->getClientOriginalName();
            /*********************************/
            /*********************************/
            /*********************************/
            /*********************************/
            $caminhoDoArquivo = public_path('uploads/' . $imagem_atual . '');
            echo "<br>";
            print_r($caminhoDoArquivo);
            /*********************************/
            if (file_exists($caminhoDoArquivo)) {
                unlink($caminhoDoArquivo);
                echo "deletada ==";
            }
            /*********************************/
        } else {
        }

        $dados->update();
        
    }


    private function Limpeza($dados)
    {
        $numero_formatado = str_replace(',', '.', str_replace('.', '', $dados));
        return str_replace("R$",'',$numero_formatado);
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $x = new PastelariaProdutos();
        $produto = $x::find($id);
        if ($produto) {
            $caminhoDoArquivo = public_path('uploads/' . $produto->foto . '');
            if (file_exists($caminhoDoArquivo)) {
                unlink($caminhoDoArquivo);
            }
            $produto->delete();
        }
    }
}
