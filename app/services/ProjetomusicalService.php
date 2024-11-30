<?php

namespace App\Services;

use App\Models\MembrosProjeto;
use App\Models\Musica;
use App\Models\ProjetoMusical;
use Illuminate\Support\Facades\DB;

class ProjetomusicalService {

    public function storage(array $data)
    {
        try {
            DB::beginTransaction();

            $projetomusical = new ProjetoMusical();
            $projetomusical->nome = $data['nome'];
            $projetomusical->descricao = $data['descricao'];

            $projetomusical->save();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update($id, array $data)
    {
        try {
            $projetomusical = ProjetoMusical::find($id);
            if (!$projetomusical) {
                return "Música inexistente!";
            }

            DB::beginTransaction();

            $projetomusical->nome = $data['nome'];
            $projetomusical->descricao = $data['descricao'];
            $projetomusical->save();


            DB::commit();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function delete($id)
    {
        try {
            $projetomusical = ProjetoMusical::find($id);
            if (!$projetomusical) {
                return "Projeto musical inexistente!";
            }

            DB::beginTransaction();
            $tem_membrosprojeto = MembrosProjeto::where("id_projeto", $id)->first();
            if ($tem_membrosprojeto) {
                return array('msg' => 'Não é possível excluir o projeto musical, pois o mesmo está vinculado a algum membrosprojeto! Por favor, exclua o membrosprojeto primeiro.', 'tipo' => 'error');
            }
            // Exclui
            $projetomusical->delete();

            DB::commit();
        } catch (\Exception $e) {
            return array('msg' => 'Error ao excluir projeto musical!', 'tipo' => 'error');
        }
        return array('msg' => 'Sucesso ao excluir projeto musical!', 'tipo' => 'success');
    }
}
