<?php

namespace App\Services;
use App\Models\Conexao;
use Illuminate\Support\Facades\DB;

class ConexaoService {

    public function storage(array $data)
    {
        try {
            DB::beginTransaction();

            $conexao = new conexao();
            $conexao->id_usuario1 = $data['id_usuario1'];
            $conexao->id_usuario2 = $data['id_usuario2'];
            $conexao->data_conexao = $data['data_conexao'];

            $conexao->save();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update($id, array $data)
    {
        try {
            $conexao = Conexao::find($id);
            if (!$conexao) {
                return "Conexão inexistente!";
            }

            DB::beginTransaction();

            $conexao->id_usuario1 = $data['id_usuario1'];
            $conexao->id_usuario2 = $data['id_usuario2'];
            $conexao->data_conexao = $data['data_conexao'];
            $conexao->save();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function delete($id)
    {
        try {
            $conexao = Conexao::find($id);
            if (!$conexao) {
                return "Conexão inexistente!";
            }

            DB::beginTransaction();

            // Exclui
            $conexao->delete();

            DB::commit();
        } catch (\Exception $e) {
            return array('msg' => 'Error ao excluir conexão!', 'tipo' => 'error');
        }
        return array('msg' => 'Sucesso ao excluir conexão!', 'tipo' => 'success');
    }
}
