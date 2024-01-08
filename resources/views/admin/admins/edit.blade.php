@extends('admin.master')
@section('title','Cadastro Acessos')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    Cadastro Administradores
                </div>

                <div class="card-body">
                    <form method="POST" action="{{url('admin/admins/'.$user->id.'/update')}}">
                        @csrf
                        <!-- success -->
                        <div class="col-md-12">
                            @if($message = Session::get('message'))
                                <div class="alert alert-success">
                                    <strong>Successo!</strong> {{$message}}.
                                </div>
                            @endif
                        </div>
                        <!-- error -->
                        <div class="col-md-12">
                            @if(count($errors)>0)
                                <div class="alert alert-warning">
                                    @foreach($errors->all() as $error )
                                        <strong>Aviso!</strong> {{$error}} <br>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="normal-input" class="form-control-label">Nome</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="normal-input" class="form-control-label">Email</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input type="text" id="email" name="email" value="{{$user->email}}" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="normal-input" class="form-control-label">Senha</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                    </div>
                                    <input type="password" id="password" name="password" value="" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{url('admin/admins')}}" class="btn btn-outline-secondary">Voltar</a>
                                <button type="submit" class="btn btn-outline-primary">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
