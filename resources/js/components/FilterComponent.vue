<template>
    <div class="card-body custom-color">
        <div class="row div-filter">

            <div class="col-md-4" style="">
                <label for="" class="col-form-label" style="color: white;">Status:</label>
                <div class="col-md-6">
                    <select name="" class="form-control" v-model="filters.status">
                        <option value="">Todos</option>
                        <option value="1">Pendente</option>
                        <option value="2">Aprovado</option>
                        <option value="3">Reprovado</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <label for="" class="col-form-label" style="color: white;">Nome Arquivo:</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" v-model="filters.file_name">
                </div>
            </div>


            <div class="col-md-2">
                <button @click="filterButton" class="btn btn-custom btn-primary">
                    Filtrar
                </button>
                <button @click="cleanFilters" class="btn btn-danger btn-limpar">
                    Limpar
                </button>
            </div>

        </div>
    </div>


</template>
<script>

export default {
    props:{

    },
    data() {
        return {
            filters: {
                file_name: '',
                status: ''
            },
            filteredData: {}

        }
    },
    methods:{
        async filterButton(){
            await axios.post('/filterData', this.filters)
            .then(async response => {
                this.filteredData = response.data
                await this.$emit('modify-value', this.filteredData)
            })
        },
        cleanFilters(){
            this.filters = ''
        }
    }


};
</script>


<style scoped>
.custom-color{
    background-color:  rgb(95, 95, 95);
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.3);
}
.btn-limpar{
    margin-top: 0.5em;
    width: 100%;
}

.div-filter{
    display: flex;
    align-items: center;
    justify-content: center
}

.btn-custom{
    width: 100%;
}
</style>
