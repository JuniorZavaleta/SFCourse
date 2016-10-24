@extends('layouts.app')

@section('content')

<script src="{{ url('js/app.js') }}"></script>
<style type="text/css">
    .clickable {
        cursor: pointer;
    }
    .unidad-selected {
    }
    .semana-selected {
    }
    .ref-selected {
        background: black;
        color: white;
    }
    #unidades, #semanas {
        margin-top: 15px;
        text-align: center;
    }
    #unidades .unidad{
        margin: 0 auto;
    }
    #semanas .semana {
        margin: 0 auto;
    }
    #temas .tema {
        margin: 0 auto;
    }
    .unidad p, .semana p, .tema p {
        line-height: 40px;
        margin: 0px;
    }
    .unidad-selected p {
        display: inline-block;
        background-color:  #d6dac6;
        color: #000;
        width: 70%;
    }
    .semana-selected p {
        display: inline-block;
        background: #95d5e4;
        color: #000;
        width: 70%;
    }
    .tema-selected p {
        display: inline-block;
        background: #e4e3e6;
        color: #000;
        width: 100%;
    }
    .input-text {
        padding: 5px;
        width: 80%;
        margin-top: 15px;
        border: 0px;
        border-bottom: 1px solid;
        outline: none;
        background: inherit;
    }
    .input-text::-webkit-input-placeholder { text-align: center; }
    /* Firefox 18- */
    .input-text:-moz-placeholder { text-align: center; }
    /* Firefox 19+ */
    .input-text::-moz-placeholder { text-align: center; }
    .input-text:-ms-input-placeholder { text-align: center; }

    .input-ref {
        border: 0px;
        padding: 5px;
        width: 80%;
        border-bottom: 1px solid;
        outline: none;
        background: inherit;
    }
    .btn {
        border-radius: 0;
    }
    .btn-danger {
        height: 40px;
    }
    .btn-danger > .glyphicon {
        top: 3px;
    }
    h1,h2,h3,h4,h5,h6 { cursor: default; }
    hr {
        width: 90%;
        border-top: 2px solid #eeeeee;
    }
    .row {
        margin: 0;
    }
    .row-ref {
        margin-bottom: 10px;
    }
    .label-ref {
        line-height: 33px;
        margin-top: 5px;
    }
    .add-ref-container {
        margin-top: 20px;
    }
    .float-right {
        float: right;
    }
    @media(min-width:768px) {
        .input-text {
            width: 60%;
        }
        .column:first-child {
            border-right: #fcf solid 2px;
        }
        .input-ref {
            margin-right: 10px;
            width: 100%;
        }
        .add-ref-container {
            margin-top: 0px;
        }
        .tema-selected p {
            width: 80%;
        }
    }
    @media(min-width: 992px) {
        .column {
            border-right: #fcf solid 2px;
        }
    }
    @media(min-width:1200px) {
        #unidades .unidad {
            width: 70%;
        }
        #semanas .semana {
            width: 80%;
        }
    }
</style>

