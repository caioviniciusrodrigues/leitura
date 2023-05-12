@extends('layout.app')


@section('content')

<div class="row mt-3">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('e1.index')}}">Lista de E1</a></li>
                <li class="breadcrumb-item active" aria-current="page">Visualizar E1 </li>
            </ol>
        </nav>
    </div>
</div>

<div class="row mt-3">

    <div class="col-sm-8 col-md-8 col-lg-8 pull-left">

        <div class="jumbotron" id="jbmt" >

            <div class="table-responsive">

                <table class="table" id="tbl">
                    <tr>
                        <td class="lead" align="right"><b>E1 Nome:&nbsp;</b></td>
                        <td class="lead" align="left"><span class="badge badge-pill badge-primary">{{ $e1->e1_nome }}</span></td>
                    </tr>
                    <tr>
                        <td class="lead" align="right"><b>E1 Origem:&nbsp;</b></td>
                        <td class="lead" align="left"><span class="badge badge-pill badge-warning">{{ $e1->e1_origem }}</span></td>
                    </tr>
                    <tr>
                        <td class="lead" align="right"><b>Secretaria:&nbsp;</b></td>
                        <td class="lead" align="left">{{ $e1->departamento->secretaria->secr_nome }}</td>
                    </tr>
                    <tr>
                        <td class="lead" align="right"><b>Departamento:&nbsp;</b></td>
                        <td class="lead" align="left">{{ $e1->departamento->dept_nome }} - Código: {{ $e1->departamento->dept_codigo }}</td>
                    </tr>
                    <tr>
                        <td class="lead" align="right"><b>Endereço:&nbsp;</b></td>
                        <td class="lead" align="left">{{ $e1->departamento->dept_endereco }}</td>
                    </tr>
                </table>

            </div>

        </div>

    </div>



    <div class="col-sm-3 col-md-3 col-lg-3 pull-left">

        <div class="sidebar-module">
            <h4>Ações</h4>
            <ol class="list-unstyled">

                @can('e1-view')
                    <li>
                        <a href="{{ route('e1.index') }}"><i class="fas fa-list text-primary"></i>  Todos</a>
                    </li>
                @endcan

                @can('e1-edit')
                    <li>
                        <a href="{{$e1->e1_id}}/edit"><i class="fas fa-edit text-primary"></i>  Editar</a>
                    </li>
                @endcan

                @can('e1-create')
                    <li>
                        <a href="{{ route('e1.create') }}"><i class="fas fa-plus-circle text-success"></i>  Novo</a>
                    </li>
                @endcan

                @can('e1-delete')
                    <li><a href="#" title="Excluir" onclick="deleteConfirmation({{ $e1->e1_id  }})"><i class="fa fa-trash text-danger" aria-hidden="true"></i> Excluir</a>
                    </li>
                @endcan


            </ol>

        </div>

    </div>
</div>
@endsection

@section('script')
<script>

    function deleteConfirmation(id)
    {
        var url = "{{ route('e1.destroy', '_id_') }}".replace('_id_', id);

        var urle1 = "{{ route('e1.index') }}";

        Swal.fire({
            title: 'Deseja realmente excluir esse registro?',
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

                        Swal.fire({
                            position: 'center',
                            icon: res.tipo,
                            title: res.mensagem,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        setTimeout(function() {
                            window.location.href = urle1;
                        }, 500);
                    }
                });

            }
        });

    }



</script>
@endsection
