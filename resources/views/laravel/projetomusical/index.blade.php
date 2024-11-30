@extends('basic')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projetos Musicais') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Listagem de projetos musicais') }}
                    </h2>
                </header>

                @include('mensagens')

                <div class="row">
                    <div class="col-md-12">
                        <table id="lista_servicos" class="table table-bordered table-striped nowrap m_datatable" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Nome do projeto</th>
                                <th>Descrição do projeto</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($projetomusical as $cada_projetomusical)
                                <tr>
                                    <th>{{$cada_projetomusical->nome}}</th>
                                    <th>{{$cada_projetomusical->descricao}}</th>
                                    <th width="15%">
                                        <a type="button" class="cadastro btn btn-primary" href="projetomusical/visualizar/{{$cada_projetomusical->id}}"> Editar</a>
                                        <a type="button" class="btn btn-danger" onclick="excluir({{$cada_projetomusical->id}})"> Excluir</a>
                                    </th>
                                </tr>
                                @endforeach

                                @if(count($projetomusical) == 0)
                                <tr>
                                    <th colspan="4" style="text-align: center;">Nenhum projeto está cadastrado!</th>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12" style="text-align: center;">
                        <a type="button" class="cadastro btn btn-primary" href="projetomusical/cadastro"> Cadastrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script language="javascript">
    function excluir(id) {
        var token = $("[name='_token']").val();

        if (confirm("Deseja realmente excluir este projeto?") == true) {
            $.ajax({
                url: '/projetomusical/delete/' + id,
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
