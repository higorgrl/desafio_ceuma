@extends('layouts.app')

@section('content')
    <pagina tamanho="10">
        <painel titulo="Dashboard">
                <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

            <div class="row">
                @can('servidor')
                    <div class="col-md-4">
                        <caixa quantidade="{{$totalCursos}}" titulo="Cursos" url="{{route('cursos.index')}}" cor="orange" icone="ion ion-ios-book"></caixa>
                    </div>
                    <div class="col-md-4">
                        <caixa quantidade="{{$totalAlunos}}" titulo="Alunos" url="{{route('alunos.index')}}" cor="green" icone="ion ion-ios-people"></caixa>
                    </div>
                @endcan
                @can('administrador')
                    <div class="col-md-4">
                        <caixa quantidade="{{$totalUsuarios}}" titulo="Usuários" url="{{route('usuarios.index')}}" cor="purple" icone="ion ion-person-stalker"></caixa>
                    </div>
                    <div class="col-md-4">
                        <caixa quantidade="{{$totalServidores}}" titulo="Servidores" url="{{route('servidores.index')}}" cor="brown" icone="ion ion-wrench"></caixa>
                    </div>
                    <div class="col-md-4">
                        <caixa quantidade="{{$totalAdmin}}" titulo="Administrador" url="{{route('adm.index')}}" cor="gray" icone="ion ion-settings"></caixa>
                    </div>
                @endcan
            </div>
        </painel>
    </pagina>
@endsection
