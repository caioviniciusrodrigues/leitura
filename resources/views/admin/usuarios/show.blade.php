@extends('layout.app')

@section('content')

<div class="row mt-3">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.list')}}">Lista de Usuários</a></li>
                <li class="breadcrumb-item active" aria-current="page">Visualizar Usuário </li>
            </ol>
        </nav>
    </div>
</div>

<div class="row mt-3">

    <div class="col-sm-8 col-md-8 col-lg-8 pull-left">

        <div class="jumbotron" >

            <table class="table">
                <tr>
                    <td class="lead" align="right"><b>Nome:&nbsp;</b></td>
                    <td class="lead" align="left">{{ $usuario->name }}</td>
                </tr>
                <tr>
                    <td class="lead" align="right"><b>E-mail:&nbsp;</b></td>
                    <td class="lead" align="left">{{ $usuario->email }}</td>
                </tr>

                <tr>
                    <td class="lead" align="right">Papéis:&nbsp;</td>
                    <td class="lead" align="left">
                        @foreach($papeis as $papel)
                        <span class="badge badge-pill badge-warning">{{ $papel->nome }} - {{ $papel->descricao }}</span> <br>
                        @endforeach
                    </td>
                </tr>

                <tr>
                    <td class="lead" align="right"><b>Situação:&nbsp;</b></td>
                    <td class="lead" align="left">
                    @if ($usuario->status == 1)
                        <span class="badge badge-pill badge-success">Ativo</span>
                    @else
                        <span class="badge badge-pill badge-danger">Desativado</span>
                    @endif
                    </td>

                </tr>
            </table>

        </div>

    </div>

    <div class="col-sm-3 col-md-3 col-lg-3 pull-left">

        <div class="sidebar-module">
            <h4>Ações</h4>
            <ol class="list-unstyled">

                @can('usuario-view')
                    <li><a href="{{ route('user.list') }}"><i class="fas fa-list text-primary"></i>  Todos</a></li>
                @endcan
                @can('usuario-edit')
                    <li><a href="{{ route('user.edit', ['id' => $usuario->id]) }}"><i class="fas fa-edit text-primary"></i>  Editar</a></li>
                @endcan
                @can('usuario-create')
                    <li><a href="{{ route('user.create') }}"><i class="fas fa-plus-circle text-success"></i>  Criar novo</a></li>
                @endcan
                @can('usuario-delete')
                     @if ($usuario->status == '1')
                        <li><a href="#" title="Desativar" onclick="ativarDesativar({{$usuario->id}})"><i class="fas fa-ban text-danger" aria-hidden="true"></i> Desativar</a></li>
                    @else
                        <li><a href="#" title="Ativar" onclick="ativarDesativar({{$usuario->id}})"><i class="fas fa-check-circle text-success" aria-hidden="true"></i> Ativar</a></li>
                    @endif
                @endcan

            </ol>

        </div>

    </div>
</div>
@endsection

@section('script')
<script>


function ativarDesativar(id)
{
    var url = "{{ route('user.ativarDesativar', '_id_') }}".replace('_id_', id);

    Swal.fire({
        title: 'Deseja realmente desativar esse usuário?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirmar',
        confirmButtonColor: '#28a745',
        denyButtonText: 'Cancelar',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'DELETE',
                url: url,
                data: id,
                dataType: 'JSON',
                success: function (res) {

                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                }
            });

        }
    });

}

</script>
@endsection
