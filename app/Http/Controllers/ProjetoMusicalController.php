<?php

namespace App\Http\Controllers;

use App\Models\ProjetoMusical;
use App\Services\ProjetomusicalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProjetoMusicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ProjetomusicalService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        //
        $dependecias = [

            'projetomusical' => ProjetoMusical::all(),
        ];
        //dd($dependecias);

        return view('laravel.projetomusical.index', $dependecias);
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
            return redirect('/projetomusical')->with('sucess', 'Projeto musical cadastrada com sucesso!');
        }
        $msg = $result ? $result : "Erro ao cadastrar projeto musical!";
        return redirect('/projetomusical')->with('error', $msg);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjetoMusical  $projetoMusical
     * @return \Illuminate\Http\Response
     */
    public function showForm()
    {
        $dependencias = array(
            'idProjetomusical' => '',
            'projetomusical' => '',
            'route' => "/projetomusical/cadastro",
        );
        return view('laravel.projetomusical.cadastro', $dependencias);
    }

    public function show($id)
    {
        //
        $projetomusical = ProjetoMusical::find($id);
        if (!$projetomusical) {
            Session::flash('error', "Projeto musical inexistente!");
            return redirect('/projetomusical');
        }

        $dependencias = array(
            'projetomusical' => $projetomusical,
            'route' => "/projetomusical/salvar/{$id}",
            'idProjetomusical' => $id,
        );
        return view('laravel.projetomusical.cadastro', $dependencias);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjetoMusical  $projetoMusical
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjetoMusical $projetoMusical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjetoMusical  $projetoMusical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();

        $result = $this->service->update($id, $data);
        if ($result && is_bool($result)) {
            return redirect('/projetomusical')->with('sucess', 'Projeto musical editado com sucesso!');
        }
        $msg = $result ? $result : "Erro ao editar projeto musical!";
        return redirect('/projetomusical')->with('error', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjetoMusical  $projetoMusical
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjetoMusical $projetoMusical)
    {
        //
    }
    public function delete($id)
    {
        $result = $this->service->delete($id);
        return response()->json($result);
    }
}
