@extends('layouts.admin')

@section('content')

    @include('admin.helpers.show_message')

    <style type="text/css">
        .field-filter { width: 100%; display: inline-block; }
        .field-filter:last-child { vertical-align: text-bottom; }
        @media (min-width: 544px) {
            .field-filter { width: 45%; }
        }
        @media (min-width: 768px) {
            .field-filter { width: 40%; }
        }
        @media (min-width: 992px) {
            .field-filter { width: 23%; }
        }
    </style>

    <div class="row" id="app">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                <h3>Incidentes</h3>
                <a type="button" class="btn btn-info btn-header" v-bind:href="url_show" v-show="incidente_selected" title="Mostrar detalles" transition="btn-header" >
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </a>
                <a type="button" class="btn btn-default btn-header" title="Filtrar por pais" transition="btn-header" >
                    <i class="fa fa-filter" aria-hidden="true"></i>
                </a>
            </div>
            <div class="panel-heading text-center">
                <form action="{{ route('incidente.filter') }}" method="GET">
                <div>
                    <div class="field-filter">
                        <label class="control-label">Pais</label>
                        <select name="pais" class="form-control">
                        @foreach($paises as $pais)
                            <option value="{{ $pais }}">{{ $pais }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="field-filter">
                        <label class="control-label">Fecha Inicio</label>
                        <input type="date" name="fecha_inicio" class="form-control" value="{{ $fecha_inicio->format('Y-m-d') }}">
                    </div>
                    <div class="field-filter">
                        <label class="control-label">Fecha Fin</label>
                        <input type="date" name="fecha_fin" class="form-control" value="{{ $fecha_fin->format('Y-m-d') }}">
                    </div>
                    <div class="field-filter">
                        <button class="btn btn-default">Filtrar</button>
                    </div>
                </div>
                </form>
            </div>
            <div class="panel-body">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <table class="table">
                        <thead>
                            <th>IP</th>
                            <th>Pais</th>
                            <th>Region</th>
                            <th>Ciudad</th>
                            <th>Fecha y Hora de registro</th>
                        </thead>
                        <tbody>
                            @foreach($incidentes as $incidente)
                            <tr id="incidente_{{ $incidente->id }}" class="row-hover" v-on:click="select_row('{{ $incidente->id }}')">
                                <td>{{ $incidente->direccion_ip }}</td>
                                <td>{{ $incidente->pais_nombre }}</td>
                                <td>{{ $incidente->region_nombre }}</td>
                                <td>{{ $incidente->ciudad }}</td>
                                <td>{{ $incidente->created_at->format('d/m/Y H:i:s') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer text-center">
                @if (isset($pais_nombre) && $pais_nombre)
                <form action="{{ route('incidentes.reportes.byCountry', ['pais' => $pais_nombre]) }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-primary">Descargar reporte por pais</button>
                </form>
                @endif

                @if ( (isset($fecha_inicio) && $fecha_inicio) || (isset($fecha_fin) && $fecha_fin))
                <form action="{{ route('incidentes.reportes.betweenDates', ['fecha_inicio' => $fecha_inicio]) }}" method="POST">
                  {{ csrf_field() }}
                  <button class="btn btn-primary">Descargar reporte por fechas</button>
                </form>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin/incidente/index.js') }}"></script>
@endpush