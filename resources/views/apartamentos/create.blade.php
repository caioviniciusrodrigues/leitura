@extends('layout.app')

@section('content')

<!--SEÇÃO FILTROS-->
<section class="search-banner py-1 mt-3 mb-3" id="search-banner">
    <div class="row mx-auto justify-content-center align-items-center flex-column">
        <div class="col-md-12">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Lista E1</a></li>
                <li class="breadcrumb-item active" aria-current="page">Criar E1</li>
            </ol>
        </nav>

        <h3 class="mt-3"> <i class="fas fa-file"></i> Criar Novo E1</h3>

         <div class="card">
            <div class="card-body">

                <form action="{{ route('e1.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col">
                            <div class="form-group">
                                <label for="e1_nome">Descrição*</label>
                                <input style="width: 100%" type="text" maxlength="20" id="e1_nome" name="e1_nome" required class="form-control {{ $errors->has('e1_nome') ? 'is-invalid' : '' }}"/>
                            </div>


                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label for="secr_id">Secretarias*:</label>
                                        <select style="width: 100%" name="secr_id" id="secr_id" class="form-control js-example-basic-single" data-live-search='true'>
                                                <option value=""></option>
                                            @foreach($secretarias as $secretaria)
                                                <option value="{{ $secretaria->secr_id }}">{{ $secretaria->secr_nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label for="dept_id">Departamento*:</label>
                                        <select style="width: 100%" name="dept_id" id="dept_id" class="form-control js-example-basic-single" data-live-search='true'>
                                                <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="e1_origem">Origem*</label>
                                <input style="width: 100%" type="text" maxlength="200" id="e1_origem" name="e1_origem" required class="form-control {{ $errors->has('e1_origem') ? 'is-invalid' : '' }}"/>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success mt-2" name="search">
                                    <i class="fas fa-save"></i> Salvar
                                </button>
                                <a href="{{ route('e1.index') }}" class="btn btn-warning ml-2 mt-2">
                                    <i class="fas fa-arrow-alt-circle-left"></i> Voltar
                                </a>
                                <button type="reset" id="btnreset" class="btn btn-danger ml-2 mt-2">
                                    <i class="fas fa-trash"></i> Limpar
                                </button>
                                <a href="{{ route('e1.index') }}" class="btn btn-primary ml-2 mt-2">
                                    <i class="fas fa-search"></i> Pesquisar
                                </a>
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
