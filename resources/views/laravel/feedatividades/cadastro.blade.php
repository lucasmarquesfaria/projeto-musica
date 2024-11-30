@extends('basic')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feed de Atividades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Cadastro e Edição de feed de atividades') }}
                    </h2>
                </header>

                @include('mensagens')

                <div class="row">
                    <div class="col-md-12">
                        <form role="form" id="form_servicos" method="POST" action="{{ $route }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{$idFeedatividades}}" />

                            <div class="form-group row {{ $errors->has('') || $errors->has('') ? ' has-error' : '' }}">
                                <div class="col-lg-6">
                                    <label>Usuário *</label>
                                    <select name='id_usuario' class="form-control" required>
                                        <option value="">Selecione</option>
                                        @foreach($usuarios as $cada_usuario)
                                            @if(old('id_usuario'))
                                                <option value="{{$cada_usuario->id}}" {{old("usuario") == $cada_usuario->id ? 'selected' : ''}}>{{$cada_usuario->nome}}
                                                </option>
                                            @elseif(isset($feedatividades))
                                                <option value="{{$cada_usuario->id}}" {{$feedatividades && $feedatividades->id_usuario == $cada_usuario->id ? "selected" : ""}}>{{$cada_usuario->nome}}
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
                                    <label>Atividade associada *</label>
                                    <input type="text" placeholder="digite a ativiade" name='atividade' class="form-control" required
                                        value="{{$feedatividades && $feedatividades['atividade'] ? $feedatividades['atividade'] : ''}}">
                                    @if ($errors->has('atividade'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('atividade') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('') ? ' has-error' : '' }}">

                                <div class="col-lg-6">
                                    <label>Data da Atividade *</label>
                                    <input type="date" name="data_atividade" class="form-control" required
                                         value="{{$feedatividades && $feedatividades->data_atividade ? $feedatividades->data_atividade : ''}}">
                                    @if ($errors->has('data_atividade'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('data_atividade') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



                            <div class="col-md-12" style="text-align: center;">
                                <a type="button" class="cadastro btn btn-secondary" href="/feedatividades"><i class="fa fa-history"></i> Voltar</a>
                                <button type="submit" class="salvar btn btn-primary"><i class="fa fa-check"></i> Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
