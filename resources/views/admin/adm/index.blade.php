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

        <painel titulo="Administrador">
            <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
            
            <tabela-lista
            v-bind:titulos="['#','Nome','Email']"
            v-bind:itens="{{json_encode($listaModelo)}}"
            editar="/admin/adm/"
            modal="sim"

            ></tabela-lista>

            <div align="center">
                {{$listaModelo}}
            </div>

        </painel>

    </pagina>

    <modal nome="editar" titulo="Editar">
        <formulario id="formEditar" css="" v-bind:action="'/admin/adm/'+ $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" v-model="$store.state.item.name" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email"  v-model="$store.state.item.email" placeholder="E-mail">
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formEditar" class="btn btn-info">Atualizar</button>
        </span>
    </modal>
@endsection
