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
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(item,index) in denuncias" :key="index">
                                    <td>{{index+1}}</td>
                                    <td>{{item.nombre}}</td>
                                    <td>
                                        {{item.celular}}
                                    </td>
                                    <td>{{item.correo}}</td>
                                    <td>{{item.descripcion}}</td>
                                    <td>{{item.created_at|moment}}</td>
                                    <td>
                                        <span v-if="days(item.created_at)<15" class="badge badge-success">
                                                {{days(item.created_at)}}
                                        </span>
                                        <span v-else-if="days(item.created_at)<30" class="badge badge-warning">
                                                {{days(item.created_at)}}
                                        </span>
                                        <span v-else class="badge badge-danger">
                                                {{days(item.created_at)}}
                                        </span>
                                    </td>
                                    <td>
                                        {{item.estado}}
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="guardar">
                            <div class="form-group row">
                                <label for="codigoaccesso" class="col-sm-2 col-form-label">Codigo Accesso</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" v-model="denu.codigoaccesso" id="codigoaccesso" placeholder="Codigo Acceso">
                                </div>
                                <label for="referencia" class="col-sm-2 col-form-label">Referencia</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" v-model="denu.referencia" id="referencia" placeholder="Referencia">
                                </div>
                                <label for="clase" class="col-sm-2 col-form-label">Clase</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" v-model="denu.clase" id="clase" placeholder="Clase">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i>Cerrar</button>
                                <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Guardar</button>
                            </div>
                        </form>
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
                denuncias:[],
                denuncia:{},
                denu:{},
                codigodenuncia:'',
            }
        },
        methods:{
            datos(){
                axios.get('/denuncia/CREADO').then(res=>{
                    this.denuncias=res.data;
                })
            },
            days(date){
                var a = moment();
                var b = moment(date);
                return a.diff(b, 'days')
            },
            ver(item){
                this.denuncia=item;
                var doc = new jsPDF()
                var fecha = new Date();
                doc.setFontType('bold')
                doc.text(60, 15, 'FORMULARIO DE DENUNCIA');
                doc.setFontSize(10);
                doc.text(40, 22, 'FECHA')
                doc.text(80, 22, 'DIA')
                doc.text(120, 22, 'MES')
                doc.text(160, 22, 'AÑO')

                doc.setFontType('normal')
                doc.text(40, 27, '')
                doc.text(80, 27, fecha.getDate().toString())
                doc.text(120, 27, (fecha.getMonth()+1).toString())
                doc.text(160, 27, fecha.getFullYear().toString())



                doc.setFontType('bold')
                doc.text(30, 33, 'I. INFORMACION DEL DENUNCIANTE')
                doc.text(100, 33, 'Solicitud reserva de identidad')
                doc.setFontType('normal')
                doc.text(160, 33, this.denuncia.solicitud!=undefined?this.denuncia.solicitud:'' )

                let wi=38;
                doc.setFontType('bold')
                doc.text(30, wi, 'Nombre y apellidos')
                doc.text(110, wi, 'Cedula de identidad N°')
                doc.setFontType('normal')
                wi=wi+5;
                doc.text(30, wi, this.denuncia.nombre!=undefined?this.denuncia.nombre:'');
                doc.text(110, wi, this.denuncia.ci!=undefined?this.denuncia.ci:'')
                wi=wi+6;
                doc.setFontType('bold')
                doc.text(30, wi, 'Telefono de referencia')
                doc.text(110, wi, 'Correo electronico')
                doc.setFontType('normal')
                wi=wi+5;
                doc.text(30, wi, this.denuncia.celular!=undefined?this.denuncia.celular:'')
                doc.text(110, wi, this.denuncia.correo!=undefined?this.denuncia.correo:'')

                wi=wi+7;
                doc.setFontType('bold')
                doc.text(30, wi, 'II. INFORMACION DEL DENUNCIADO(S)')
                wi=wi+5;
                doc.text(30, wi, 'N')
                doc.text(35, wi, 'Nombres y apellidos')
                doc.text(110, wi, 'Unidad Organizacional y/o Cedula de identidad')
                doc.setFontType('normal');
                let cont=0;
                // this.personas.forEach(res=>{
                //     cont++;
                wi=wi+5;
                let loremipsum = this.denuncia.denunciados;
                let lines = doc.splitTextToSize(loremipsum, 160)
                lines = doc.splitTextToSize(loremipsum, 160)
                doc.text(30, wi, lines)
                //     doc.text(30, wi, cont.toString())
                //     doc.text(35, wi, res.nombre)
                //     doc.text(110, wi, res.unidad)
                // });
                wi=wi+8;
                doc.setFontType('bold')
                doc.text(30, wi, 'III. DESCRIPCION DE LOS ECHO DE LA DENUNCIA:')
                doc.setFontType('normal');
                wi=wi+5;
                // doc.text(30, wi, 'Considere las siguientes preguntas: ¿Que ocurrio? ¿Como? ¿Cuando paso? ¿Donde? ¿Quien lo hizo? ¿Con quien? ¿Cuanto?')
                loremipsum = 'Considere las siguientes preguntas: ¿Que ocurrio? ¿Como? ¿Cuando paso? ¿Donde? ¿Quien lo hizo? ¿Con quien? ¿Cuanto?';
                lines = doc.splitTextToSize(loremipsum, 160)
                lines = doc.splitTextToSize(loremipsum, 160)
                doc.text(30, wi, lines)
                wi=wi+10;
                loremipsum = this.denuncia.descripcion!=undefined?this.denuncia.descripcion:'';
                lines = doc.splitTextToSize(loremipsum, 160)
                doc.text(30, wi, lines)

                doc.save('Denuncia');
            },
            marcha(estado,item){
                let tipo;
                // console.log(estado);
                if(estado=='DAR EN MARCHA'){
                    tipo="info";
                }else{
                    tipo="error";
                }
                this.$fire({
                    title: estado+"?",
                    // text: estado,
                    type: tipo,
                    timer: 3000,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si'
                }).then(r => {
                    // console.log(r.value);
                    this.codigodenuncia=item.id;
                    if(r.value){
                        if (estado=='DAR EN MARCHA'){
                            $('#exampleModal').modal('show');
                        }else{
                            axios.put('/denuncia/'+item.id,{estado:estado}).then(res=>{
                                // console.log();
                                this.datos();
                            })
                        }
                    }
                });
            },
            guardar(){
                this.denu.estado='DAR EN MARCHA';
                axios.put('/denuncia/'+this.codigodenuncia,this.denu).then(res=>{
                    // console.log();
                    this.datos();
                    $('#exampleModal').modal('hide');
                })
            }
        },
        filters: {
            moment: function (date) {
                return moment(date).format('DD/MM/YYYY, HH:mm:ss');
            }
        }
    }
</script>
