@extends('layout.app')

@section('content')

<div class="row mt-3">

    <div class="col-md-12">

        <h2 class="my-4 text-left"><i class="fas fa-users" aria-hidden="true"></i> Lista De Usuários</h2>

        @can('usuario-create')
            <a href="{{ route('user.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Novo Usuário
            </a>
        @endcan

        <hr>

        <table id="dataTable" class="display nowrap" width="100" style="width: 100% !important;">
            <thead class="thead-light tituloCard">
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Status</th>
                <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->name  ?? 'A preencher' }}</td>
                        <td>{{ $usuario->email  ?? 'A preencher'}}</td>
                        <td>
                            @if ($usuario->status == 1)
                                <span class="badge badge-pill badge-success">Ativo</span>
                            @else
                                <span class="badge badge-pill badge-danger">Desativado</span>
                            @endif
                        </td>

                        <td style="text-align: center;">

                            @can('usuario-view')
                                <a title="Visualizar" style="width: 20%" href="{{ route('user.show', ['usuarios' => $usuario->id]) }}" class="btn btn-primary ml-2">
                                    <i class="fas fa-eye"></i> Visualizar
                                </a>
                            @endcan

                            @can('usuario-edit')
                                <a title="Editar" style="width: 20%" href="{{ route('user.edit', ['usuario' => $usuario->id]) }}" class="btn btn-warning ml-2">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                            @endcan

                            @can('papel-create')
                                <a title="Papel" class="btn btn-info ml-2" style="width: 20%" href="{{ route('usuarios.papel', ['id' => $usuario->id]) }}"><i class="fas fa-user-lock"></i> Papel</a>
                            @endcan

                            @can('usuario-delete')

                                @if ($usuario->status == '1')

                                    <a href="#" title="Desativar" class="btn btn-danger ml-2" style="width: 20%" onclick="ativarDesativar( {{ $usuario->id }} )"><i class="fas fa-ban" aria-hidden="true"></i> Desativar</a>

                                @else

                                    <a href="#" title="Ativar" class="btn btn-success ml-2" style="width: 20%" onclick="ativarDesativar( {{ $usuario->id }} )"><i class="fas fa-check-circle" aria-hidden="true"></i> Ativar</a>

                                @endif

                            @endcan

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

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
                        }, 500);
                    }
                });

            }
        });

    }


</script>

@endsection
