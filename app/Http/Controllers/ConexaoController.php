<?php

namespace App\Http\Controllers;

use App\Models\Conexao;
use App\Models\Usuario;
use App\Services\ConexaoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ConexaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ConexaoService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        //
        $dependencias = [
            'conexoes' => Conexao::all(),
        ];

        return view('laravel.conexoes.index', $dependencias);
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
        //
        $data = $request->all();
        //dd($request->get('id_usuario1'));
        if ($request->get('id_usuario1') == $request->get('id_usuario2')) {
          return redirect('/conexoes')->with('error', 'Voçê não pode realizar uma conexão com a mesma pessoa!');
        }

        $result = $this->service->storage($data);
        if ($result && is_bool($result)) {
            return redirect('/conexoes')->with('sucess', 'Conexão cadastrada com sucesso!');
        }
        $msg = $result ? $result : "Erro ao cadastrar conexão!";
        return redirect('/conexoes')->with('error', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conexao  $conexao
     * @return \Illuminate\Http\Response
     */
    public function showForm()
    {
        $dependencias = array(
            'idConexao' => '',
            'conexao' => '',
            'usuarios' => Usuario::all(),
            'route' => "/conexoes/cadastro",
        );
        return view('laravel.conexoes.cadastro', $dependencias);
    }
    public function show($id)
    {
        //
        $conexao = Conexao::find($id);
        if (!$conexao) {
            Session::flash('error', "Conexão inexistente!");
            return redirect('/conexoes');
        }

        $dependencias = array(
            'conexao' => $conexao,
            'usuarios' => Usuario::all(),
            'route' => "/conexoes/salvar/{$id}",
            'idConexao' => $id,
        );
        return view('laravel.conexoes.cadastro', $dependencias);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conexao  $conexao
     * @return \Illuminate\Http\Response
     */
    public function edit(Conexao $conexao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conexao  $conexao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();

        if ($request->get('id_usuario1') == $request->get('id_usuario2')) {
            return redirect('/conexoes')->with('error', 'Voçê não pode realizar uma conexão com a mesma pessoa!');
        }

        $result = $this->service->update($id, $data);
        if ($result && is_bool($result)) {
            return redirect('/conexoes')->with('sucess', 'Conexão editada com sucesso!');
        }
        $msg = $result ? $result : "Erro ao editar conexão!";
        return redirect('/conexoes')->with('error', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conexao  $conexao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conexao $conexao)
    {
        //
    }
    public function delete($id)
    {
        $result = $this->service->delete($id);
        return response()->json($result);
    }
}
