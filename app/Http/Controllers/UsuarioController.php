<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Services\UsuarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(UsuarioService $service)
     {
        $this->service = $service;
     }
    public function index()
    {
        //
        $dependencias = [
            'usuarios' => Usuario::all(),
        ];
        return view('laravel.usuarios.index', $dependencias);
    }
    public function showForm()
    {
        $dependencias = array(
            'idUsuario' => '',
            'usuario' => '',
            'route' => "/usuarios/cadastro",
        );
        return view('laravel.usuarios.cadastro', $dependencias);
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
        //dd($data);
        $result = $this->service->storage($data);
        if ($result && is_bool($result)) {
            return redirect('/usuarios')->with('sucess', 'Usuário cadastrado com sucesso!');
        }
        $msg = $result ? $result : "Erro ao cadastrar usuário!";
        return redirect('/usuarios')->with('error', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $usuario = Usuario::find($id);
        if (!$usuario) {
            Session::flash('error', "Usuário inexistente!");
            return redirect('/usuarios');
        }

        $dependencias = array(
            'usuario' => $usuario,
            'route' => "/usuarios/salvar/{$id}",
            'idUsuario' => $id,
        );
        return view('laravel.usuarios.cadastro', $dependencias);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();

        $result = $this->service->update($id, $data);
        if ($result && is_bool($result)) {
            return redirect('/usuarios')->with('sucess', 'Usuário editado com sucesso!');
        }
        $msg = $result ? $result : "Erro ao editar usuário!";
        return redirect('/usuarios')->with('error', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
    public function delete($id)
    {
        $result = $this->service->delete($id);
        return response()->json($result);
    }
}
