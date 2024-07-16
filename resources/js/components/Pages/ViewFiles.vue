<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" style="color: white">
                        Aprovar Arquivos

                        <a v-if="showFilters === true" @click="hideFilter" class="back-arrow">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>

                    <filters v-if="showFilters" @modify-value="modifyValue($event)"></filters>

                    <div class="card-body ">
                        <div v-if="showFilters === false" class="row div-filter">

                            <div  class="col-md-2">
                                <button @click="filterButton" class="btn btn-custom btn-primary">
                                    Filtrar
                                </button>
                            </div>

                        </div>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-nowrap text-center">Id Arquivo</th>
                                        <th scope="col" class="text-nowrap text-center">Nome Arquivo</th>
                                        <th scope="col" class="text-nowrap text-center">Status</th>
                                        <th scope="col" class="text-nowrap text-center">Tamanho Arquivo</th>
                                        <th scope="col" class="text-nowrap text-center">Tipo Arquivo</th>
                                        <th scope="col" class="text-nowrap text-center">User Id</th>
                                        <th scope="col" class="text-nowrap text-center">Criado Em</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="file in localFiles" :key="file.id">
                                        <td class="text-nowrap text-center">{{ file.id }}</td>
                                        <td class="text-center text-wrap">{{ file.file_name }}</td>
                                        <td class="text-nowrap text-center">{{ translateStatus(file.status) }}</td>
                                        <td class="text-nowrap text-center">{{ file.size }}B</td>
                                        <td class="text-center text-wrap"> {{ file.type }} </td>
                                        <td class="text-nowrap text-center">{{ file.user_id }}</td>
                                        <td class="text-wrap text-center">{{ formatDate(file.created_at) }}</td>

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
import { format } from 'date-fns';


export default {
    props: {
        files: {
            required: true
        }
    },
    data() {
        return {
            showFilters: false,
            localFiles: this.files
        }
    },
    methods: {
        translateStatus(status){
            if(status === 1){
                return 'Pendente';
            } else if (status === 2){
                return 'Aprovado'
            } else if (status === 3){
                return 'Reprovado'
            }
        },

        filterButton(){
            this.showFilters = !this.showFilters;
            console.log(this.showFilters);
        },
        hideFilter(){
            if(this.showFilters === true){
                this.showFilters = false;
            }
        },

        modifyValue(filteredData){
            console.log('AQUIIII');
            this.localFiles = filteredData
            console.log(this.localFiles);
        },


        formatDate(date){
            return new Date(date).toLocaleDateString();
        }
    }
};

</script>


<style scoped>



.custom-div{
    display: flex;
    /* justify-content: space-between; */

}
.div-filter{
    display: flex;
    align-items: center;
    justify-content: end;
}

.btn-custom{
    width: 100%;
}

.card{
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: rgb(75, 75, 75); /* Ajuste a cor de fundo conforme necessário */
    color: white;
    padding: 10px;
}

.back-arrow {
    cursor: pointer;
    color: white;
    text-decoration: none;
}

</style>
