<template>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <h2>Informações pessoais</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="nomeCompleto">Nome Completo</label>
                    <input type="text" class="form-control" name="nomeCompleto" v-model="this.aluno.nome_completo" :disabled="true">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="dataNascimento">Data de nascimento</label>
                    <input type="text" class="form-control" name="dataNascimento" v-model="this.aluno.data_nascimento" :disabled="true">
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="cidadeNatal">Cidade natal</label>
                    <input type="text" class="form-control" name="cidadeNatal" v-model="this.aluno.endereco.cidade.nome" :disabled="true">
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="estadoNatal">Estado natal</label>
                    <input type="text" class="form-control" name="estadoNatal" v-model="this.aluno.endereco.cidade.estado.nome" :disabled="true">
                </div>
            </div>    
        </div>
        <!--<div class="row">
            <div class="col col-4">
                <div class="form-group">
                    <label for="estadoCivil">Estado civil</label>
                    <input type="text" class="form-control" name="estadoCivil" v-model="estadoCivil">
                </div>
            </div>
            <div class="col col-4">
                <div class="form-group">
                    <label for="possuiFilhos">Possui filhos</label>
                    <input type="text" class="form-control" v-model="possuiFilhos" name="possuiFilhos">
                </div>
            </div>
            <div class="col col-4">
                <div class="form-group">
                    <label for="resideCom">Reside com</label>
                    <input type="text" class="form-control" v-model="resideCom" name="resideCom">
                </div>
            </div>
        </div>-->
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" v-model="this.aluno.endereco.rua" name="endereco" :disabled="true">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" v-model="this.aluno.contatos.email" name="email" :disabled="true">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="telefoneCelular">Telefone celular</label>
                    <input type="text" class="form-control" v-model="this.aluno.contatos.celular" name="telefoneCelular" :disabled="true">
                </div>
            </div>            
            <template v-if="this.aluno.contatos.telefone == null">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="telefoneResidencial">Telefone residencial</label>
                        <input type="text" class="form-control" name="telefoneResidencial" :disabled="true">
                    </div>
                </div>
            </template>
           <template v-else>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="telefoneResidencial">Telefone residencial</label>
                    <input type="text" class="form-control" v-model="this.aluno.contatos.telefone" name="telefoneResidencial" :disabled="true">
                </div>
            </div>
            </template>
        </div>
    
    </div>
</template>

<script>
import VueCalendar  from 'vuejs-datepicker'
import {en, ptBR}   from 'vuejs-datepicker/dist/locale'
export default {
    components:{
            VueCalendar,
            ptBR
    },
    props:{
        aluno: Object
    },
    data: function(){
        return {
        }
    },
    methods:{
    }

}
</script>

