<template>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Denuncias</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Celular</th>
                                    <th>Correo</th>
                                    <th>Descripcion</th>
                                    <th>Fecha</th>
                                    <th>Dias</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(item,index) in denuncias" :key="index">
                                    <td>{{index+1}}</td>
                                    <td>{{item.nombre}}</td>
                                    <td>{{item.celular}}</td>
                                    <td>{{item.correo}}</td>
                                    <td>{{item.descripcion}}</td>
                                    <td>{{item.created_at|moment}}</td>
                                    <td>{{days(item.created_at)}}</td>
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
import $ from 'jquery'
import moment from 'moment'

export default {
    created() {
        // console.log('Component mounted.')
        this.datos();
    },
    data: function(){
        return {
            denuncias:[]
        }
    },
    methods:{
        datos(){
            axios.get('/denuncia').then(res=>{
                this.denuncias=res.data;
            })
        },
        days(date){
            var a = moment();
            var b = moment(date);
            return a.diff(b, 'days')
        }
    },
    filters: {
        moment: function (date) {
            return moment(date).format('DD/MM/YYYY, HH:mm:ss');
        }
    }
}
</script>
