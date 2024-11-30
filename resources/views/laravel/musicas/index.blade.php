@extends('basic')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Músicas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Listagem de Músicas') }}
                    </h2>
                </header>

                @include('mensagens')

                <div class="row">
                    <div class="col-md-12">
                        <table id="lista_servicos" class="table table-bordered table-striped nowrap m_datatable" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Título</th>
                                <th>Gênero</th>
                                <th>Data do Upload</th>
                                <th>Nome do usuário</th>
                                <th>Artista</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($musicas as $cada_musica)
                                <tr>
                                    <th>{{$cada_musica->titulo}}</th>
                                    <th>{{$cada_musica->genero}}</th>
                                    <th>{{$cada_musica->data_upload}}</th>
                                    <th>{{$cada_musica->usuario->nome}}</th>
                                    <th>{{$cada_musica->artista}}</th>
                                    <th width="15%">
                                        <a type="button" class="cadastro btn btn-primary" href="musicas/visualizar/{{$cada_musica->id}}"> Editar</a>
                                        <a type="button" class="btn btn-danger" onclick="excluir({{$cada_musica->id}})"> Excluir</a>
                                    </th>
                                </tr>
                                @endforeach

                                @if(count($musicas) == 0)
                                <tr>
                                    <th colspan="4" style="text-align: center;">Nenhuma música está cadastrada!</th>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12" style="text-align: center;">
                        <a type="button" class="cadastro btn btn-primary" href="musicas/cadastro"> Cadastrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script language="javascript">
    function excluir(id) {
        var token = $("[name='_token']").val();

        if (confirm("Deseja realmente excluir esta música?") == true) {
            $.ajax({
                url: '/musicas/delete/' + id,
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
