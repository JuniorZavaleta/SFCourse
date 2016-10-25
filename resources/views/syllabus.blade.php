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
        background: #fc0;
    }
    #unidades {
        margin-top: 15px;
        text-align: center;
    }
    #unidades .unidad {
        width: 50%;
        margin: 0 auto;
    }
    .unidad p {
        line-height: 40px;
        margin: 0px;
    }
    .unidad-selected p {
        background-color:  #d6dac6;
        color: #000;
    }
    .column {
        border-right: #fcf solid 2px;
    }
    .btn {
        border-radius: 0;
    }
</style>

<div class="col-lg-12" id="app">
    <div class="text-center">
        <h1>Registrar Syllabus del curso de Programacion I</h1>
    </div>
</div>

<div class="col-lg-12">

    <div class="col-lg-3 column">
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
                        <p>@{{ unidad.name }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-3 column">
        <div class="row">
            <div class="text-center">
                <h3>Semanas</h3>
            </div>
        </div>

        <div class="row">
            <div class="text-center">
                <h4>@{{ unidad_selected.name }}</h4>
                <div id="semanas">
                    <div class="clickable semana"
                         id="semana_@{{ semana.id }}"
                         v-for="semana in unidad_selected.semanas"
                         @click="select_semana(semana)"
                    >
                        <p>@{{ semana.name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="row">
            <div class="text-center">
                <h3>Temas - Unidad 1 - Semana 1</h3>
                <div id="temas">
                    <div class="clickable tema"
                         id="tema_@{{ tema.id }}"
                         v-for="tema in semana_selected.temas"
                    >
                        <p>@{{ tema.name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<script type="text/javascript">
    var vm = new Vue(
    {
        el: 'body',

        data: {
            unidades: [],
            unidad_selected: {},
            semana_selected: {},
            last_unidad_id: 0,
            last_semana_id: 0,
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
            },
            add_unidad: function() {
                var new_id = ++this.last_unidad_id
                this.unidades.push({
                    id: new_id,
                    name: 'Unidad ' + new_id
                })
            },
        },

        ready: function()
        {
            this.unidades = ['Unidad 1', 'Unidad 2', 'Unidad 3']

            this.unidades = [
                {
                    id: 1,
                    name: "Unidad 1",
                    semanas : [
                    ],
                },
                {
                    id: 2,
                    name: "Unidad 2",
                    semanas : [
                    ],
                },
            ]
            this.last_unidad_id += 2

            var semanas = [
                {
                    id: 1,
                    name: "Semana 1",
                    temas: [
                        {
                            id: 1,
                            name: 'Introduccion a la Programacion',
                        }
                    ],
                },
                {
                    id: 2,
                    name: "Semana 2",
                },
                {
                    id: 3,
                    name: "Semana 3",
                },
                {
                    id: 4,
                    name: "Semana 4",
                },
            ]

            this.unidades[0].semanas = semanas
            //this.unidad_selected = this.unidades[0]
        }
    });
</script>
@endsection