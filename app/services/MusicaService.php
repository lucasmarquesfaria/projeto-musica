<?php

namespace App\Services;
use App\Models\Musica;
use Illuminate\Support\Facades\DB;

class MusicaService {

    public function storage(array $data)
    {
        try {
            DB::beginTransaction();

            $musica = new Musica();
            $musica->titulo = $data['titulo'];
            $musica->genero = $data['genero'];
            $musica->data_upload = $data['data_upload'];
            $musica->id_usuario = $data['id_usuario'];
            $musica->artista = $data['artista'];
            $musica->save();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update($id, array $data)
    {
        try {
            $musica = Musica::find($id);
            if (!$musica) {
                return "Música inexistente!";
            }

            DB::beginTransaction();

            $musica->titulo = $data['titulo'];
            $musica->genero = $data['genero'];
            $musica->data_upload = $data['data_upload'];
            $musica->id_usuario = $data['id_usuario'];
            $musica->artista = $data['artista'];
            $musica->save();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function delete($id)
    {
        try {
            $musica = Musica::find($id);
            if (!$musica) {
                return "Música inexistente!";
            }

            DB::beginTransaction();

            // Exclui
            $musica->delete();

            DB::commit();
        } catch (\Exception $e) {
            return array('msg' => 'Error ao excluir música!', 'tipo' => 'error');
        }
        return array('msg' => 'Sucesso ao excluir música!', 'tipo' => 'success');
    }
}
