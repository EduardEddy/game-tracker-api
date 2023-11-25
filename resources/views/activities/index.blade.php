@extends('layouts.dashboard')

@section('title_page', 'Actividades')

@section('styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
@endsection

@section('content')
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Listado de actividades en el parque</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                            <div class="form-group row">
                                <label for="date" class="col-sm-4 col-form-label align-middle text-small">Fecha:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="date" id="datepicker" class="form-control text-secundary">
                                </div>
                            </div>
                        </h1>
                        <a href="/exports" target="_blank"
                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-download fa-sm text-white-50"></i> 
                            Generar Reporte
                        </a>
                    </div>
                    <div class="">
                        <table class="table table-border table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Invitado</th>
                                    <th>Hora entrada</th>
                                    <th>Hora Salida</th>
                                    <th>Tiempo en minutos</th>
                                    <th>Monto pagado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $subtotal = 0;
                                @endphp
                                @foreach ($activities as $key => $activity)
                                    @php
                                        $subtotal = $subtotal + $activity->priceAttraction->price;
                                    @endphp
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{ $activity->guests->first()->child_fullname }}
                                        </td>
                                        <td>
                                            {{ $activity->entry_time }}
                                        </td>
                                        <td>
                                            {{ $activity->departure_time }}
                                        </td>
                                        <td>
                                            {{ $activity->priceAttraction->time == 0 ? 'Sin tiempo espcificado' : $activity->priceAttraction->time . ' minutos' }}
                                        </td>
                                        <td>
                                            {{ number_format($activity->priceAttraction->price, 2, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{ $activities->links('pagination::bootstrap-4') }}
                </div>
                <div class="card-footer">
                    <h4 class="m-0 font-weight-bold text-primary float-right">
                        <span class="text-dark">Total de ingresos al momento
                            {{ \Carbon\Carbon::now('-05:00')->format('H:i:s') }}:</span>
                        $<span id="total">0</span>
                    </h4>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            const numberFormat = new Intl.NumberFormat("es-ES");
            $.ajax({
                url: "/activities/total",
                type: 'GET',
                success: function(res) {
                    $("#total").html(numberFormat.format(res));
                }
            });
        })

        $(function() { $( "#datepicker" ).datepicker(); });
    </script>
@endsection
