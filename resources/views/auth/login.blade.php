@extends('layouts.master')

@section('content')

    <div class="page-wrapper flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card p-4">
                        <div class="card-header text-center text-uppercase h4 font-weight-light">
                            Login
                        </div>
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                            <div class="card-body py-5">
                                <div class="form-group">
                                    <label class="form-control-label">Email</label>
                                    <input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  name="email" value="{{ old('email') }}" autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Senha</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  name="password" >
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>

                            <div class="card-footer">
                                <div style="display:flex ">
                                    <div class="col-6">
                                        <button type="submit" class="btn  btn-dark px-5">Login</button>
                                    </div>

                                    <div class="col-6">
                                        <a href="/" class="btn  btn-dark px-5">Voltar</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
