@extends('layouts.dashboard')

@section('title_page', 'Juegos')

@section('styles')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href="{{ URL::asset('assets/template/css/switch-button.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    @php
        $pricef = $price15 = $price30 = $price60 = 0;
        if ($attraction->is_free_time) {
            foreach ($attraction->prices as $j => $price) {
                if ($price->time == 0) {
                    $pricef = $price->price;
                }
            }
        } else {
            foreach ($attraction->prices as $key => $price) {
                if ($price->time == 15) {
                    $price15 = $price->price;
                }
                if ($price->time == 30) {
                    $price30 = $price->price;
                }
                if ($price->time == 60) {
                    $price60 = $price->price;
                }
            }
        }
    @endphp
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Actualizar "<u>{{ $attraction->name }}</u>"</h6>
            </div>
            <div class="card-body">

                <div class="col-xl-12 col-lg-12" id='form'>
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Registrar juego</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <form action='{{ url("/attractions/{$attraction->id}") }}' method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row mb-2">
                                    <div class="col-sm-7 col-md-7">
                                        <label for="name" class="col-sm-4 col-form-label">¿Es un juego de tiempo
                                            libre?</label>
                                        <input {{ $attraction->is_free_time ? 'checked' : '' }} type="checkbox"
                                            data-on="Sí" data-off="No" data-toggle="toggle" data-size="sm"
                                            id="checkbox_check" name="is_free_time" data-style="ios" data-offstyle="danger">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-md-1 col-form-label">Nombre del juego</label>
                                    <div class="col-sm-6 col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ $attraction->name }}" autocomplete="name" autofocus disabled>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3 col-md-3"></div>
                                </div>
                                <div class="form-group row" id="div_with_time"
                                    style="display: {{ $attraction->is_free_time ? 'none' : '' }}">
                                    <div class="col-md-4 row">
                                        <label for="price15" class="col-sm-3 col-form-label">Precio 15 min</label>
                                        <div class="col-sm-9">
                                            <input id="price15" type="number"
                                                class="form-control @error('price15') is-invalid @enderror" name="price15"
                                                value="{{ old('price15') ?? $price15 }}" autocomplete="Ingrese precio"
                                                autofocus>
                                            @error('price15')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 row">
                                        <label for="price30" class="col-sm-3 col-form-label">Precio 30 min</label>
                                        <div class="col-sm-9">
                                            <input id="price30" type="number"
                                                class="form-control @error('price30') is-invalid @enderror" name="price30"
                                                value="{{ old('price30') ?? $price30 }}" autocomplete="Ingrese precio"
                                                autofocus>
                                            @error('price30')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 row">
                                        <label for="price60" class="col-sm-3 col-form-label">Precio 1 hora</label>
                                        <div class="col-sm-9">
                                            <input id="price60" type="number"
                                                class="form-control @error('price60') is-invalid @enderror" name="price60"
                                                value="{{ old('price60') ?? $price60 }}" autocomplete="Ingrese precio"
                                                autofocus>
                                            @error('price60')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" id="div_not_time"
                                    style="display: {{ $attraction->is_free_time ? '' : 'none' }}">
                                    <div class="col-md-4 row">
                                        <label for="price" class="col-sm-3 col-form-label">Precio</label>
                                        <div class="col-sm-9">
                                            <input id="price" type="number"
                                                class="form-control @error('price') is-invalid @enderror" name="price"
                                                value="{{ old('price') ?? $pricef }}" autocomplete="Ingrese precio"
                                                autofocus>
                                            @error('price')
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

@section('script')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="{{ asset('assets/template/js/checked-button.js') }}"></script>
@endsection
