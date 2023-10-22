<?php

namespace App\Http\Controllers\pastelaria;

use App\Http\Controllers\Controller;
use App\Models\pastelaria\Clientes;
use Dotenv\Validator;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        $Cliente = new Clientes();
        $Cliente->nome = $request->nome;
        $Cliente->email = $request->email;
        $Cliente->data_de_nascimento = $request->nascimento;
        $Cliente->endereco = $request->endereco;
        $Cliente->complemento = $request->complemento;
        $Cliente->bairro = $request->bairro;
        $Cliente->cep = $request->cep;



        try {
            if ($Cliente->save()) {
                return response()->json([
                    'success' => true,
                    'mensagem' => "cadastro realizado com sucesso",
                    'cliente' => $Cliente->id,
                ], 200);
            }
        } catch (\Exception $e) {
            $errors = ['Erro interno ao salvar o cliente.'];
            return response()->json([
                'success' => false,
                'errors' => $errors,
                'mensagem' => "erro ao salvar o cliente, verifique o seu email!",
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $cli = new Clientes();
        $conta = $cli::find($id);

        return response()->json([
            'success' => true,
            'mensagem' => "cadastro realizado com sucesso",
            'dados' => $conta
        ], 200);
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
        /***********************************/
        $cli = new Clientes();
        $conta = $cli::find($request->id);
        /***********************************/
        $conta->nome = $request->nome;
        $conta->email = $request->email;
        $conta->data_de_nascimento = $request->nascimento;
        $conta->endereco = $request->endereco;
        $conta->complemento = $request->complemento;
        $conta->bairro = $request->bairro;
        $conta->cep = $request->cep;

        /***********************************************************/
        if ($conta->update()) {
            return response()->json([
                'success' => true,
                'mensagem' => "cadastro realizado com sucesso"
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'mensagem' => "Problema ao atualizar"
            ], 200);
        }
    }
    /***********************************************************/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        /****************************************************************************************/
        $cli = new Clientes();
        $conta = $cli::find($id);

        if ($conta->delete()) {
            return response()->json([
                'success' => true,
                'mensagem' => "conta deletada com sucesso!"
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'mensagem' => "problema ao deletar, tente novamente mais tarde",
            ], 200); 
        }
        /****************************************************************************************/


    }
}
