@extends('admin.master')
@section('title','Cadastro Imóvel')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    Cadastro Imóvel
                </div>

                <div class="card-body">
                    <form method="POST" action="{{url('admin/residences/store')}}">
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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Endereço</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                        </div>
                                        <input type="text" id="address" name="address" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Tipo</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-university"></i></span>
                                        </div>
                                        <select class="selectpicker form-control" id="type" name="type">
                                            <option value="1">Casa</option>
                                            <option value="2">Apartamento</option>
                                            <option value="3">Terreno</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Valor</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span>
                                        </div>
                                        <input type="number" min="001"  id="price" name="price" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Tipo</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-bed"></i></span>
                                        </div>
                                        <select class="selectpicker form-control" id="status" name="status">
                                            <option value="1">Alugado</option>
                                            <option value="2">Disponível</option>
                                            <option value="3">Vendido</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="{{url('admin/residences/')}}" class="btn btn-outline-secondary">Voltar</a>
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