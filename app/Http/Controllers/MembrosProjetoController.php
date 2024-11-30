<?php

namespace App\Http\Controllers;

use App\Models\MembrosProjeto;
use App\Models\ProjetoMusical;
use App\Models\Usuario;
use App\Services\MembrosprojetoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MembrosProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(MembrosprojetoService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        //
        $dependencias = [
            'membrosprojeto' => MembrosProjeto::all()
        ];
        //dd($dependencias);
        return view('laravel.membrosprojeto.index', $dependencias);
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
        $result = $this->service->storage($data);


        if ($result && is_bool($result)) {
            return redirect('/membrosprojeto')->with('sucess', 'Membros do projeto cadastrado com sucesso!');
        }
        $msg = $result ? $result : "Erro ao cadastrar membros do projeto!";
        return redirect('/membrosprojeto')->with('error', $msg);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MembrosProjeto  $membrosProjeto
     * @return \Illuminate\Http\Response
     */
    public function showForm()
    {
        $dependencias = array(
            'idMembrosprojeto' => '',
            'membrosprojeto' => '',
            'usuarios' => Usuario::all(),
            'projetomusical' => ProjetoMusical::all(),
            'route' => "/membrosprojeto/cadastro",
        );
        //dd($dependencias);
        return view('laravel.membrosprojeto.cadastro', $dependencias);
    }
    public function show($id)
    {
        //
        $membrosprojeto = MembrosProjeto::find($id);

        if (!$membrosprojeto)  {
            Session::flash('error', "Conexão inexistente!");
            return redirect('/membrosprojeto');
        }

        $dependencias = array(
            'membrosprojeto' => $membrosprojeto,
            'usuarios' => Usuario::all(),
            'projetomusical' => ProjetoMusical::all(),
            'route' => "/membrosprojeto/salvar/{$id}",
            'idMembrosprojeto' => $id,
        );
        return view('laravel.membrosprojeto.cadastro', $dependencias);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MembrosProjeto  $membrosProjeto
     * @return \Illuminate\Http\Response
     */
    public function edit(MembrosProjeto $membrosProjeto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MembrosProjeto  $membrosProjeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        $result = $this->service->update($id,$data);

        if ($result && is_bool($result)) {
            return redirect('/membrosprojeto')->with('sucess', 'Membros do projeto editado com sucesso!');
        }
        $msg = $result ? $result : "Erro ao editar membros do projeto!";
        return redirect('/membrosprojeto')->with('error', $msg);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MembrosProjeto  $membrosProjeto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $result = $this->service->delete($id);
        return response()->json($result);

    }
    public function delete($id)
    {
        //
        $result = $this->service->delete($id);
        return response()->json($result);

    }


}
