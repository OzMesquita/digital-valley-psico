@extends('auth.layouts.layout-basic')
@section('content')

   
   
   
    <div class="container">
      
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-users mycolor-azul"></i>&nbsp;Gerenciar psicólogos
                    </div>
                    <div class="card-body">
                        @if($funcionarios)
      
                            <div class="row">
                                <div class="col col-12">
                                    <ul class="list-group">
                                        @foreach($funcionarios as $funcionario)
                                            <li class="list-group-item">{{$funcionario->usuario->nome_completo}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                       
                         @endif

                         <div class="col col-12 mt-3">
                            <a href="users/create" class=" btn mybtn-table btn fa-pull-right">Cadastrar novo psicólogo</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
      
    </div>

@endsection