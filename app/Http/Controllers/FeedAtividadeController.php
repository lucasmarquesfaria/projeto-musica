<?php

namespace App\Http\Controllers;

use App\Models\FeedAtividade;
use App\Models\Usuario;
use App\Services\FeedatividadesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeedAtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(FeedatividadesService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        //
        $dependecias = [
            'feedatividades' => FeedAtividade::all()
        ];
        //dd($dependecias);
        return view('laravel.feedatividades.index', $dependecias);
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
            return redirect('/feedatividades')->with('sucess', 'Atividade cadastrada com sucesso!');
        }
        $msg = $result ? $result : "Erro ao cadastrar atividade!";
        return redirect('/feedatividades')->with('error', $msg);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeedAtividade  $feedAtividade
     * @return \Illuminate\Http\Response
     */
    public function showForm()
    {
        $dependencias = array(
            'idFeedatividades' => '',
            'feedatividades' => '',
            'usuarios' => Usuario::all(),
            'route' => "/feedatividades/cadastro",
        );
        return view('laravel.feedatividades.cadastro', $dependencias);
    }
    public function show($id)
    {
        //
        $feedatividades = FeedAtividade::find($id);
        if (!$feedatividades) {
            Session::flash('error', "Atividade inexistente!");
            return redirect('/feedatividades');
        }

        $dependencias = array(
            'idFeedatividades' => $id,
            'feedatividades' => $feedatividades,
            'usuarios' => Usuario::all(),
            'route' => "/feedatividades/salvar/{$id}",
        );
        return view('laravel.feedatividades.cadastro', $dependencias);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeedAtividade  $feedAtividade
     * @return \Illuminate\Http\Response
     */
    public function edit(FeedAtividade $feedAtividade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeedAtividade  $feedAtividade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();

        $result = $this->service->update($id, $data);
        if ($result && is_bool($result)) {
            return redirect('/feedatividades')->with('sucess', 'Atividade editada com sucesso!');
        }
        $msg = $result ? $result : "Erro ao editar atividade!";
        return redirect('/feedatividades')->with('error', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeedAtividade  $feedAtividade
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeedAtividade $feedAtividade)
    {
        //
    }
    public function delete($id)
    {
        $result = $this->service->delete($id);
        return response()->json($result);
    }
}
