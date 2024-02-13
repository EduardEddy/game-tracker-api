@extends('layouts.dashboard')

@section('title_page', 'Juegos')

@section('styles')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href="{{ URL::asset('assets/template/css/switch-button.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Actualizar "<u>{{ $collaborator->name }}</u>"</h6>
            </div>
            <div class="card-body">

                <div class="col-xl-12 col-lg-12" id='form'>
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Actualizar datos</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <form action='{{ url("/collaborators/{$collaborator->id}") }}' method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group row" id="div_with_time">
                                    <div class="col-md-4 row">
                                        <label for="name" class="col-sm-3 col-form-label">Nombre</label>
                                        <div class="col-sm-9">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ $collaborator->name }}" autocomplete="Ingrese precio"
                                                autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 row">
                                        <label for="last_name" class="col-sm-3 col-form-label">Apellido</label>
                                        <div class="col-sm-9">
                                            <input id="last_name" type="text"
                                                class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                                value="{{ $collaborator->last_name }}" autocomplete="Ingrese precio"
                                                autofocus>
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 row">
                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ $collaborator->email }}" autocomplete="Ingrese precio"
                                                autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 offset-md-7">
                                    <a href="{{ URL::previous() }}" class="btn btn-danger mx-2" style="width: 15rem">
                                        <i class="fa fa-arrow-left"></i>
                                        Volver
                                    </a>

                                    <button class="btn btn-primary" style="width: 15rem">
                                        <i class="fa fa-save"></i>
                                        Actualizar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

