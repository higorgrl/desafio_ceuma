@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de Artigos">
            <tabela-lista
            v-bind:titulos="['#','Título','Descrição']"
            v-bind:itens="[[1,'teste vue','Curso de vue'],[2,'teste node','Curso de node']]"
            criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="788787878787"


            ></tabela-lista>

        </painel>

    </pagina>
@endsection
