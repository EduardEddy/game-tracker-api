<div class="col-xl-12 col-lg-12" style="display: @if (empty(session()->get('errors'))) none @endif" id='form'>
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Registrar juego</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="{{ route('collaborator') }}" method="POST" id="_form">
                @csrf

                <div class="form-group row" id="div_with_time">
                    <div class="col-md-4 row">
                        <label for="name" class="col-sm-3 col-form-label">Nombre</label>
                        <div class="col-sm-9">
                            <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" autocomplete="Ingrese precio" autofocus>
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
                                value="{{ old('last_name') }}" autocomplete="Ingrese precio" autofocus>
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
                                value="{{ old('email') }}" autocomplete="Ingrese precio" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4 row">
                        <label for="password" class="col-sm-3 col-form-label">Clave</label>
                        <div class="col-sm-9">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                value="" autocomplete="Ingrese precio" autofocus>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4 row">
                        <label for="password" class="col-sm-4 col-form-label">Confirmar clave</label>
                        <div class="col-sm-8">
                            <input id="password_confirmation" type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                value="" autocomplete="Ingrese precio" autofocus>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="col">
                    <button class="btn btn-primary float-right" style="width: 15rem">
                        <i class="fa fa-user-plus"></i>
                        Agregar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
