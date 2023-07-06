<div class="col-xl-12 col-lg-12" style="display: @if (empty(session()->get('errors'))) none @endif" id='form'>
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Registrar juego</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="{{ route('attractions') }}" method="POST" id="_form">
                @csrf
                <div class="row mb-2">
                    <div class="col-sm-7 col-md-7">
                        <label for="name" class="col-sm-4 col-form-label">¿Es un juego de tiempo libre?</label>
                        <input type="checkbox" data-on="Sí" data-off="No" data-toggle="toggle" data-size="sm"
                            id="checkbox_check" name="is_free_time" data-style="ios" data-offstyle="danger">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-md-1 col-form-label">Nombre del juego</label>
                    <div class="col-sm-6 col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-3 col-md-3"></div>
                </div>
                <div class="form-group row" id="div_with_time">
                    <div class="col-md-4 row">
                        <label for="price15" class="col-sm-3 col-form-label">Precio 15 min</label>
                        <div class="col-sm-9">
                            <input id="price15" type="number"
                                class="form-control @error('price15') is-invalid @enderror" name="price15"
                                value="{{ old('price15') ?? 0 }}" autocomplete="Ingrese precio" autofocus>
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
                                value="{{ old('price30') ?? 0 }}" autocomplete="Ingrese precio" autofocus>
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
                                value="{{ old('price60') ?? 0 }}" autocomplete="Ingrese precio" autofocus>
                            @error('price60')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row" id="div_not_time" style="display: none">
                    <div class="col-md-4 row">
                        <label for="price" class="col-sm-3 col-form-label">Precio</label>
                        <div class="col-sm-9">
                            <input id="price" type="number"
                                class="form-control @error('price') is-invalid @enderror" name="price"
                                value="{{ old('price') ?? 0 }}" autocomplete="Ingrese precio" autofocus>
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col">
                    <button class="btn btn-primary float-right" style="width: 15rem">
                        <i class="fa fa-save"></i>
                        Agregar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