<div class="row">
    <div class="col-lg-12" id="app">
        <div class="text-center">
            <h1>Registrar Syllabus del curso de Programacion I</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">

        <div class="col-sm-6 col-md-3 column">
            <div class="row">
                <div class="text-center">
                    <h3>Unidades</h3>
                    <a class="btn btn-success" @click="add_unidad()" title="Agregar Unidad">
                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="text-center">
                    <div id="unidades">
                        <div class="clickable unidad"
                            id="unidad_@{{ unidad.id }}"
                            v-for="unidad in unidades"
                            @click="select_unidad(unidad)"
                        >
                            <p>
                                <span>@{{ unidad.name }}</span>
                                <a type="button"
                                   class="btn btn-danger float-right"
                                   v-show="unidad_selected == unidad"
                                   title="Eliminar"
                                   @click="delete_unidad(unidad)"
                                >
                                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-sm-6 col-md-3 column">
            <div class="row">
                <div class="text-center">
                    <h3>Semanas</h3>
                    <a class="btn btn-success" @click="add_semana()" v-show="unidad_selected.id" title="Agregar Semana">
                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="text-center">
                    <h4><i>@{{ unidad_selected.name }}</i></h4>
                    <div id="semanas">
                        <div class="clickable semana"
                             id="semana_@{{ semana.id }}"
                             v-for="semana in semanasUnidadSeledted(unidad_selected)"
                             @click="select_semana(semana)"
                        >
                            <p>
                                <span>@{{ semana.name }}</span>
                                <a type="button"
                                   class="btn btn-danger float-right"
                                   v-show="semana_selected == semana"
                                   title="Eliminar"
                                   @click="delete_semana(semana)"
                                >
                                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="row">
                <div class="text-center">
                    <h3><i>@{{ tema_title }}</i></h3>
                    <div id="temas">
                        <div class="clickable tema"
                             id="tema_div_@{{ tema.id }}"
                             v-for="tema in temasSemanaSelected(semana_selected)"
                        >
                            <p id="tema_@{{ tema.id }}"
                               @click="add_binding(tema)" >
                                <span>@{{ tema.name }}</span>
                                <a type="button"
                                   class="btn btn-danger float-right"
                                   v-show="tema_selected == tema"
                                   title="Eliminar"
                                   @click="delete_tema(tema)"
                                >
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </a>
                            </p>
                        </div>
                        <input v-model="edit_tema"
                               v-show="tema_selected.id"
                               class="input-text"
                               id="edit-tema"
                               data-id="">
                        <input v-model="new_tema"
                               v-show="semana_selected.id && !(tema_selected.id)"
                               class="input-text"
                               placeholder="Ingrese el nuevo tema"
                               id="new-tema"
                               @keyup.enter="add_tema()">
                        <a class="btn btn-success"
                           v-show="semana_selected.id && !(tema_selected.id)"
                           title="Agregar Tema"
                           v-show="!tema_selected.id"
                           @click="add_tema()"
                           >
                            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                        </a>
                        <a class="btn btn-default"
                           v-show="tema_selected.id"
                           href="#temas"
                           @click="actualizar_tema(tema_selected)">
                           <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                        </a>
                        <a class="btn btn-warning"
                           v-show="tema_selected.id"
                           href="#temas"
                           @click="cancelar_actualizar()">
                           <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <hr>
    </div>
</div>

<div class="row">

    <div class="col-xs-12">
        <div class="text-center">
            <h3>Referencia Bibliografica</h3>
        </div>
    </div>
</div>

