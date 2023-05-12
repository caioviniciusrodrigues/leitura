@extends('layout.app')

@section('content')

<div class="row mt-3">

        <div class="col-md-12">

                <h2 class="my-4 text-left"><i class="fas fa-user-lock" aria-hidden="true"></i> Lista de Papéis</h2>

                @can('papel-create')
                   <a class="btn btn-success mb-4" href="{{route('papeis.create')}}"> Adicionar</a>
                @endcan

                <table id="dataTable" class="display nowrap" width="100" style="width: 100% !important;">
                    <thead class="tituloCard">
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($registros as $registro)
                        <tr>
                            <td>{{ $registro->id }}</td>
                            <td>{{ $registro->nome }}</td>
                            <td>{{ $registro->descricao }}</td>

                            <td>


                                <form action="{{route('papeis.destroy',$registro->id)}}" method="post">

                                    @can('papel-edit')
                                        <a title="Editar" class="btn btn-warning ml-2" href="{{ route('papeis.edit', $registro->id) }}"><i class="fas fa-edit"></i> Editar</a>
                                    @endcan

                                    @can('papel-create')
                                        <a title="Permissões" class="btn btn-primary ml-2" href="{{route('papeis.permissao', $registro->id)}}"><i class="fas fa-user-lock"></i> Permissões</a>
                                    @endcan

                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}

                                    @can('papel-delete')
                                        <button title="Deletar" class="btn btn-danger ml-2"><i class="fas fa-trash-alt"></i> Excluir</button>
                                    @endcan
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>



        </div>


@endsection
