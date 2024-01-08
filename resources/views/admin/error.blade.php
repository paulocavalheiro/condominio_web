@extends('admin.master')

@section('content')


<div class="page-wrapper flex-row align-items-center">


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <span class="display-1 d-block">404</span>
                <div class="mb-4">
                    @if($message)
                        <div class="alert alert-warning">
                            <strong>Aviso!</strong> {{$message}}.
                        </div>
                    @endif
                </div>
                <a href="#" class="btn btn-link">Voltar</a>
            </div>
        </div>
    </div>
</div>

@endsection