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

        <painel titulo="Lista de Artigos">
            <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
            
            <tabela-lista
            v-bind:titulos="['#','Código','Nome','Data de Cadastro','Carga Horária']"
            v-bind:itens="{{json_encode($listaCursos)}}"
            criar="#criar" detalhe="/admin/cursos/" editar="/admin/cursos/" deletar="/admin/cursos/" token="{{ csrf_token() }}"
            modal="sim"

            ></tabela-lista>

            <div align="center">
                {{$listaCursos}}
            </div>

        </painel>

    </pagina>

    <modal nome="adicionar" titulo="Adicionar">
        <formulario id="formAdicionar" css="" action="{{route('cursos.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="codigo">Código do Curso</label>
                <input type="number" class="form-control" id="codigo" name="codigo" placeholder="Código do Curso" value="{{old('codigo')}}">
            </div>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Curso" value="{{old('nome')}}">
            </div>
            <div class="form-group">
                <label for="data_cadastro">Data de Cadastro</label>
                <input type="date" class="form-control" id="data_cadastro" name="data_cadastro" value="{{old('data_cadastro')}}">
            </div>
            <div class="form-group">
                <label for="codigo">Carga Horária</label>
                <input type="text" class="form-control" id="carga_horaria" name="carga_horaria" placeholder="Carga Horária" value="{{old('carga_horaria')}}">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Adicionar</button>
        </span>
    </modal>

    <modal nome="editar" titulo="Editar">
        <formulario id="formEditar" css="" v-bind:action="'/admin/cursos/'+ $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="codigo">Código do Curso</label>
                <input type="number" class="form-control" id="codigo" v-model="$store.state.item.codigo" name="codigo" placeholder="Código do Curso">
            </div>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" v-model="$store.state.item.nome" placeholder="Nome do Curso">
            </div>
            <div class="form-group">
                <label for="codigo">Data de Cadastro</label>
                <input type="date" class="form-control" id="data_cadastro" name="data_cadastro"  v-model="$store.state.item.data_cadastro" placeholder="Data de Cadastro">
            </div>
            <div class="form-group">
                <label for="codigo">Carga Horária</label>
                <input type="text" class="form-control" id="carga_horaria" name="carga_horaria"  v-model="$store.state.item.carga_horaria" placeholder="Carga Horária">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formEditar" class="btn btn-info">Atualizar</button>
        </span>
    </modal>

    <modal nome="detalhe" titulo="Detalhe">
        <div>{{json_encode($listaModelo)}}</div>
    </modal>
@endsection
