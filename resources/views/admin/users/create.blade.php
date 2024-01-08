@extends('admin.master')
@section('title','Cadastro Acessos')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    Cadastro Modadores / Usuarios
                </div>

                <div class="card-body">
                    <form method="POST" action="{{url('admin/users/store')}}">
                        @csrf
                        <div class="row">

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

                            <div class="col-md-6 col-sm-3">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Nome</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input type="text" id="name" name="name" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Email</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" id="email" name="email" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Bloco</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-building"></i></span>
                                        </div>
                                        <input type="text" id="block" name="block" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Apt</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-bed"></i></span>
                                        </div>
                                        <input type="text" id="aptNumber" name="aptNumber" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Veiculo 1</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-car"></i></span>
                                        </div>
                                        <input type="text" id="veic1" name="veic1" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Placa</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-audio-description"></i></span>
                                        </div>
                                        <input type="text" id="plate1" name="plate1" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Veiculo 2</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-car"></i></span>
                                        </div>
                                        <input type="text" id="veic2" name="veic2" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Placa</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-audio-description"></i></span>
                                        </div>
                                        <input type="text" id="plate2" name="plate2" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Telefone</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon icon-phone"></i></span>
                                        </div>
                                        <input type="text" id="phone" name="phone" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Senha</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-low-vision"></i> </span>
                                        </div>
                                        <input type="password" id="password" name="password" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="{{url('admin/users/')}}" class="btn btn-outline-secondary">Voltar</a>
                                    <button type="submit" class="btn btn-outline-primary">Salvar</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
