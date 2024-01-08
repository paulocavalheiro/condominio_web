@extends('admin.master')
@section('title','Alterar imovel')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    Cadastro Imóvel
                </div>

                <div class="card-body">
                    <form method="POST" action="{{url('admin/admins/'.$residence->id.'/update')}}">
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

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="normal-input" class="form-control-label">Tipo</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" id="type" name="type" value="{{$residence->type}}" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="normal-input" class="form-control-label">Endereço</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input type="text" id="address" name="address" value="{{$residence->address}}" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="normal-input" class="form-control-label">Valor</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                    </div>
                                    <input type="text" id="price" name="price"value="{{$residence->price}}" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="normal-input" class="form-control-label">Status</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-hashtag"></i></span>
                                    </div>
                                    <input type="text" id="status" name="status"value="{{$residence->status}}" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <a href="{{url('admin/residences')}}" class="btn btn-outline-secondary">Voltar</a>
                                <button type="submit" class="btn btn-outline-primary">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
