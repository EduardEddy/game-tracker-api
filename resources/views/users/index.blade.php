@extends('layouts.dashboard')

@section('title_page', 'Descarga nuestra aplicación')

@section('styles')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href="{{ URL::asset('assets/template/css/switch-button.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="row">
        @include('users.create')

        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Listado de usuarios colaboradores:</h6>
                    <button class="btn btn-primary float-right" onclick="showContentRegister()">
                        <i class="fa fa-plus-circle"></i>
                        Nuevo
                    </button>
                </div>
                <div class="card-body">
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('users.table.body')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script-->
    <script>
        function showContentRegister() {
            $('#form').show();
        }

        function confirmDeleteUser(id, fullname) {
            Swal.fire({
                title: 'Espera!',
                text: `Estas seguro de eliminar este registro "${fullname}"`,
                icon: 'warning',
                confirmButtonText: 'Eliminar',
                showCancelButton: true,
                cancelButtonText: "Cancelar"
            }).then( action => {
                if (action.isConfirmed) {
                    deleteUser(id)
                }
            })
        }

        function deleteUser(id) 
        {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: `/collaborators/${id}`,
                type: 'DELETE',
                success: function(res) {
                    location.reload();
                },
                error: (errors) => {
                    console.log(errors)
                    Swal.fire({
                        title: 'Espera!',
                        text: `Algo salió mal`,
                        icon: 'error',
                        cancelButtonText: "OK"
                    })
                }
            })
        }

    </script>
    <!--script src="{{ asset('assets/template/js/checked-button.js') }}"></script-->

@endsection