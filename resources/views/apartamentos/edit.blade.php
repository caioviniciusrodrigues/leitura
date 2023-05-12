@extends('layout.app')

@section('css')
<style>
    .selectreadonly {
        background: #EEE;
        pointer-events: none;
        touch-action: none;
    }
</style>
@endsection

@section('content')
<!--SEÇÃO FILTROS-->
<section class="search-banner py-1 mt-3" id="search-banner">
    <div class="row">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('e1.index')}}">Lista E1</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('e1.show', ['e1' => $e1->e1_id]) }}">Visualizar E1</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Editar E1</li>
                </ol>
            </nav>

          <h3 class="mt-3"> <i class="fas fa-edit"></i> Editar E1: <span class="badge badge-pill badge-primary">{{ $e1->e1_nome }}</span> </h3>


          <div class="card">
              <div class="card-body">

                  <form action="{{  route('e1.update', ['e1' => $e1->e1_id ])  }}" method="POST">
                    {{ method_field('PUT') }}
                    @csrf

                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="e1_nome">Descrição</label>
                                    <input style="width: 100%" type="text" maxlength="200" id="e1_nome" name="e1_nome" value="{{ $e1->e1_nome }}"  required class="form-control {{ $errors->has('e1_nome') ? 'is-invalid' : '' }}"/>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="secr_id">Secretarias*:</label>
                                            <select style="width: 100%" name="secr_id" id="secr_id" class="form-control js-example-basic-single" data-live-search='true'>
                                                    <option value=""></option>
                                                @foreach($secretarias as $secretaria)
                                                    <option value="{{ $secretaria->secr_id }}" @if($secretaria->secr_id == $e1->departamento->secretaria->secr_id) selected="selected" @endif > {{ $secretaria->secr_nome }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="dept_id">Departamento:</label>
                                    <select style="width: 100%" name="dept_id" id="dept_id" class="form-control js-example-basic-single" required data-live-search='true'>
                                        @foreach($departamentos as $departamento)
                                            <option id="opt_{{ $departamento->dept_id }}" value="{{ $departamento->dept_id }}" @if($departamento->dept_id == $e1->departamento->dept_id) selected="selected" @endif >Cód. Depto. {{ $departamento->dept_codigo }} - {{ $departamento->dept_nome }} - {{ $departamento->dept_endereco }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="e1_origem">Origem*</label>
                                    <input style="width: 100%" type="text" maxlength="200" id="e1_origem" name="e1_origem" value="{{ $e1->e1_origem }}" required class="form-control {{ $errors->has('e1_origem') ? 'is-invalid' : '' }}"/>
                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">

                                    @can('e1-edit')
                                        <button type="submit" class="btn btn-success mt-2" name="search">
                                            <i class="fas fa-save"></i> Salvar
                                        </button>
                                    @endcan

                                    <a href="{{ route('e1.index') }}" class="btn btn-warning ml-2 mt-2">
                                        <i class="fas fa-arrow-alt-circle-left"></i> Voltar
                                    </a>

                                    @can('e1-view')
                                        <a title="Visualizar" href="{{ route('e1.show', ['e1' => $e1->e1_id]) }}" class="btn btn-secondary ml-2 mt-2">
                                            <i class="fas fa-eye"></i> Visualizar
                                        </a>
                                    @endcan

                                    @can('e1-create')
                                        <a href="{{ route('e1.create') }}" class="btn btn-primary ml-2 mt-2">
                                            <i class="fas fa-plus"></i> Novo
                                        </a>
                                    @endcan


                                </div>
                            </div>
                        </div>

                </form>
            </div>
        </div>
      </div>
   </div>
</section>
@endsection

@section('script')
<script>
$(document).ready(function() {

    //LIMPAR SELECTS
    $('#btnreset').click(function() {
        $("select").val('').trigger('change');
    });


    //Carregar Combo
    $("#secr_id").change(function(){

        let valor = $(this).val();
        $('#dept_id').empty();

        if(valor) {

            var url = "{{ route('e1.buscadepartamentos', '_valor_') }}".replace('_valor_', valor);

            $.get(  url, function( data ) {
                $('#dept_id').show();
                $.each(data, function(index, departamentosObj){
                    $('#dept_id').append('<option value="'+ departamentosObj.dept_id +'">Cód. Depto.: ' + departamentosObj.dept_codigo + ' - Nome: ' + departamentosObj.dept_nome + ' - Endereço: ' + departamentosObj.dept_endereco +'</option>');
                });
            });

        }

    });


});


</script>
@endsection
