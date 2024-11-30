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
                        {{ __('Cadastro e edição de projetos musicais') }}
                    </h2>
                </header>

                @include('mensagens')

                <div class="row">
                    <div class="col-md-12">
                        <form role="form" id="form_servicos" method="POST" action="{{ $route }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{$idProjetomusical}}" />

                            <div class="form-group row {{ $errors->has('nome') || $errors->has('descricao') ? ' has-error' : '' }}">
                                <div class="col-lg-6">
                                    <label>Nome do projeto *</label>
                                    <input type="text" placeholder="Nome do projeto" name='nome' class="form-control" required
                                        value="{{$projetomusical && $projetomusical['nome'] ? $projetomusical['nome'] : ''}}">
                                    @if ($errors->has('nome'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nome') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label>Descrição do projeto *</label>
                                    <input type="text" placeholder="Descrição do projeto" name='descricao' class="form-control" required
                                        value="{{$projetomusical && $projetomusical['descricao'] ? $projetomusical['descricao'] : ''}}">
                                    @if ($errors->has('descricao'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('descricao') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-12" style="text-align: center;">
                                <a type="button" class="cadastro btn btn-secondary" href="/projetomusical"><i class="fa fa-history"></i> Voltar</a>
                                <button type="submit" class="salvar btn btn-primary"><i class="fa fa-check"></i> Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
