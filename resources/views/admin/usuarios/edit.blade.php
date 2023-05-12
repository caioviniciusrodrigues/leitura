@extends('layout.app')

@section('content')

<div class="row mt-4">
    <div class="col">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('user.list') }}">Lista de Usuários</a></li>
              <li class="breadcrumb-item"><a href="{{ route('user.show', ['id' => $usuario->id]) }}">Visualizar Usuário</a></li>
              <li class="breadcrumb-item active" aria-current="page">Editar Usuário</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row justify-content-center mt-2">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulário de Edição de Usuário</div>

                <div class="card-body">
                    <form action="{{  route('user.update', ['usuario' => $usuario->id ])  }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $usuario->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $usuario->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmação de Senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Status ( Ativar ou Desativar)</label>

                            <div class="col-md-6">
                                <select  class="form-control" name="status">
                                    <option value="1" {{ (old('status') == '1' ? 'selected' : ($usuario->status == '1' ? 'selected' : '')) }}>Ativo</option>
                                    <option value="0" {{ (old('status') == '0' ? 'selected' : ($usuario->status == '0' ? 'selected' : '')) }}>Desativado</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('user.list') }}" class="btn btn-warning">
                                    <i class="fas fa-arrow-alt-circle-left"></i> Voltar
                                </a>
                                <button type="submit" class="btn btn-success ml-2">
                                    <i class="fas fa-save"></i> Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
