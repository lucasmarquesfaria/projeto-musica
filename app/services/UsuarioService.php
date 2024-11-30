<?php

namespace App\Services;

use App\Models\Conexao;
use App\Models\FeedAtividade;
use App\Models\MembrosProjeto;
use App\Models\Musica;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class UsuarioService {


    public function storage(array $data) {
        try {
            DB::beginTransaction();
            $usuario = new Usuario();
            $usuario->nome = $data['nome'];
            $usuario->nome_usuario = $data['nome_usuario'];
            $usuario->senha = $data['senha'];
            $usuario->foto_perfil = $data['foto_perfil'];
            $usuario->descricao = $data['descricao'];
            $usuario->save();

            DB::commit();
            return true;
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
            //return 'Deu zebra';
        }
    }

    public function update($id, array $data)
    {
        try {
            $usuario = Usuario::find($id);
            if (!$usuario) {
                return "Usuário inexistente!";
            }

            DB::beginTransaction();

            $usuario->nome = $data['nome'];
            $usuario->nome_usuario = $data['nome_usuario'];
            $usuario->senha = $data['senha'];
            $usuario->foto_perfil = $data['foto_perfil'];
            $usuario->descricao = $data['descricao'];
            $usuario->save();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $usuario = Usuario::find($id);
            if (!$usuario) {
                return "Usuário inexistente!";
            }

            DB::beginTransaction();

            $tem_musicas = Musica::where("id_usuario", $id)->first();
            if ($tem_musicas) {
                return array('msg' => 'Não é possível excluir o usuário, pois o mesmo está vinculado a alguma música! Por favor, exclua a música primeiro.', 'tipo' => 'error');
            }
            $tem_conexoes1 = Conexao::where("id_usuario1", $id)->first();
            if ($tem_conexoes1) {
                return array('msg' => 'Não é possível excluir o usuário, pois o mesmo está vinculado a conexao usuário1! Por favor, exclua a conexão1 primeiro.', 'tipo' => 'error');
            }
            $tem_conexoes2 = Conexao::where("id_usuario2", $id)->first();
            if ($tem_conexoes2) {
                return array('msg' => 'Não é possível excluir o usuário, pois o mesmo está vinculado a conexao usuário2! Por favor, exclua a conexão2 primeiro.', 'tipo' => 'error');
            }
            $tem_membrosprojeto = MembrosProjeto::where("id_usuario", $id)->first();
            if ($tem_membrosprojeto) {
                return array('msg' => 'Não é possível excluir o usuário, pois o mesmo está vinculado a algum projeto musical! Por favor, exclua o projeto musical primeiro.', 'tipo' => 'error');
            }
            $tem_feedatividades = FeedAtividade::where("id_usuario", $id)->first();
            if ($tem_feedatividades) {
                return array('msg' => 'Não é possível excluir o usuário, pois o mesmo está vinculado a alguma atividade! Por favor, exclua a atividade primeiro.', 'tipo' => 'error');
            }


            // Exclui
            $usuario->delete();

            DB::commit();
        } catch (\Exception $e) {
            return array('msg' => 'Erro ao excluir usuário!', 'tipo' => 'error');
        }
        return array('msg' => 'Sucesso ao excluir usuário!', 'tipo' => 'success');
    }
}


