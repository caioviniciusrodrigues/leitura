@extends('layout.app')


@section('content')

<div class="row mt-5 col d-flex justify-content-center">
    <div class="col-md-6 text-center">
        <div class="card">
            <div class="card-header tituloCard text-center">Meus Dados</div>

            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">

                        <p>
                            Nome: {{ $usuario->name }}
                        </p>
                        <p>
                            E-mail: {{ $usuario->email }}
                        </p>

                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th class="tituloCard" scope="col">Meus Papéis no Sistema</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($papeis as $papel)
                                <tr>
                                    <td>{{ $papel->nome }} - {{ $papel->descricao }}</td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>

            <div class="card-footer">

                <div class="card-header tituloCard text-center">Atualizar Meus Dados</div> <br>

                <form action="{{  route('user.mudarperfil', ['usuario' => $usuario->id ])  }}" method="POST">
                    @csrf

                    <input id="email" hidden type="text" class="form-control" name="email" value="{{ $usuario->email }}">
                    <input id="status" hidden type="text" class="form-control" name="status" value="{{ $usuario->status }}">

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


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('dashboard.index') }}" class="btn btn-warning">
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
