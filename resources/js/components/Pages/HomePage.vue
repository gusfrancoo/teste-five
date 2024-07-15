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
                                <input class="form-control" type="file" @change="handleFile">
                            </div>

                        </div>

                        <div class="row div-button">

                            <button class="btn btn-success btn-custom">
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
