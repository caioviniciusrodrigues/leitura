@extends('layout.app')

@section('content')

		<div class="row mt-3">

            <div class="col-md-12">

                <h2 class="center mt-2 text-center">Adicionar Permissões para o papel <span class="badge badge-pill badge-success"> {{ $papel->nome }}</span></h2>

                <div class="card">
                    <div class="card-header"><i class="fas fa-user-lock"></i> Permissões</div>

                        <div class="card-body">

                            <form action="{{route('papeis.permissao.store',$papel->id)}}" method="post">
                                @csrf
                            <div class="form-group">
                                <select style="width: 100%" name="permissao_id" id="permissao_id" class="form-control js-example-basic-single" required data-live-search='true'>
                                    @foreach($permissoes as $valor)
                                        <option value="{{$valor->id}}">{{$valor->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                                <a href="{{ route('papeis.index') }}" class="btn btn-warning">
                                    <i class="fas fa-arrow-alt-circle-left"></i> Voltar
                                </a>

                                <button class="btn btn-primary"><i class="  fas fa-plus"></i> Adicionar</button>

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

                            <th>Permissão</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($papel->permissoes as $permissao)
                        <tr>
                            <td>{{ $permissao->nome }}</td>
                            <td>{{ $permissao->descricao }}</td>

                            <td>

                                <form action="{{route('papeis.permissao.destroy',[$papel->id,$permissao->id])}}" method="post">
                                        {{ method_field('DELETE') }}
                                        @csrf
                                        <button title="Deletar" class="btn btn-danger"><i class="fa fa-trash"></i> Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
		</div>


@endsection
