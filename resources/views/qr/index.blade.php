@extends('layouts.dashboard')

@section('title_page', 'Descarga nuestra aplicación')

@section('styles')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href="{{ URL::asset('assets/template/css/switch-button.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Escanea el código QR a continuación para descargar la aplicación:</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    {!! QrCode::size(300)->generate('https://play.google.com/store/apps/details?id=com.playtimemonitor') !!}
                    <br />
                    <br />
                    <p>Alternativamente, puedes hacer clic en el siguiente enlace:</p>
                    <!-- Reemplaza "URL_DE_DESCARGA" con la URL real de descarga de tu aplicación -->
                    <a href="https://play.google.com/store/apps/details?id=com.playtimemonitor" target="_blank">Descargar App</a>

                    <p>¡Gracias por elegir nuestra aplicación!</p>
                </div>
            </div>
        </div>
    </div>
@endsection