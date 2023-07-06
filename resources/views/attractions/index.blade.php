@extends('layouts.dashboard')

@section('title_page', 'Juegos')

@section('styles')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href="{{ URL::asset('assets/template/css/switch-button.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="row">
        @include('attractions.create')

        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Juegos</h6>
                    <button class="btn btn-primary float-right" onclick="showContentRegister()">
                        <i class="fa fa-plus-circle"></i>
                        Nuevo
                    </button>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Juego</th>
                                <th></th>
                                <th scope="col">Precio</th>
                                <th scope="col">Precio 15 min</th>
                                <th scope="col">Precio 30 min</th>
                                <th scope="col">Precio 1 hora</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('attractions.table.body')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script>
        function showContentRegister() {
            $('#form').show();
        }
    </script>
    <script src="{{ asset('assets/template/js/checked-button.js') }}"></script>

@endsection
