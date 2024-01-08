@extends('admin.master')
@section('title','Visualizar mensagem')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    Mensagem / recebida
                </div>

                <div class="card-body">
                    <form method="POST" action="">
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

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Remetente</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-chalkboard-teacher"></i></span>
                                        </div>
                                        <input type="text" id="date" name="date" class="form-control" value="{{$messages->fk_id_user}}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-3">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Titulo</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-building"></i></span>
                                        </div>
                                        <input type="text" id="title" name="title" class="form-control" value="{{$messages->titleMessage}}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Data Postagem</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-chalkboard-teacher"></i></span>
                                        </div>
                                        <input type="text" id="date" name="date" class="form-control" value="{{Carbon\Carbon::parse($messages->created_at)->format('d/m/Y H:i')}}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Mensagem</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-chalkboard-teacher"></i></span>
                                        </div>
                                        <textarea id="description" name="description" class="form-control">{{html_entity_decode($messages->descriptionMessage)}}</textarea>

                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="{{url('admin/message/')}}" class="btn btn-outline-secondary">Voltar</a>
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
