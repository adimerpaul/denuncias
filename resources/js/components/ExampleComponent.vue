<template>
    <div class="form-container outer">
        <div class="form-form" style="width: 100%">
            <div class="form-form-wrap" style="width: 100%" >
                <div class="form-container" style="width: 100%">
                    <div class="form-content" style="width: 100%">
                        <h1 class="">FORMULARIO DE DENUNCIA</h1>
                        <form class="text-left" @submit.prevent="denunciaform">
                            <div class="form">
                                <label for="denuncia">I. INFOMACION DEL DENUNCIANTE</label>
                                <div  class="field-wrapper input">
                                    <label for="denuncia">SOLICITA RESERVA DE IDENTIDAD:</label>
                                    <select name="denuncia" id="denuncia" class="form-control" v-model="solicita" required>
                                        <option value=""> Seleccionar...</option>
                                        <option value="SI"> SI</option>
                                        <option value="NO"> NO</option>
                                        <option value="DENUNCIA ANONIMA"> DENUNCIA ANONIMA</option>
                                    </select>
                                </div>
                                <template v-if="solicita=='SI' || solicita=='NO'">
                                    <div class="field-wrapper input">
                                        <label for="nombre">NOMBRE Y APELLIDOS</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <input required id="nombre" name="nombre" type="text" value="" class="form-control" placeholder="Nombre y apellidos" v-model="denuncia.nombre">
                                    </div>
                                    <div  class="field-wrapper input mb-2">
                                        <label for="nombre">CEDULA DE IDENTIDAD</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
                                        <input required id="ci" name="ci" type="text" value="" class="form-control" placeholder="Carnet de identidad" v-model="denuncia.ci">
                                    </div>
                                    <div  class="field-wrapper input mb-2">
                                        <label for="nombre">TELEFONO DE REFERENCIA</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                        <input required id="telefono" name="telefono" type="text" value="" class="form-control" placeholder="Celular" v-model="denuncia.celular">
                                    </div>
                                    <div  class="field-wrapper input mb-2">
                                        <label for="nombre">CORREO ELECTRONICO</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                        <input id="email" name="email" type="text" value="" class="form-control" placeholder="Gmail" v-model="denuncia.correo">
                                    </div>
                                    <div  class="field-wrapper input mb-2">
                                        <label for="nombre">DIRECCION</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
                                        <input id="direccion" name="direccion" type="text" value="" class="form-control" placeholder="Direccion" v-model="denuncia.direccion">
                                    </div>
                                </template>
                                <label for="denuncia">II. INFOMACION DEL DENUNCIANDO(S)</label>
                                <div  class="field-wrapper input">
<!--                                    <label for="denuncia">I. INFOMACION DEL DENUNCIANTE</label>-->
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <td>N</td>
                                            <td>Nombres y Apellidos</td>
                                            <td>Unidad Organizacional y/o Cedula de identidad</td>
                                            <td>Opciones</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(item,index) in personas" :key="index">
                                            <td>
                                                {{index+1}}
                                            </td>
                                            <td>
                                                <input type="text" v-model="item.nombre" style="padding: 0;margin: 0;border: 1px solid black">
                                            </td>
                                            <td>
                                                <input type="text" v-model="item.unidad" style="padding: 0;margin: 0;border: 1px solid black">
                                            </td>
                                            <td>
                                                <button type="button" @click="mas" class="btn btn-success btn-sm" style="padding: 0px">
                                                    +
                                                </button>
                                                <button v-if="index!=0" type="button" @click="menos(index)" class="btn btn-danger btn-sm" style="padding: 0px">
                                                    -
                                                </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <label for="denuncia">III. DESCRIPCION DE LOS ECHOS DE LA DENUNCIA</label>
                                <div id="email-field" class="field-wrapper input">
                                    <label for="nombre">Considere las siguientes preguntas: ¿Que ocurrio? ¿Como? ¿Cuando paso? ¿Donde? ¿Quien lo hizo? ¿Con quien? ¿Cuanto?</label>
                                    <textarea name="" id="" style="width: 100%" cols="30" rows="10" v-model="denuncia.descripcion"></textarea>
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Realizar denuncia!</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // import jsPDF from 'jspdf'
    import $ from 'jquery'
    export default {
        created() {
            console.log('Component mounted.')
        },
        data: function(){
            return {
                solicita:'',
                personas:[{nombre:'',unidad:''}],
                denuncia:{},
                dato:'ADIMER PAUL CHAMBI AJATA'
            }
        },
        methods:{
            mas(){
                this.personas.push({nombre:'',unidad:''});
            },
            menos(index){
                this.personas.splice(index, 1);
            },
            denunciaform(){
                this.$fire({
                    title: "Seguro?",
                    text: "Seguro de realizar su denuncia",
                    type: "warning",
                    timer: 3000,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si'
                }).then(r => {
                    // console.log(r.value);
                    if(r.value){
                        let denunciados='';
                        this.personas.forEach(res=>{
                            denunciados=denunciados+res.nombre+','+res.unidad+',';
                        });

                        this.denuncia.solicitud=this.solicita;
                        console.log(this.solicita);
                        this.denuncia.denunciados=denunciados;

                        axios.post('/denuncia',this.denuncia).then(res=>{
                            // console.log(res);
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

                            let wi=38;

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
                            this.personas.forEach(res=>{
                                cont++;
                                wi=wi+5;
                                doc.text(30, wi, cont.toString())
                                doc.text(35, wi, res.nombre)
                                doc.text(110, wi, res.unidad)
                            });
                            wi=wi+8;
                            doc.setFontType('bold')
                            doc.text(30, wi, 'III. DESCRIPCION DE LOS ECHO DE LA DENUNCIA:')
                            doc.setFontType('normal');
                            wi=wi+5;
                            // doc.text(30, wi, 'Considere las siguientes preguntas: ¿Que ocurrio? ¿Como? ¿Cuando paso? ¿Donde? ¿Quien lo hizo? ¿Con quien? ¿Cuanto?')
                            let loremipsum = 'Considere las siguientes preguntas: ¿Que ocurrio? ¿Como? ¿Cuando paso? ¿Donde? ¿Quien lo hizo? ¿Con quien? ¿Cuanto?';
                            let lines = doc.splitTextToSize(loremipsum, 160)
                            lines = doc.splitTextToSize(loremipsum, 160)
                            doc.text(30, wi, lines)
                            wi=wi+10;
                            loremipsum = this.denuncia.descripcion!=undefined?this.denuncia.descripcion:'';
                            lines = doc.splitTextToSize(loremipsum, 160)
                            doc.text(30, wi, lines)

                            doc.save('Denuncia');

                            this.solicita='';
                            this.personas=[{nombre:'',unidad:''}];
                            this.denuncia={};

                        });
                    }
                });
            }
        }
    }
</script>
