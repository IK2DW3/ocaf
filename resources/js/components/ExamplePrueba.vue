<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="table-responsive table-mujeres">
                    <table class="table table-striped rounded">
                        <thead class="thead-dark position-sticky">
                            <tr>
                                <th scope="col">Español</th>
                                <th scope="col">English</th>
                                <th scope="col">Euskara</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="ambito in ambitos" v-bind:key="ambito.id">
                                <td v-text="ambito.ambitoEsp">{{ambito.ambitoEsp}}</td>
                                <td v-text="ambito.ambitoEng">{{ambito.ambitoEng}}</td>
                                <td v-text="ambito.ambitoEus">{{ambito.ambitoEus}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="" type="button" class="btn btn-secondary" title="Ver">&#x1F440;</a>
                                        <button type="button" class="btn btn-secondary" title="Editar">&#x270E;</button>
                                        <button href="" type="button" class="btn btn-secondary" title="Eliminar">&#x2716;</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
    export default {
        data(){
            return{
                ambitos:[], //Este array contendrá las tareas de nuestra bd
            }
        },

        methods: {
            getVuePruebas() { //Ruta que hemos creado para que nos devuelva todas las tareas
                
                axios.get('pruebas').then(function (response) {
                    //creamos un array y guardamos el contenido que nos devuelve el response
                    this.ambitos = response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            }
            
        },

        mounted() {
            console.log('Componente montado.');
            this.getVuePruebas();
        },

    }
</script>
