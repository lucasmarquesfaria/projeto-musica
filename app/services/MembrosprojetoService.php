<?php

namespace App\Services;

use App\Models\MembrosProjeto;
use Illuminate\Support\Facades\DB;

class MembrosprojetoService {

    public function storage(array $data)
    {
        try {
            DB::beginTransaction();

            $membrosprojeto = new MembrosProjeto();
            $membrosprojeto->id_projeto = $data['id_projeto'];
            $membrosprojeto->id_usuario = $data['id_usuario'];
            $membrosprojeto->funcao = $data['funcao'];

            $membrosprojeto->save();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update($id, array $data)
    {
        try {
            $membrosprojeto = MembrosProjeto::find($id);
            if (!$membrosprojeto) {
                return "Membros do projeto inexistente!";
            }

            DB::beginTransaction();

            $membrosprojeto->id_projeto = $data['id_projeto'];
            $membrosprojeto->id_usuario = $data['id_usuario'];
            $membrosprojeto->funcao = $data['funcao'];
            $membrosprojeto->save();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function delete($id)
    {
        try {
            $membrosprojeto = MembrosProjeto::find($id);
            if (!$membrosprojeto) {
                return "Membros do projeto inexistente!";
            }

            DB::beginTransaction();

            // Exclui
            $membrosprojeto->delete();

            DB::commit();
        } catch (\Exception $e) {
            return array('msg' => 'Error ao excluir membros do projeto!', 'tipo' => 'error');
        }
        return array('msg' => 'Sucesso ao excluir membros do projeto!', 'tipo' => 'success');
    }
}
