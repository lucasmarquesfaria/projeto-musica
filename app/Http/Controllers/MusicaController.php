<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use App\Models\Musica;
use App\Models\Usuario;
use App\Services\MusicaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MusicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(MusicaService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        //
        $dependencias = [
            'musicas' => Musica::all(),
        ];
        //$musica = new Musica();
        //$m = $musica->usuario();
        //print_r($m);
        //dd($dependencias);
        return view('laravel.musicas.index', $dependencias);
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
            return redirect('/musicas')->with('sucess', 'Música cadastrada com sucesso!');
        }
        $msg = $result ? $result : "Erro ao cadastrar musica!";
        return redirect('/musicas')->with('error', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Musica  $musica
     * @return \Illuminate\Http\Response
     */
    public function showForm()
    {
        $dependencias = array(
            'idMusica' => '',
            'musica' => '',
            'usuarios' => Usuario::all(),
            'route' => "/musicas/cadastro",
        );
        return view('laravel.musicas.cadastro', $dependencias);
    }

    public function show($id)
    {
        //
        $musica = Musica::find($id);
        if (!$musica) {
            Session::flash('error', "Música inexistente!");
            return redirect('/musicas');
        }

        $dependencias = array(
            'musica' => $musica,
            'usuarios' => Usuario::all(),
            'route' => "/musicas/salvar/{$id}",
            'idMusica' => $id,
        );
        return view('laravel.musicas.cadastro', $dependencias);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Musica  $musica
     * @return \Illuminate\Http\Response
     */
    public function edit(Musica $musica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Musica  $musica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();

        $result = $this->service->update($id, $data);
        if ($result && is_bool($result)) {
            return redirect('/musicas')->with('sucess', 'Música editada com sucesso!');
        }
        $msg = $result ? $result : "Erro ao editar serviço!";
        return redirect('/musicas')->with('error', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Musica  $musica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Musica $musica)
    {
        //
    }
    public function delete($id)
    {
        $result = $this->service->delete($id);
        return response()->json($result);
    }
}
