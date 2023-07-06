@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top: 8em">
                    <div class="card-header">{{ __('Activación de cuenta') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('active-account') }}">
                            @csrf
                            @if (session()->has('warning'))
                                <div class="alert alert-warning">
                                    {{ session()->get('warning') }}
                                </div>
                            @endif
                            <div class="alert alert-info text-center col-md-6 offset-md-3">
                                Hemos enviado un codigo a tu correo para activar tu cuenta
                            </div>
                            <input type="hidden" name='user_id' value="{{ $user_id }}">
                            <div class="row mb-3">
                                <label for="code"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Codigo de validacion') }}</label>

                                <div class="col-md-5">
                                    <input id="code" type="text"
                                        class="form-control @error('code') is-invalid @enderror" name="code"
                                        value="{{ old('code') }}" autocomplete="code" autofocus>

                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-5 offset-md-7">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Confirmar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
