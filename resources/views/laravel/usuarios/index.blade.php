@extends('basic')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Listagem de Usuários') }}
                    </h2>
                </header>

                @include('mensagens')

                <div class="row">
                    <div class="col-md-12">
                        <table id="lista_animais" class="table table-bordered table-striped nowrap m_datatable" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Nome usuário</th>
                                <th>Senha</th>
                                <th>Foto Perfil</th>
                                <th>Descrição</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $cada_usuario)
                                <tr>
                                    <th>{{$cada_usuario->nome}}</th>
                                    <th>{{$cada_usuario->nome_usuario}}</th>
                                    <th>{{$cada_usuario->senha}}</th>
                                    <th>{{$cada_usuario->foto_perfil}}</th>
                                    <th>{{$cada_usuario->descricao}}</th>
                                    <th width="15%">
                                        <a type="button" class="cadastro btn btn-primary" href="usuarios/visualizar/{{$cada_usuario->id}}"> Editar</a>
                                        <a type="button" class="btn btn-danger" onclick="excluir({{$cada_usuario->id}})"> Excluir</a>
                                    </th>
                                </tr>
                                @endforeach

                                @if(count($usuarios) == 0)
                                <tr>
                                    <th colspan="5" style="text-align: center;">Nenhum usuário cadastrado!</th>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12" style="text-align: center;">
                        <a type="button" class="cadastro btn btn-primary" href="usuarios/cadastro"> Cadastrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script language="javascript">
    function excluir(id) {
        var token = $("[name='_token']").val();

        if (confirm("Deseja realmente excluir este usuário?") == true) {
            $.ajax({
                url: '/usuarios/delete/' + id,
                datatype: 'json',
                type: 'POST',
                data:
                {_method: 'delete', _token: token},
                success: function (data) {
                    alert(data.msg);
                    location.reload();
                },
                error: function (error) {
                }
            });
        }
    }
</script>