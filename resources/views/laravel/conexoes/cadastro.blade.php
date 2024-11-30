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
                        {{ __('Cadastro e Edição de Conexões') }}
                    </h2>
                </header>

                @include('mensagens')

                <div class="row">
                    <div class="col-md-12">
                        <form role="form" id="form_servicos" method="POST" action="{{ $route }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{$idConexao}}" />

                            <div class="form-group row {{ $errors->has('') || $errors->has('') ? ' has-error' : '' }}">
                                <div class="col-lg-6">
                                    <label>Usuário 1 *</label>
                                    <select name='id_usuario1' class="form-control" required>
                                        <option value="">Selecione</option>
                                        @foreach($usuarios as $cada_usuario)
                                            @if(old('id_usuario1'))
                                                <option value="{{$cada_usuario->id}}" {{old("id_usuario1") == $cada_usuario->id ? 'selected' : ''}}>{{$cada_usuario->nome}}
                                                </option>
                                            @elseif(isset($conexao))
                                                <option value="{{$cada_usuario->id}}" {{$conexao && $conexao->id_usuario1 == $cada_usuario->id ? "selected" : ""}}>{{$cada_usuario->nome}}
                                                </option>
                                            @else
                                                <option value="{{$cada_usuario->id}}">{{$cada_usuario->nome}}
                                                </option>
                                            @endif

                                        @endforeach
                                    </select>
                                    @if ($errors->has('usuario'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('usuario') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label>Usuário 2 *</label>
                                    <select name='id_usuario2' class="form-control" required>
                                        <option value="">Selecione</option>
                                        @foreach($usuarios as $cada_usuario)
                                            @if(old('usuario'))
                                                <option value="{{$cada_usuario->id}}" {{old("usuario") == $cada_usuario->id ? 'selected' : ''}}>{{$cada_usuario->nome}}
                                                </option>
                                            @elseif(isset($conexao))
                                                <option value="{{$cada_usuario->id}}" {{$conexao && $conexao->id_usuario2 == $cada_usuario->id ? "selected" : ""}}>{{$cada_usuario->nome}}
                                                </option>
                                            @else
                                                <option value="{{$cada_usuario->id}}">{{$cada_usuario->nome}}
                                                </option>
                                            @endif

                                        @endforeach
                                    </select>
                                    @if ($errors->has('usuario'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('usuario') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group row {{ $errors->has('data_conexao') ? ' has-error' : '' }}">

                                <div class="col-lg-6">
                                    <label>Data da Conexão *</label>
                                    <input type="date" name="data_conexao" class="form-control" required
                                         value="{{$conexao && $conexao->data_conexao ? $conexao->data_conexao : ''}}">
                                    @if ($errors->has('data_conexao'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('data_conexao') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-12" style="text-align: center;">
                                <a type="button" class="cadastro btn btn-secondary" href="/conexoes"><i class="fa fa-history"></i> Voltar</a>
                                <button type="submit" class="salvar btn btn-primary"><i class="fa fa-check"></i> Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
