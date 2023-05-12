@extends('layout.app')

@section('content')

<div class="row mt-4">

    <div class="col-md-12">

            <div class="card">

                <div class="card-header">Cadastro de Papéis</div>

                    <div class="card-body">

                        <form action="{{ route('papeis.store') }}" method="post">

                            {{csrf_field()}}
                            @include('admin.papel._form')

                            <div class="col-md-4">
                                <button class="btn btn-success"><i class="fas fa-plus"></i> Adicionar</button>
                            </div>
                        </form>

                    </div>

            </div>

        </div>

</div>

@endsection
