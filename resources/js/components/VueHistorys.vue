<template>

    <div class="row px-4 py-2" id="cartas">
        <div class="col-sm-12">
            <div class="row bg-dark m-0 px-1 py-3 rounded">
                <div class="col-sm-12">
                    <h1 class="text-light">Filtrar</h1>
                </div>
                <div class="col-sm-12 col-md-6 my-2">
                    <select v-model="ambito_id" class="custom-select" @change="filterTask()">
                        <option disabled v-text="'Seleccionar ambito'" value=""></option>
                        <option v-text="'Todo'" value="Todo"></option>
                        <option v-for="ambito in arrayAmbitos" v-bind:key="ambito.id" v-text="ambito.ambitoEsp" :value="ambito.id"></option>
                    </select>
                </div>
                <div class="col-sm-12 col-md-6 my-2">
                    <input class="form-control" type="search" v-model="busqueda" name="buscador" placeholder="Buscar en página" autocomplete="off">
                </div>
            </div>
        </div>
        <div v-for="carta in buscarCartas" v-bind:key="carta.id" class="col-sm-12 col-md-4 col-lg-3 col-xl-2">
            <div class="card text-center my-2">
                <div class="card-header d-flex align-items-center justify-content-center">
                    <h2 v-text="carta.nombre +' '+ carta.apellido" class="font-weight-bolder m-0"></h2>
                </div>
                <div class="card-body">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-sm-12">
                            <img v-if="carta.imgRuta != ''" :src="'../resources/img/cartas/'+ carta.imgRuta" class="card-img-top" v-bind:alt='carta.nombre' v-bind:title='carta.nombre' style="height:200px">
                            <img v-else-if="carta.imgDefault != ''" :src="carta.imgDefault" class="card-img-top" v-bind:alt="carta.nombre" v-bind:title="carta.nombre" style="height:200px">
                            <img v-else :src="'../resources/img/imglogo.svg'" class="card-img-top" v-bind:alt="'No encontrado'" v-bind:title="'No encontrado'" style="height:200px">
                        </div>
                        <div class="col-sm-12">
                            <a class="btn btn-primary" :href="'history/'+ carta.id">Ver</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer" v-text="carta.ambito.ambitoEsp"></div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    data(){
        return{
            // Parametros iniciales
            ambito_id:"",
            busqueda:"",
            update:0,
            arrayCartas:[],
            arrayAmbitos:[],
        }
    },
    methods:{
        // Metodo para recoger los datos
        getTasks(){
            let me =this;
            let url = 'card';
            axios.get(url).then(function (response) {
                me.arrayCartas = response.data;
            }).catch(function (error) {
                console.log(error);
            });
            axios.get('ambit').then(function (response) {
                me.arrayAmbitos = response.data;
            }).catch(function (error) {
                console.log(error);
            });
        },
        filterTask() {
            let me =this;
            if (me.ambito_id === "") {
                this.$swal('Advertencia', 'Debes seleccionar un tipo', 'error');
            } else if (me.ambito_id === "Todo") {
                this.clearFields();
            } else {
                me.update = me.ambito_id
                let url = 'card/filtrar?ambito_id='+ me.update;
                axios.get(url).then(function (response) {
                    me.arrayCartas = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            }

        },
        clearFields(){
            this.ambito_id="";
            this.busqueda="";
            this.update=0;
            this.getTasks();
        },
    },
    computed: {
        buscarCartas() {
            return this.arrayCartas.filter((carta) =>
                carta.nombre.toLowerCase().includes(this.busqueda.toLowerCase()) ||
                carta.apellido.toLowerCase().includes(this.busqueda.toLowerCase()) ||
                carta.ambito.ambitoEsp.toLowerCase().includes(this.busqueda.toLowerCase()));
        }
    },
    // Metodo de inicialización del archivo vue
    mounted() {
        this.getTasks();
    }

}
</script>
