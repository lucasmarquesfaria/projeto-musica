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
                        {{ __('Cadastro e Edição de Usuários') }}
                    </h2>
                </header>

                @include('mensagens')

                <div class="row">
                    <div class="col-md-12">
                        <form role="form" id="form_animais" method="POST" action="{{ $route }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{$idUsuario}}" />

                            <div class="form-group row {{ $errors->has('nome') || $errors->has('nome_usuario') ? ' has-error' : '' }}">
                                <div class="col-lg-6">
                                    <label>Nome *</label>
                                    <input type="text" placeholder="Nome" name='nome' class="form-control" required
                                        value="{{$usuario && $usuario['nome'] ? $usuario['nome'] : ''}}">
                                    @if ($errors->has('nome'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nome') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label>Nome Usuário *</label>
                                    <input type="text" placeholder="Nome usuário" name='nome_usuario' class="form-control" required
                                        value="{{$usuario && $usuario['nome_usuario'] ? $usuario['nome_usuario'] : ''}}">
                                    @if ($errors->has('nome_usuario'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nome_usuario') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('nome') || $errors->has('nome_usuario') ? ' has-error' : '' }}">
                                <div class="col-lg-6">
                                    <label>Senha *</label>
                                    <input type="text" placeholder="Senha" name='senha' class="form-control" required
                                        value="{{$usuario && $usuario['senha'] ? $usuario['senha'] : ''}}">
                                    @if ($errors->has('senha'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('senha') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label>Foto Perfil *</label>
                                    <input type="text" placeholder="Foto Perfil" name='foto_perfil' class="form-control" required
                                        value="{{$usuario && $usuario['foto_perfil'] ? $usuario['foto_perfil'] : ''}}">
                                    @if ($errors->has('foto_perfil'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('foto_perfil') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('nome') || $errors->has('nome_usuario') ? ' has-error' : '' }}">
                                <div class="col-lg-6">
                                    <label>Descrição *</label>
                                    <input type="text" placeholder="Descrição" name='descricao' class="form-control" required
                                        value="{{$usuario && $usuario['descricao'] ? $usuario['descricao'] : ''}}">
                                    @if ($errors->has('descricao'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('descricao') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12" style="text-align: center;">
                                <a type="button" class="cadastro btn btn-secondary" href="/usuarios"><i class="fa fa-history"></i> Voltar</a>
                                <button type="submit" class="salvar btn btn-primary"><i class="fa fa-check"></i> Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
