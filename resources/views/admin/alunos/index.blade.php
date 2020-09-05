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

        <painel titulo="Lista de Alunos">
            <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
            
            <tabela-lista
            v-bind:titulos="['#','Código do Aluno','Nome do Aluno','Curso']"
            v-bind:itens="{{json_encode($listaModelo)}}"
            criar="#criar" detalhe="/admin/alunos/" editar="/admin/alunos/" deletar="/admin/alunos/" token="{{ csrf_token() }}"
            modal="sim"

            ></tabela-lista>

            <div align="center">
                {{$listaModelo}}
            </div>

        </painel>

    </pagina>

    <modal nome="adicionar" titulo="Adicionar">
        <formulario id="formAdicionar" css="" action="{{route('alunos.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="cod_aluno">Código</label>
                <input type="number" class="form-control" id="cod_aluno" name="cod_aluno" placeholder="Código do Aluno" value="{{old('cod_aluno')}}">
            </div>
            <div class="form-group">
                <label for="nome_aluno">Nome</label>
                <input type="text" class="form-control" id="nome_aluno" name="nome_aluno" placeholder="Nome do Aluno" value="{{old('nome_aluno')}}">
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="{{old('cpf')}}">
            </div>
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite o endereço" value="{{old('endereco')}}">
            </div>
            <div class="form-group">
                <label for="cep">CEP</label>
                <input type="number" class="form-control" id="cep" name="cep" value="{{old('cep')}}">
            </div>
            <div class="form-group">
                <label for="email_aluno">E-mail</label>
                <input type="text" class="form-control" id="email_aluno" name="email_aluno" placeholder="E-mail" value="{{old('email_aluno')}}">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="{{old('telefone')}}">
            </div>
            <div class="form-group">
                <label for="nome_curso">Curso</label>
                <input type="text" class="form-control" id="nome_curso" name="nome_curso" placeholder="Curso" value="{{old('nome_curso')}}">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Adicionar</button>
        </span>
    </modal>

    <modal nome="editar" titulo="Editar">
        <formulario id="formEditar" css="" v-bind:action="'/admin/alunos/'+ $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="cod_aluno">Código</label>
                <input type="number" class="form-control" id="cod_aluno" name="cod_aluno" v-model="$store.state.item.cod_aluno" placeholder="Código">
            </div>
            <div class="form-group">
                <label for="nome_aluno">Nome</label>
                <input type="text" class="form-control" id="nome_aluno" name="nome_aluno" v-model="$store.state.item.nome_aluno" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" v-model="$store.state.item.cpf" placeholder="CPF">
            </div>
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" v-model="$store.state.item.endereco" placeholder="Endereço">
            </div>
            <div class="form-group">
                <label for="cep">CEP</label>
                <input type="number" class="form-control" id="cep" name="cep" v-model="$store.state.item.cep" placeholder="CEP">
            </div>
            <div class="form-group">
                <label for="email_aluno">E-mail</label>
                <input type="text" class="form-control" id="email_aluno" name="email_aluno" v-model="$store.state.item.email_aluno" placeholder="E-mail">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" v-model="$store.state.item.telefone" placeholder="Telefone">
            </div>
            <div class="form-group">
                <label for="nome_curso">Curso</label>
                <input type="text" class="form-control" id="nome_curso" name="nome_curso" v-model="$store.state.item.nome_curso" placeholder="Curso">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formEditar" class="btn btn-info">Atualizar</button>
        </span>
    </modal>

    <modal nome="detalhe" v:bind:titulo="$store.state.item.name">
        <p>@{{$store.state.item.email}}</p>
    </modal>
@endsection