<div class="row row-ref">
    <div class="col-xs-12 col-sm-4 col-lg-3">
        <div class="col-xs-3">
            <div class="text-center">
                <label class="label-ref">Autor(es)</label>
            </div>
        </div>
        <div class="col-xs-9">
            <input class="input-ref" v-model="new_ref_autor" id="new_ref_autor" v-show="!(ref_selected.id)">
            <input class="input-ref" v-model="edit_ref_autor" id="edit-ref-autor" data-id="" v-show="ref_selected.id">
        </div>
    </div>

    <div class="col-xs-12 col-sm-3 col-lg-2">
        <div class="col-xs-3">
            <div class="text-center">
                <label class="label-ref">Año</label>
            </div>
        </div>
        <div class="col-xs-9">
            <input class="input-ref" v-model="new_ref_anio" id="new_ref_anio" v-show="!(ref_selected.id)">
            <input class="input-ref" v-model="edit_ref_anio" id="edit-ref-anio" v-show="ref_selected.id">
        </div>
    </div>

    <div class="col-xs-12 col-sm-4 col-lg-5">
        <div class="col-xs-3">
            <div class="text-center">
                <label class="label-ref">Título</label>
            </div>
        </div>
        <div class="col-xs-9">
            <input class="input-ref" v-model="new_ref_titulo" id="new_ref_titulo" v-show="!(ref_selected.id)">
            <input class="input-ref" v-model="edit_ref_titulo" id="edit-ref-titulo" v-show="ref_selected.id">
        </div>
    </div>

    <div class="col-xs-12 col-sm-1 col-lg-2">
        <div class="text-center add-ref-container">
            <a class="btn btn-success"
               @click="add_ref_bibliografica()"
               v-show="!(ref_selected.id)"
               title="Agregar Referencia Bibliografica">
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
            </a>
            <a class="btn btn-default"
               v-show="ref_selected.id"
               href="#temas"
               @click="actualizar_ref(ref_selected)">
               <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
            </a>
            <a class="btn btn-warning"
               v-show="ref_selected.id"
               href="#temas"
               @click="cancelar_actualizar_ref()">
               <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12">
        <table class="table">
            <thead>
                <th>Autor(es)</th>
                <th>Año de publicación</th>
                <th>Título</th>
                <th></th>
            </thead>
            <tbody>
                <tr v-for="ref in ref_bibliografica"
                    id="ref_@{{ ref.id }}"
                    @click="add_binding_ref(ref)">
                    <td>@{{ ref.author }}</td>
                    <td>@{{ ref.year }}</td>
                    <td>@{{ ref.title }}</td>
                    <td>
                        <a class="btn btn-danger"
                           title="Eliminar"
                           @click="delete_ref_bibliografica(ref)">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<div class="footer" style="height: 100px;">
