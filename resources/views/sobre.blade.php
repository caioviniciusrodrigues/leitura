@extends('layout.app')

@section('content')

    <div class="row mt-5 col d-flex justify-content-center">
        <div class="col-md-6 text-center">
            <div class="card">

                <div class="card-header tituloCard"><i class="fas fa-info-circle"></i> Sobre o Sistema</div>

                <div class="card-body">
                    <p style="font-family: 'lemon'  !important">
                        DTI :: Gerenciamento Telefonia
                    </p>
                    <img src="{{ asset('/img/about.png') }}"/><br><br>
                </div>

                <div class="card-footer" style="font-family: 'lemon'  !important">
                    Versão: {{ env('VERSAO_PROJETO') }}<br><br>
                    DTI - Divisão de Tecnologia da Informação<br>
                    ©  {{ date('Y') }}  Copyright: <a target="_blank" href="http://www.saocaetanodosul.sp.gov.br/"> Prefeitura Municipal de São Caetano do Sul</a>. Todos os direitos reservados.
                </div>
            </div>
        </div>
    </div>

@endsection
