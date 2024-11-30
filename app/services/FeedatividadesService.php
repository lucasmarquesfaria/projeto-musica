<?php

namespace App\Services;
use App\Models\FeedAtividade;
use Illuminate\Support\Facades\DB;

class FeedatividadesService {

    public function storage(array $data)
    {
        try {
            DB::beginTransaction();

            $feedatividades = new FeedAtividade();
            $feedatividades->id_usuario = $data['id_usuario'];
            $feedatividades->atividade = $data['atividade'];
            $feedatividades->data_atividade = $data['data_atividade'];
            $feedatividades->save();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update($id, array $data)
    {
        try {
            $feedatividades = FeedAtividade::find($id);
            if (!$feedatividades) {
                return "Música inexistente!";
            }

            DB::beginTransaction();

            $feedatividades->id_usuario = $data['id_usuario'];
            $feedatividades->atividade = $data['atividade'];
            $feedatividades->data_atividade = $data['data_atividade'];
            $feedatividades->save();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function delete($id)
    {
        try {
            $feedatividades = FeedAtividade::find($id);
            if (!$feedatividades) {
                return "Música inexistente!";
            }

            DB::beginTransaction();

            // Exclui
            $feedatividades->delete();

            DB::commit();
        } catch (\Exception $e) {
            return array('msg' => 'Error ao excluir atividade!', 'tipo' => 'error');
        }
        return array('msg' => 'Sucesso ao excluir atividade!', 'tipo' => 'success');
    }
}
