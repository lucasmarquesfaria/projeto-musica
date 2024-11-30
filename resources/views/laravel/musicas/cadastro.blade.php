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
                        {{ __('Cadastro e Edição de Músicas') }}
                    </h2>
                </header>

                @include('mensagens')

                <div class="row">
                    <div class="col-md-12">
                        <form role="form" id="form_servicos" method="POST" action="{{ $route }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{$idMusica}}" />

                            <div class="form-group row {{ $errors->has('usuario') || $errors->has('titulo') ? ' has-error' : '' }}">
                                <div class="col-lg-6">
                                    <label>Usuário *</label>
                                    <select name='id_usuario' class="form-control" required>
                                        <option value="">Selecione</option>
                                        @foreach($usuarios as $cada_usuario)
                                            @if(old('usuario'))
                                                <option value="{{$cada_usuario->id}}" {{old("usuario") == $cada_usuario->id ? 'selected' : ''}}>{{$cada_usuario->nome}}
                                                </option>
                                            @elseif(isset($musica))
                                                <option value="{{$cada_usuario->id}}" {{$musica && $musica->usuario_id == $cada_usuario->id ? "selected" : ""}}>{{$cada_usuario->nome}}
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
                                    <label>Título da Música *</label>
                                    <input type="text" placeholder="Título" name='titulo' class="form-control" required
                                        value="{{$musica && $musica['titulo'] ? $musica['titulo'] : ''}}">
                                    @if ($errors->has('titulo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('titulo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('descricao') ? ' has-error' : '' }}">
                                <div class="col-lg-6">
                                    <label>Gênero *</label>
                                    <input type="text" name="genero" class="form-control" required
                                        placeholder="Gênero" value="{{$musica && $musica->genero ? $musica->genero : ''}}">
                                    @if ($errors->has('genero'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('genero') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label>Data do Upload da Música *</label>
                                    <input type="date" name="data_upload" class="form-control" required
                                         value="{{$musica && $musica->data_upload ? $musica->data_upload : ''}}">
                                    @if ($errors->has('data_upload'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('data_upload') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('artista') ? ' has-error' : '' }}">
                                <div class="col-lg-6">
                                    <label>Artista *</label>
                                    <input type="text" name="artista" class="form-control" required
                                        placeholder="Artista" value="{{$musica && $musica->artista ? $musica->artista : ''}}">
                                    @if ($errors->has('artista'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('artista') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-12" style="text-align: center;">
                                <a type="button" class="cadastro btn btn-secondary" href="/musicas"><i class="fa fa-history"></i> Voltar</a>
                                <button type="submit" class="salvar btn btn-primary"><i class="fa fa-check"></i> Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
