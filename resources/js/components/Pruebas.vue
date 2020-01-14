<template>
    <div class="table-responsive table-mujeres">
        <table class="table table-striped rounded">
            <thead class="thead-dark position-sticky">
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in arrayUsers" :key="user.id">
                    <td>@{{ user.name }}</td>
                    <td>@{{ user.email }}</td>
                    <td>@{{ user.tipo }}</td>
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
</template>

<script>
    export default {
        data(){
            return{
                arrayUsers:[], //Este array contendrá las tareas de nuestra bd
            }
        },

        methods: {
            getVuePruebas() {
                let url = 'pruebas' //Ruta que hemos creado para que nos devuelva todas las tareas

                axios.get(url).then(function(response) {
                    this.arrayUsers = response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            }
        },
        mounted() {
            console.log('Componente montado.')
            this.getVuePruebas();
        }

    }


</script>
