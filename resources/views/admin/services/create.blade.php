@extends('admin.master')
@section('title','Cadastro Acessos')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    Cadastro Serviços / Empresa
                </div>

                <div class="card-body">
                    <form method="POST" action="{{url('admin/services/store')}}">
                        @csrf
                        <div class="row">

                            <!-- success -->
                            <div class="col-md-12">
                                @if($message = Session::get('success'))
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
                                    <label for="normal-input" class="form-control-label">Nome Empresa</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-building"></i></span>
                                        </div>
                                        <input type="text" id="nameComp" name="nameComp" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Nome Funcionario Resp</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-chalkboard-teacher"></i></span>
                                        </div>
                                        <input type="text" id="responsible" name="responsible" class="form-control" >
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
                                    <label for="normal-input" class="form-control-label">Endereço</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-signs"></i></span>
                                        </div>
                                        <input type="text" id="address" name="address" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Cidade</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input type="text" id="city" name="city" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Inicio Serviço</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" id="iniServ" name="iniServ" class="form-control" data-toggle="datepicker" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Terminino Serviço</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" id="endServ" name="endServ" class="form-control" data-toggle="datepicker">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Tipo Serviço</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-screwdriver"></i></span>
                                        </div>
                                        <input type="text" id="type" name="type" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Bloco</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-building"></i></span></span>
                                        </div>
                                        <input type="text" id="block" name="block" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Apartamento</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-bed"></i></span>
                                        </div>
                                        <select class="selectpicker form-control" id="aptNumber" name="aptNumber">
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->aptNumber}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="{{url('admin/services/')}}" class="btn btn-outline-secondary">Voltar</a>
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
