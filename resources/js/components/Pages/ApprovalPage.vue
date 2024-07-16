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
                                    <tr v-for="file in files" :key="file.id">
                                        <td class="text-nowrap text-center">
                                            {{ file.file_name }}
                                        </td>
                                        <td class="text-nowrap text-center">
                                            {{ file.type }}
                                        </td>
                                        <td class="text-nowrap text-center">
                                            {{ file.size }}B
                                        </td>
                                        <td class="text-center">
                                            {{ file.user_id }}
                                        </td>
                                        <td class="text-center">
                                            <button type="button" @click="approveFile(file)" class="btn btn-sm btn-success">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" @click="rejectFile(file)" class="btn btn-sm btn-danger">
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
            required: true
        }
    },
    data(){
        return {
        }
    },
    methods: {
        approveFile(file){
            axios.post('/approve', file)
            .then(async response => {
                console.log(response.data);
                if (response.data.code === 200){
                    await Swal.fire({
                        title: 'Sucesso!',
                        text: response.data.message,
                        icon: 'success',
                        confirmButtonText: 'Ok!'
                    })
                    location.reload();
                } else {
                    Swal.fire({
                        title: 'Erro!',
                        text: response.data.message,
                        icon: 'error',
                        confirmButtonText: 'Ok.'
                    })
                }
            })
            .catch(error => {
                Swal.fire({
                    title: 'Erro!',
                    text: 'Erro ao processar requisição.',
                    icon: 'error',
                    confirmButtonText: 'Ok!'
                });
            })
        },

        rejectFile(file){
            axios.post('/reject', file)
            .then(async response => {
                if (response.data.code === 200){
                    await Swal.fire({
                        title: 'Sucesso!',
                        text: response.data.message,
                        icon: 'success',
                        confirmButtonText: 'Ok!'
                    })
                    location.reload();
                } else {
                    Swal.fire({
                        title: 'Erro!',
                        text: response.data.message,
                        icon: 'error',
                        confirmButtonText: 'Ok.'
                    })
                }
            })
            .catch(error => {
                Swal.fire({
                    title: 'Erro!',
                    text: 'Erro ao processar requisição.',
                    icon: 'error',
                    confirmButtonText: 'Ok!'
                });
            })
        }
    }


}

</script>


<style scoped>

.card-header{
    background-color: rgb(75 75 75) !important;
}


.text-custom {
    white-space: normal !important;
    word-wrap: break-word;
}

.card{
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}



</style>
