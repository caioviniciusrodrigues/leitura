@extends('layout.app')

@section('content')

    <!--SEÇÃO FILTROS-->
        <div class="row mt-3">
            <div class="col-md-12">

            <h4 class="my-4 text-left"><i class="fas fa-cubes" aria-hidden="true"></i> Lista de E1</h4>

            <fieldset>
                <div id="accordion">
                    <div class="card">
                      <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <legend class="tituloPortal"> <h5> <i class="fas fa-search"></i> Filtros para pesquisa</h5></legend>
                          </button>
                        </h5>
                      </div>
                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <form action="{{ route('apartamento.search') }}" method="POST">
                                @csrf

                            <div class="card">
                                <div class="card-body">

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="unidade" class="mr-2">Unidade:</label>
                                                    <input style="width: 100%" type="text" placeholder="Nome" id="unidade" name="unidade" class="form-control"/>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mt-3">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary mt-2" name="search">
                                                        <i class="fas fa-search"></i> Pesquisar
                                                    </button>
                                                    <a id="btnreset" href="{{ route('apartamento.index') }}" class="btn btn-danger ml-2 mt-2">
                                                        <i class="fas fa-trash-alt"></i> Limpar
                                                    </a>

                                                        <a href="{{ route('apartamento.create') }}" class="btn btn-success ml-2 mt-2">
                                                            <i class="fas fa-plus"></i> Novo
                                                        </a>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>

            </fieldset>
            </div>
        </div>
    <!--FIM SEÇÃO FILTROS-->
<!--</div>-->

<div class="row">
    <div class="col">
        @can('apartamento-create')
            <a href="{{ route('apartamento.create') }}" class="btn btn-success mt-4">
                <i class="fas fa-plus"></i> Novo
            </a>
        @endcan
    </div>
</div>

@if(count($apartamentos) > 0)
        <!-- Portfolio Item Heading -->

        <hr>

                <div class="row">
                    <div class="col-md-12">
                        <table id="dataTable" class="table" width="100" style="width: 100% !important;">
                            <thead class="thead-light tituloCard">
                                <tr>
                                <th>Unidade</th>
                                <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($apartamentos as $apartamento)
                                    <tr>
                                        <td>{{ $apartamento->unidade  ?? 'A preencher' }}</td>

                                        <td style="text-align: center;">

                                            <a title="Visualizar Detalhes em Tela" id="navegar" href="{{ route('apartamento.show', ['e1' => $apartamento->e1_id]) }}" class="btn btn-primary ml-2 mt-2">
                                                <i class="fas fa-eye"></i>
                                            </a>


                                            <a title="Editar" href="{{ route('apartamento.edit', ['e1' => $apartamento->e1_id]) }}" class="btn btn-warning ml-2 mt-2">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="#" title="Excluir" class="btn btn-danger ml-2 mt-2 delete" onclick="deleteConfirmation({{ $apartamento->e1_id  }})"><i class="fa fa-trash" aria-hidden="true"></i> </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                    </div>
                </div>


        @else
            <h4 class="my-4 text-center"><span class="badge badge-pill badge-danger">Sua busca não encontrou registros</span></h4>
        @endif

@endsection


@section('script')
    <script type="text/javascript">


    </script>

@endsection

