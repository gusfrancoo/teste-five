<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="color: white">
                        Home
                    </div>

                    <div class="card-body custom-color">

                        <div class="row input-group">

                            <label class="input-group">Upload de arquivos:</label>

                            <div class="col-md-12">
                                <input ref="fileInput" class="form-control" type="file" @change="handleFile">
                            </div>

                        </div>

                        <div class="row div-button">

                            <button @click="submitFile" class="btn btn-success btn-custom">
                                Upload
                            </button>

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
    props:{
        sessionStatus:{
            type: String,
            default: null
        }
    },
    data(){
        return {
            file: null
        }
    },
    methods:{
        handleFile(event){
            const input = event.target;
            if(input && input.files){
                this.file = input.files[0];
                console.log(this.file);
            }

        },

        async submitFile(){
            if (this.file){
                const formData = new FormData();
                formData.append('file', this.file);
                await axios.post('/upload', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(async response => {
                    await Swal.fire({
                        title: 'Sucesso!',
                        text: response.data.message,
                        icon: 'success',
                        confirmButtonText: 'Ok!'
                    })
                    this.file = null;
                    this.$refs.fileInput.value = null;
                })
                .catch(error =>{
                    console.error('Erro ao enviar o arquivo: ', error);
                    Swal.fire({
                        title: 'Erro!',
                        text: 'Error ao enviar o arquivo para aprovação.',
                        icon: 'error',

                    })
                })

            } else {
                Swal.fire({
                    title: 'Aviso!',
                    text: 'Por favor, selecione um arquivo primeiro.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
            }
        }
    }

}

</script>

<style scoped>
.card{
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}


.div-button{
    display: flex;
    margin: 1em;
    justify-content: center;

}
.btn-custom{
    width: 30%;
}

.card-header{
    background-color: rgb(75 75 75) !important;
}
</style>
