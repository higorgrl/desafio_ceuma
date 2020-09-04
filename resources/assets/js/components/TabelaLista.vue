<template>
    <div>
        <div class="form-inline">
            <a v-if="criar && !modal" v-bind:href="criar">Criar</a>
            <modallink v-if="criar && modal" tipo="link" nome="adicionar" titulo="Criar" css=""></modallink>
            <div class="form-group pull-right">
                <input type="search" class="form-control" placeholder="Buscar" v-model="buscar">
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th v-for="(titulo, index) in titulos" v-bind:key="index.id">{{titulo}}</th>

                    <th v-if="detalhe || editar || deletar">Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in lista" v-bind:key="item.id">
                    <td v-for="i in item" v-bind:key="i.id">{{i}}</td>

                    <td v-if="detalhe || editar || deletar">
                        
                        <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" v-bind:value="token">

                            <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
                            <modallink v-if="detalhe && modal" v-bind:item="item" v-bind:url="detalhe" tipo="link" nome="detalhe" titulo=" Detalhe |" css=""></modallink>

                            <a v-if="editar && !modal" v-bind:href="editar"> Editar |</a>
                            <modallink v-if="editar && modal" v-bind:item="item" v-bind:url="editar" tipo="link" nome="editar" titulo=" Editar |" css=""></modallink>

                            <a href="#" v-on:click="executaForm(index)"> Deletar</a>
                        </form>

                        <span v-if="!token">
                            <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
                            <modallink v-if="detalhe && modal" v-bind:item="item" v-bind:url="detalhe" tipo="link" nome="detalhe" titulo=" Detalhe |" css=""></modallink>

                            <a v-if="editar && !modal" v-bind:href="editar"> Editar |</a>
                            <modallink v-if="editar && modal" v-bind:item="item" v-bind:url="editar" tipo="link" nome="editar" titulo=" Editar |" css=""></modallink>

                            <a v-if="deletar" v-bind:href="deletar">Deletar</a>
                        </span>

                        <span v-if="token && !deletar">
                            <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
                            <modallink v-if="detalhe && modal" v-bind:item="item" v-bind:url="detalhe" tipo="link" nome="detalhe" titulo=" Detalhe |" css=""></modallink>

                            <a v-if="editar && !modal" v-bind:href="editar"> Editar</a>
                            <modallink v-if="editar && modal" v-bind:item="item" v-bind:url="editar" tipo="link" nome="editar" titulo="Editar" css=""></modallink>
                        </span>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['titulos','itens', 'criar','detalhe','editar','deletar','token','modal'],
        data:function(){
            return{
                buscar:''
            }
        },
        methods:{
            executaForm: function(index){
                document.getElementById(index).submit();
            }
        },
        computed:{
            lista: function () {
                if (this.buscar) {
                    return this.itens.filter(res => {
                        res = Object.values(res);
                        for (let k = 0; k < res.length; k++) {
                            if((res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                                return true;
                            }
                        }
                        return false;
                    });  
                }
                return this.itens;
            }
        }
    }
</script>
