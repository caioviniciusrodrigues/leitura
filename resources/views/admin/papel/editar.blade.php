@extends('layout.app')

@section('content')


<div class="row mt-3">

    <div class="col-md-12">


            <div class="card">

                <div class="card-header">Editar Papel</div>

                    <div class="card-body">

                        <form action="{{ route('papeis.update',$registro->id) }}" method="post">

                            {{csrf_field()}}
                            {{ method_field('PUT') }}
                            @include('admin.papel._form')

                            <div class="col-md-4">

                                <button class="btn btn-warning"> <i class="fas fa-arrow-alt-circle-left"></i> Voltar</button>

                                @can('papel-edit')
                                    <button class="btn btn-success ml-2"> <i class="fas fa-save"></i> Atualizar</button>
                                @endcan

                            </div>

                        </form>

                    </div>

            </div>

        </div>

	</div>

@endsection
