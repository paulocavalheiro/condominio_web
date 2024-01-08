@extends('admin.master')
@section('title','lista service')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light col-md-6">
                   Serviços
                </div>
                <form method="POST" action="{{url('admin/services/busca')}}">
                    @csrf
                    <div class="col-md-4" style="float: right">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon icon-eyeglass"></i></span>
                            </div>
                            @if(isset($busca) )
                                <input type="text" id="buscaServ" name="buscaServ" class="form-control" placeholder="Busca" value="{{$busca}}"  >
                                <div class="input-group-apend">
                                    <a href="{{url('admin/services/')}}" class="btn btn-outline-dark">Limpar</a>
                                </div>
                            @else
                                <input type="text" id="buscaServ" name="buscaServ" class="form-control" placeholder="Busca"  >
                                <div class="input-group-apend">
                                    <button class="btn btn-outline-dark">Buscar</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </form>

                <div class="col-md-12">
                   @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>Successo!</strong> {{$message}}.
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Empresa</th>
                                <th>Responsavel</th>
                                <th>Apt</th>
                                <th>Alterar</th>
                                <th>Excluir</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(count($services) > 0)
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{$service->id}}</td>
                                            <td>{{$service->nameComp}}</td>
                                            <td>{{$service->responsibleComp}}</td>
                                            <td>{{$service->aptNumber}}</td>
                                            <td><a href="services/{{$service->id}}/edit" class="" ><i class="fa fa-pencil-alt"></i></a></td>
                                            <td><a href=""  class="confirm-delete" data-toggle="modal" data-target="#modal-7" data-id="{{$service->id}}" data-title="{{$service->nameComp}}"><i class="icon icon-close"> </i> </a></td>
                                        </tr>
                                    @endforeach
                                @else

                                    <tr>
                                        <td colspan="6">Nenhum registro encontrado</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                @endif

                            </tbody>
                        </table>
                    </div>
                    {{$services->links()}}
                </div>

            </div>
        </div>
    </div>

    <!-- modal confirm delete-->
    <div class="modal fade" id="modal-7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning border-0">
                    <h5 class="modal-title text-white">Excluir Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body p-5">
                    <label> Deseja excluir o registro <b><span id="nameUser"></span>?? </b> </label>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Cancelar</button>
                    <a  href="trocalink" class="btn btn-warning">Delete</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-js-script')
    <script>

        $('.confirm-delete').on('click', function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            var name = $(this).data('title');

            document.getElementById("nameUser").innerHTML = name;
            var a = document.querySelector('a[href="trocalink"]');
            if (a) {
                @if(count($services) > 0)
                    a.setAttribute('href', 'services/{{$service->id}}/destroy');
                @endif
            }
        });

    </script>
@stop