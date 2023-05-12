@extends('layout.app')

@section('content')


		<div class="row mt-3">

            <div class="col-md-12">

                <h2 class="center mt-2 text-center">Adicionar Papéis para <span class="badge badge-pill badge-success"> {{ $usuario->name }} </span></h2>

                <div class="card">
                    <div class="card-header"><i class="fas fa-user-lock"></i> Papéis</div>

                        <div class="card-body">

                            <form action="{{route('usuarios.papel.store',$usuario->id)}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <select style="width: 100%" name="papel_id" id="papel_id" class="form-control js-example-basic-single" required data-live-search='true'>
                                    @foreach($papel as $valor)
                                        <option value="{{ $valor->id }}"> {{ $valor->nome }} </option>
                                    @endforeach
                                </select>
                            </div>
                                <a href="{{ route('user.list') }}" class="btn btn-warning">
                                    <i class="fas fa-arrow-alt-circle-left"></i> Voltar
                                </a>

                                <button class="btn btn-success ml-2"><i class="fas fa-plus"></i> Adicionar</button>

                            </form>
                        </div>
                </div>

            </div>

		</div>

		<div class="row mt-3">

            <div class="col-md-12">

                <table id="dataTable" class="display nowrap" width="100" style="width: 100% !important;">
                    <thead class="tituloCard">
                        <tr>

                            <th>Papel</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($usuario->papeis as $papel)
                        <tr>
                            <td>{{ $papel->nome }}</td>
                            <td>{{ $papel->descricao }}</td>

                            <td>

                                <form action="{{route('usuarios.papel.destroy',[$usuario->id,$papel->id])}}" method="post">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button title="Deletar" class="btn btn-danger"><i class="fa fa-trash"></i> Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

		</div>

	</div>

@endsection
