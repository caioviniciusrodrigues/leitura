@extends('layout.app')

@section('content')
<div class="pt-5">
    <h1 class="text-center">Login</h1>
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card card-body">

                <form name="formLogin" action="{{ route('user.post') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group required">
                        <label for="username">Usuário</label>
                        <input type="text" class="form-control text-lowercase" id="email" required="" name="email" value="">
                    </div>
                    <div class="form-group required">
                        <label class="d-flex flex-row align-items-center" for="password">Senha</label>
                        <input type="password" class="form-control" required="" id="password" name="password" value="">
                    </div>
                    <div class="form-group pt-1">
                        <button class="btn btn-primary btn-block" type="submit">Entrar</button>
                    </div>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="{{ route('forget.password.get') }}">Esqueceu a senha <i class="fas fa-question-circle"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>

    $('form[name="formLogin"]').on('submit', function( e ){
        e.preventDefault();

        $.ajax({
            url: "{{ route('user.post') }}",
            type: "post",
            data: $(this).serialize(),
            dataType: "json",
            success: function( response ) {
                console.log( response );
                if( response.success == false) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro...',
                        text: response.message
                    });
                } else {
                    window.location.href = "{{ route('dashboard.index') }}";
                }
            }
        });

    });

</script>

@endsection
