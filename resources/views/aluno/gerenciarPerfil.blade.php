@extends('aluno.layouts.layout-basic')
@section('content')
    <gerenciar-perfil :base_url="{{'"'.$base_url.'"'}}" :id_aluno="{{ Auth::user()->id }}">  </gerenciar-perfil>
@endsection

<!-- 0 é o aluno que esta vendo seu perfil-->