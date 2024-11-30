@extends('basic')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Membros projeto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Cadastro e Edição de membros projeto') }}
                    </h2>
                </header>

                @include('mensagens')

                <div class="row">
                    <div class="col-md-12">
                        <form role="form" id="form_servicos" method="POST" action="{{ $route }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{$idMembrosprojeto}}" />

                            <div class="form-group row {{ $errors->has('id_usuario') || $errors->has('id_projeto') ? ' has-error' : '' }}">
                                <div class="col-lg-6">
                                    <label>Nome do projeto  *</label>
                                    <select name='id_projeto' class="form-control" required>
                                        <option value="">Selecione</option>
                                        @foreach($projetomusical as $cada_projetomusical)
                                            @if(old('id_projeto'))
                                                <option value="{{$cada_projetomusical->id}}" {{old("id_projeto") == $cada_projetomusical->id ? 'selected' : ''}}>{{$cada_projetomusical->nome}}
                                                </option>
                                            @elseif(isset($membrosprojeto))
                                                <option value="{{$cada_projetomusical->id}}" {{$membrosprojeto && $membrosprojeto->id_projeto == $cada_projetomusical->id ? "selected" : ""}}>{{$cada_projetomusical->nome}}
                                                </option>
                                            @else
                                                <option value="{{$cada_projetomusical->id}}">{{$cada_projetomusical->nome}}
                                                </option>
                                            @endif

                                        @endforeach
                                    </select>
                                    @if ($errors->has('id_projeto'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('id_projeto') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-lg-6">
                                    <label>Nome do usuário  *</label>
                                    <select name='id_usuario' class="form-control" required>
                                        <option value="">Selecione</option>
                                        @foreach($usuarios as $cada_usuario)
                                            @if(old('id_usuario'))
                                                <option value="{{$cada_usuario->id}}" {{old("usuario") == $cada_usuario->id ? 'selected' : ''}}>{{$cada_usuario->nome}}
                                                </option>
                                            @elseif(isset($membrosprojeto))
                                                <option value="{{$cada_usuario->id}}" {{$membrosprojeto && $membrosprojeto->id_usuario == $cada_usuario->id ? "selected" : ""}}>{{$cada_usuario->nome}}
                                                </option>
                                            @else
                                                <option value="{{$cada_usuario->id}}">{{$cada_usuario->nome}}
                                                </option>
                                            @endif

                                        @endforeach
                                    </select>
                                    @if ($errors->has('id_usuario'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('id_usuario') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-lg-6">
                                    <label>Função do usuário *</label>
                                    <input type="text" placeholder="digite a função do usuário" name='funcao' class="form-control" required
                                        value="{{$membrosprojeto && $membrosprojeto['funcao'] ? $membrosprojeto['funcao'] : ''}}">
                                    @if ($errors->has('funcao'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('funcao') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>




                            <div class="col-md-12" style="text-align: center;">
                                <a type="button" class="cadastro btn btn-secondary" href="/membrosprojeto"><i class="fa fa-history"></i> Voltar</a>
                                <button type="submit" class="salvar btn btn-primary"><i class="fa fa-check"></i> Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
