@extends('layouts.app')

@section('content')
    <pagina tamanho="10">
        <painel titulo="Dashboard">
                <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

            <div class="row">
                <div class="col-md-4">
                    <caixa quantidade="80" titulo="Cursos" url="{{route('cursos.index')}}" cor="orange" icone="ion ion-pie-graph"></caixa>
                </div>
                <div class="col-md-4">
                    <caixa quantidade="1500" titulo="Usuários" url="#" cor="green" icone="ion ion-person-stalker"></caixa>
                </div>
                <div class="col-md-4">
                    <caixa quantidade="3" titulo="Autores" url="#" cor="gray" icone="ion ion-person"></caixa>
                </div>
            </div>
        </painel>
    </pagina>
@endsection
