@extends('layouts.admin')

@section('content')

    @include('admin.helpers.show_message')
    <div id="app">
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-heading text-center">

                    <h3>{{ $asignatura->nombre }} - Evaluaciones</h3>
                     @if($usuario->es_docente)
                    <a type="button" class="btn btn-success btn-header" title="Agregar Evaluacion" href="{{ route('grupos.evaluaciones.create', ['grupo' => $grupo->id]) }}">
                      <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                    </a>

                    <a type="button" class="btn btn-info btn-header" v-bind:href="url_edit" v-show="evaluacion_selected" title="Editar" transition="btn-header" >
                      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    <a type="button" class="btn btn-danger btn-header"  v-bind:href="url_delete" v-show="evaluacion_selected" title="Eliminar" @click="delete_evaluacion" transition="btn-header">
                      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>
                    @endif
                    <a type="button" class="btn btn-info btn-header"  v-bind:href="url_scores" v-show="evaluacion_selected" title="Resultados" transition="btn-header">
                      <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    </a>
                    <form id="delete-evaluacion-form" v-bind:action="url_delete" method="POST" hidden>
                        {{ csrf_field() }}
                    </form>
                </div>
                <div class="panel-body panel-no-mobile">
                    <div class="col-sm-12 col-md-10 col-md-offset-1">
                        <table class="table">
                            <thead>
                                <th>Tipo</th>
                                <th>Fecha</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                                <th>Peso</th>
                            </thead>
                            <tbody>
                                @foreach($evaluaciones as $evaluacion)
                                <tr id="evaluacion_{{ $evaluacion->id }}"
                                    class="row-hover"
                                    v-on:click="select_row('{{ $evaluacion->id }}')"
                                >
                                    <td>{{ $evaluacion->tipo_evaluacion_nombre }}</td>
                                    <td>{{ $evaluacion->fecha->format('d/m/Y') }}</td>
                                    <td>{{ $evaluacion->hora_inicio }}</td>
                                    <td>{{ $evaluacion->hora_fin }}</td>
                                    <td>{{ $evaluacion->peso }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($evaluaciones as $evaluacion)
            <div class="panel panel-primary panel-mobile">
                <div class="panel-heading panel-clickable"
                     v-on:click="select_row('{{ $evaluacion->id }}')"
                     id="panel_{{ $evaluacion->id }}"
                >
                    <span>Tipo:</span><span class="float-right">{{ $evaluacion->tipo_evaluacion_nombre }}</span>
                </div>
                <div class="panel-body">
                    <p>Fecha:<span class="float-right">{{ $evaluacion->fecha->format('d/m/Y') }}</span></p>
                    <p>Hora Inicio:<span class="float-right">{{ $evaluacion->hora_inicio }}</span></p>
                    <p>Hora Fin:<span class="float-right">{{ $evaluacion->hora_fin }}</span></p>
                    <p>Peso:<span class="float-right">{{ $evaluacion->peso }}</span></p>
                </div>
            </div>
            @endforeach
        </div>

        <input type="hidden" id="grupo_id" value="{{ $grupo->id }}">
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin/evaluacion/index.js') }}"></script>
@endpush