<template>
    <div v-if="modalDetalhes">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-dialog" :class="{ 'mw-100 w-75' : existeObservacoes() }" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detalhes do Atendimento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" @click="close">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" :class="{ 'modal-body-extended': existeObservacoes() }">
                                <div class="container">
                                    <div class="mt-2">
                                        <b>Nome: </b>
                                        {{ atendimento.detalhes.nome_aluno }}
                                        <br/>
                                        <b>Matrícula: </b>
                                        {{ atendimento.detalhes.matricula }}
                                        <br/>
                                        <b>Encaminhamento: </b>
                                        {{ atendimento.detalhes.encaminhamento }}
                                        <br />
                                        <b>Motivo: </b>
                                        {{ atendimento.detalhes.motivo }}
                                    </div>

                                    <table v-if="existeObservacoes()" class="tg mt-5">
                                        <thead>
                                        <tr>
                                            <th class="tg-0lax">Observação</th>
                                            <th class="tg-0lax">Data</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="obs in atendimento.detalhes.observacoes">
                                            <td class="tg-0lax">{{ obs.observacao }}</td>
                                            <td class="tg-0lax">{{ formatarData(obs.created_at) }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <p class="mt-5" v-else>
                                        <b>Não há observações registradas!</b>
                                    </p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" @click="close">Fechar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    import Moment from "moment";

    export default {
        name: "DetalhesAtendimento",
        data: function () {
            return {
                modalDetalhes: false,
                atendimento: []
            }
        },
        methods: {
            show: function (atendimentoId) {
                axios.get("/atendimentos/detalhes/" + atendimentoId)
                    .then(response => {
                        this.atendimento = response.data;
                        //Abrir o modal
                        this.modalDetalhes = true
                    }, response => {
                        this.$toast("error", "Não foi possível carregar esse atendimento!");
                    });
            },
            close() {
                this.modalDetalhes = false;
            },
            formatarData(data){
                return Moment(data).locale('pt-br').format("LLL");
            },
            existeObservacoes() {
                return Object.keys(this.atendimento.detalhes.observacoes).length !== 0;
            }
        }
    }

</script>

<style scoped>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-dialog {
        overflow-y: initial !important
    }

    .modal-body {
        overflow-y: auto;
    }

    .modal-body-extended {
        height: 450px;
    }

    ul {
        list-style: none;
    }

    .tg {
        border-collapse: collapse;
        border-color: #9ABAD9;
        border-spacing: 0;
        width: 100%;
    }

    .tg td {
        background-color: #EBF5FF;
        border-color: #9ABAD9;
        border-style: solid;
        border-width: 1px;
        color: #444;
        font-family: Arial, sans-serif;
        font-size: 14px;
        overflow: hidden;
        padding: 10px 5px;
        word-break: normal;
    }

    .tg th {
        background-color: #409cff;
        border-color: #9ABAD9;
        border-style: solid;
        border-width: 1px;
        color: #fff;
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        overflow: hidden;
        padding: 10px 5px;
        word-break: normal;
    }

    .tg .tg-0lax {
        text-align: left;
        vertical-align: top
    }
</style>