@extends('layouts.app')

@section('content')
    <pagina tamanho="12">

        @if($errors->all())
            <div class="alert alert-danger alert-dismissible text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                @foreach ($errors->all() as $key => $value)
                    <li><strong>{{$value}}</strong></li>   
                @endforeach
            </div>
        @endif

        <painel titulo="Lista de Usuários">
            <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
            
            <tabela-lista
            v-bind:titulos="['#','Nome','Email','Servidor','Administrador']"
            v-bind:itens="{{json_encode($listaModelo)}}"
            modal="sim"
            ></tabela-lista>

            <div align="center">
                {{$listaModelo}}
            </div>
        </painel>
    </pagina>
@endsection