</div>
<script type="text/javascript">
    var vm = new Vue(
    {
        el: 'body',

        data: {
            unidades: [],
            semanas: [],
            temas: [],
            ref_bibliografica: [],

            unidad_selected: {},
            semana_selected: {},
            tema_selected: {},
            ref_selected: {},

            last_unidad_id: 0,
            last_semana_id: 0,
            last_tema_id: 0,
            last_ref_id: 0,

            max_unidades: 5,
            max_semanas: 17,
            max_semanas_por_unidad: 5,

            new_tema: '',
            edit_tema: '',

            new_ref_autor: '',
            new_ref_anio: '',
            new_ref_titulo: '',

            edit_ref_autor: '',
            edit_ref_anio: '',
            edit_ref_titulo: '',

            tema_title: '',
        },

        methods: {
            select_unidad: function(unidad) {
                var last_unidad = document.getElementById('unidad_' + this.unidad_selected.id)
                var unidad_element = document.getElementById('unidad_' + unidad.id)

                if (this.unidad_selected.id == undefined) {
                    unidad_element.className += ' unidad-selected'
                    this.unidad_selected = unidad
                } else {
                    if (this.unidad_selected.id == unidad.id) {
                        unidad_element.className = 'clickable unidad'
                        this.unidad_selected = {}
                    } else {
                        last_unidad.className = 'clickable unidad'
                        unidad_element.className += ' unidad-selected'
                        this.unidad_selected = unidad
                    }
                }
                this.semana_selected = {}
                this.tema_selected = {}
            },
            select_semana: function(semana) {
                var last_semana = document.getElementById('semana_' + this.semana_selected.id)
                var semana_element = document.getElementById('semana_' + semana.id)

                if (this.semana_selected.id == undefined) {
                    semana_element.className += ' semana-selected'
                    this.semana_selected = semana
                } else {
                    if (this.semana_selected.id == semana.id) {
                        semana_element.className = 'clickable semana'
                        this.semana_selected = {}
                    } else {
                        last_semana.className = 'clickable semana'
                        semana_element.className += ' semana-selected'
                        this.semana_selected = semana
                    }
                }
                this.tema_selected = {}
            },
            select_tema: function(tema) {
                var last_tema = document.getElementById('tema_div_' + this.tema_selected.id)
                var tema_element = document.getElementById('tema_div_' + tema.id)

                if (this.tema_selected.id == undefined) {
                    tema_element.className += ' tema-selected'
                    this.tema_selected = tema
                } else {
                    if (this.tema_selected.id == tema.id) {
                        tema_element.className = 'clickable tema'
                        this.tema_selected = {}
                    } else {
                        last_tema.className = 'clickable tema'
                        tema_element.className += ' tema-selected'
                        this.tema_selected = tema
                    }
                }
            },
            select_ref: function(ref) {
                var last_ref = document.getElementById('ref_' + this.ref_selected.id)
                var ref_element = document.getElementById('ref_' + ref.id)

                if (this.ref_selected.id == undefined) {
                    ref_element.className += ' ref-selected'
                    this.ref_selected = ref
                } else {
                    if (this.ref_selected.id == ref.id) {
                        ref_element.className = 'clickable ref'
                        this.ref_selected = {}
                    } else {
                        last_ref.className = 'clickable ref'
                        ref_element.className += ' ref-selected'
                        this.ref_selected = ref
                    }
                }
            },
            add_unidad: function() {
                var new_id = ++this.last_unidad_id
                var len_unidades = this.unidades.length
                if (len_unidades < this.max_unidades)
                    this.unidades.push({
                        id: new_id,
                        name: 'Unidad ' + (len_unidades + 1)
                    })
                else
                    alert("Muchas unidades")
            },
            delete_unidad: function(unidad) {
                this.semanasUnidadSeledted(unidad).forEach(function(semana, index){
                    vm.delete_semana(semana)
                })
                this.unidades.forEach(function(elemento, index, array){
                    if (elemento.id == unidad.id)
                        array.splice(index, 1)
                })

                this.unidades.forEach(function(elemento, index){
                    elemento.name = 'Unidad ' + (index + 1)
                })

                this.unidad_selected = {}
            },
            add_semana: function() {
                var new_id = ++this.last_semana_id
                var len_semanas = this.semanas.length
                if (len_semanas < this.max_semanas) {
                    var unidad = this.unidad_selected
                    var len_semanas_por_unidad = this.semanas.reduce(function(total,semana){
                        return semana.unidad_id == unidad.id ? total+1 : total
                    }, 0)

                    if (len_semanas_por_unidad < this.max_semanas_por_unidad) {
                        this.semanas.push({
                            id: new_id,
                            name: 'Semana ' + (len_semanas + 1),
                            unidad_id: this.unidad_selected.id
                        })

                        var semanas = this.semanas
                        var semanas_por_unidades = []
                        this.unidades.forEach(function(unidad, i) {
                            semanas_por_unidades[i] = semanas.reduce(function(total,semana){
                                return semana.unidad_id == unidad.id ? total+1 : total
                            }, 0)
                        })

                        var start = 0
                        this.unidades.forEach(function(unidad, i){
                            var end = start + semanas_por_unidades[i]
                            for (; start < end; start++) {
                                semanas[start].unidad_id = unidad.id
                            }
                        })
                    }
                    else
                        alert("Muchas semanas en una unidad")
                }
                else
                    alert("Muchas semanas")
            },
            delete_semana: function(semana) {
                this.temasSemanaSelected(semana).forEach(function(tema, index){
                    vm.delete_tema(tema)
                })
                this.semanas.forEach(function(elemento, index, array){
                    if (elemento.id == semana.id)
                        array.splice(index, 1)
                })

                this.semanas.forEach(function(elemento, index){
                    elemento.name = 'Semana ' + (index + 1)
                })

                this.semana_selected = {}
            },
            add_tema: function() {
                this.temas.push({
                    id: ++this.last_tema_id,
                    name: this.new_tema,
                    semana_id: this.semana_selected.id,
                })
                this.new_tema = ''
                document.getElementById('new-tema').focus();
            },
            delete_tema: function(tema) {
                this.temas.forEach(function(elemento, index, array){
                    if (elemento.id == tema.id)
                        array.splice(index, 1)
                })

                this.tema_selected = {}
            },
            semanasUnidadSeledted: function(unidad) {
                return this.semanas.filter(function(semana){
                    return semana.unidad_id == unidad.id
                })
            },
            temasSemanaSelected: function(semana) {
                return this.temas.filter(function(tema){
                    return tema.semana_id == semana.id
                })
            },
            add_binding: function(tema) {
                document.getElementById('edit-tema').dataset.id = tema.id
                this.select_tema(tema)
                this.edit_tema = tema.name
            },
            add_binding_ref: function(ref) {
                document.getElementById('edit-ref-autor').dataset.id = ref.id
                document.getElementById('edit-ref-titulo').dataset.id = ref.id
                document.getElementById('edit-ref-anio').dataset.id = ref.id
                this.select_ref(ref)
                this.edit_ref_autor = ref.author
                this.edit_ref_anio = ref.year
                this.edit_ref_titulo = ref.title
            },
            actualizar_tema: function(tema) {
                var tema_id = document.getElementById('edit-tema').dataset.id
                var tema_filtered = this.temas.filter(function(elemento){
                    return tema.id == elemento.id
                })[0]
                tema_filtered.name = this.edit_tema
                this.edit_tema = ''
                this.cancelar_actualizar()
            },
            cancelar_actualizar: function() {
                this.select_tema(this.tema_selected)
                this.tema_selected = {}
            },
            add_ref_bibliografica: function() {
                if (this.new_ref_autor != "" &&
                    this.new_ref_anio != "" &&
                    this.new_ref_anio > 1900 &&
                    this.new_ref_anio < 2016 &&
                    this.new_ref_titulo != ""
                    ) {
                    this.ref_bibliografica.push({
                        id: ++this.last_ref_id,
                        author: this.new_ref_autor,
                        year: this.new_ref_anio,
                        title: this.new_ref_titulo,
                    })
                    this.new_ref_autor = ''
                    this.new_ref_anio = ''
                    this.new_ref_titulo = ''
                    document.getElementById('new_ref_autor').focus();
                } else {
                    alert("Ingrese campos validos")
                }
            },
            delete_ref_bibliografica: function(ref) {
                this.ref_bibliografica.forEach(function(elemento, index, array){
                    if (elemento.id == ref.id)
                        array.splice(index, 1)
                })
            }
        },

        watch: {
            semana_selected: function(newValue)
            {
                if (newValue.id == undefined)
                    this.tema_title = ''
                else
                    this.tema_title = 'Temas - ' + this.unidad_selected.name + ' - ' + this.semana_selected.name
            }
        },

        ready: function()
        {
            this.unidades = [
                {
                    id: 1,
                    name: "Unidad 1",
                },
                {
                    id: 2,
                    name: "Unidad 2",
                },
            ]

            var semanas = [
                {
                    id: 1,
                    name: "Semana 1",
                    unidad_id: 1,
                },
                {
                    id: 2,
                    name: "Semana 2",
                    unidad_id: 1,
                },
                {
                    id: 3,
                    name: "Semana 3",
                    unidad_id: 1,
                },
                {
                    id: 4,
                    name: "Semana 4",
                    unidad_id: 1,
                },
            ]
            this.semanas = semanas

            var temas = [
                {
                    id: 1,
                    name: 'Introduccion a la Programacion',
                    semana_id: 1,
                },
                {
                    id: 2,
                    name: 'Variables',
                    semana_id: 1,
                },
            ]
            this.temas = temas

            var refs = [
                {
                    id: 1,
                    author: 'Cesar Vallejo',
                    year: '1980',
                    title: 'Trilce',
                },
                {
                    id: 2,
                    author: 'Dan Brown',
                    year: '2013',
                    title: 'Inferno',
                },
            ]
            this.ref_bibliografica = refs

            this.last_unidad_id += this.unidades.length
            this.last_semana_id += semanas.length
            this.last_tema_id += temas.length
            this.last_ref_id += refs.length
        }
    });
</script>
@endsection
