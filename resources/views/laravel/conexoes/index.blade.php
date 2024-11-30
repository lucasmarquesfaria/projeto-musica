@extends('basic')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Conexões') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Listagem de Conexões') }}
                    </h2>
                </header>

                @include('mensagens')

                <div class="row">
                    <div class="col-md-12">
                        <table id="lista_servicos" class="table table-bordered table-striped nowrap m_datatable" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Usuário1</th>
                                <th>Usuário2</th>
                                <th>Data da Conexão</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($conexoes as $cada_conexao)
                                <tr>
                                    <th>{{$cada_conexao->usuario1->nome}}</th>
                                    <th>{{$cada_conexao->usuario2->nome}}</th>
                                    <th>{{$cada_conexao->data_conexao}}</th>
                                    <th width="15%">
                                        <a type="button" class="cadastro btn btn-primary" href="conexoes/visualizar/{{$cada_conexao->id}}"> Editar</a>
                                        <a type="button" class="btn btn-danger" onclick="excluir({{$cada_conexao->id}})"> Excluir</a>
                                    </th>
                                </tr>
                                @endforeach

                                @if(count($conexoes) == 0)
                                <tr>
                                    <th colspan="4" style="text-align: center;">Nenhuma conexão está cadastrada!</th>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12" style="text-align: center;">
                        <a type="button" class="cadastro btn btn-primary" href="conexoes/cadastro"> Cadastrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script language="javascript">
    function excluir(id) {
        var token = $("[name='_token']").val();

        if (confirm("Deseja realmente excluir esta conexão?") == true) {
            $.ajax({
                url: '/conexoes/delete/' + id,
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
