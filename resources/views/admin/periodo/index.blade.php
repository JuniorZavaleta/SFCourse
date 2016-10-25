@extends('layouts.admin')

@section('content')

    @include('admin.helpers.show_message')

    <div class="row" id="app">
        <div class="panel panel-info">
            <div class="panel-heading text-center">

                <h3>{{ $facultad->nombre }} - Periodos</h3>
                <a type="button" class="btn btn-success btn-header" title="Agregar Periodo" href="{{ route('facultades.periodos.create', ['facultad' => $facultad->id]) }}">
                  <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                </a>

                <a type="button" class="btn btn-info btn-header" v-bind:href="url_edit" v-show="periodo_selected" title="Editar" transition="btn-header" >
                  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>
                <a type="button" class="btn btn-danger btn-header"  v-bind:href="url_delete" v-show="periodo_selected" title="Eliminar" @click="delete_periodo" transition="btn-header">
                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
                <form id="delete-periodo-form" v-bind:action="url_delete" method="POST" hidden>
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="panel-body">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <table class="table">
                        <thead>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                        </thead>
                        <tbody>
                            @foreach($periodos as $periodo)
                            <tr id="periodo_{{ $periodo->id }}" class="row-hover" v-on:click="select_row('{{ $periodo->id }}')">
                                <td>{{ $periodo->nombre }}</td>
                                <td>{{ $periodo->tipo_periodo->nombre }}</td>
                                <td>{{ $periodo->fecha_inicio }}</td>
                                <td>{{ $periodo->fecha_fin }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="paginator-container text-center">
                {{ $periodos->links() }}
            </div>
        </div>
    </div>

    @if ($facultad)
    <div class="row text-center">
        <a class="btn btn-default">Ver todos los periodos</a>
    </div>
    <input type="hidden" id="facultad_id" value="{{ $facultad->id }}">
    @endif
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin/periodo/index.js') }}"></script>
@endpush