<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="color: white">
                        Aprovar Arquivos
                    </div>

                    <div class="card-body custom-color">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-nowrap text-center">Nome Arquivo</th>
                                        <th scope="col" class="text-nowrap text-center">Tipo Arquivo</th>
                                        <th scope="col" class="text-nowrap text-center">Tamanho Arquivo</th>
                                        <th scope="col" class="text-nowrap text-center">User Id</th>
                                        <th scope="col" class="text-nowrap text-center">Aprovar</th>
                                        <th scope="col" class="text-nowrap text-center">Recusar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="file in files">
                                        <td class="text-nowrap text-center">
                                            {{ file.file_name }}
                                        </td>
                                        <td class="text-nowrap text-center">
                                            {{ file.type }}
                                        </td>
                                        <td class="text-nowrap text-center">
                                            {{ file.size }}
                                        </td>
                                        <td class="text-center">
                                            {{ file.user_id }}
                                        </td>
                                        <td class="text-center">
                                            <button type="button" @click="" class="btn btn-sm btn-success">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" @click="" class="btn btn-sm btn-danger">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Swal from 'sweetalert2';

export default {
    props: {
        files: {
            type: String,
            required: true
        }
    }
}

</script>


<style scoped>

.card-header{
    background-color: rgb(75 75 75) !important;
}

.card-header{
    background-color: rgb(75 75 75) !important;
}

.text-custom {
    white-space: normal !important;
    word-wrap: break-word;
}



</style>
