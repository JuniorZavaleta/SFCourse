@extends('layouts.admin')

@section('content')

    @include('admin.helpers.show_message')

    <div class="row" id="app">
        <div class="panel panel-info">
            <div class="panel-heading text-center">

            @if ($institucion)

                <h3>{{ $institucion->siglas }} - Sedes</h3>
                <a type="button" class="btn btn-success btn-header" title="Agregar Sede" href="{{ route('sedes.create', ['institucion' => $institucion->id]) }}">
                  <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                </a>

            @else

                <h3>Sedes</h3>
                <a type="button" class="btn btn-success btn-header" title="Agregar Sede" href="{{ route('sedes.create') }}">
                  <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                </a>

            @endif

                 <a type="button" class="btn btn-info btn-header" v-bind:href="url_edit" v-show="sede_selected" title="Editar" transition="btn-header" >
                  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>

                <a type="button" class="btn btn-danger btn-header"  v-bind:href="url_delete" v-show="sede_selected" title="Eliminar" @click="delete_sede" transition="btn-header">
                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>

                <a type="button" class="btn btn-warning btn-header" v-bind:href="url_facultades" v-show="sede_selected" title="Asignar Facultades" transition="btn-header">
                    <i class="fa fa-university" aria-hidden="true"></i>
                </a>

                <form id="delete-sede-form" v-bind:action="url_delete" method="POST" hidden>
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="panel-body">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <table class="table">
                        <thead>
                            <th>Nombre</th>
                            <th>Institucion</th>
                            <th>Distrito</th>
                        </thead>
                        <tbody>
                            @foreach($sedes as $sede)
                            <tr id="sede_{{ $sede->id }}" class="row-hover" v-on:click="select_row('{{ $sede->id }}')">
                                <td>{{ $sede->nombre }}</td>
                                <td>{{ $sede->institucion_siglas }}</td>
                                <td>{{ $sede->distrito_nombre }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="paginator-container text-center">
                {{ $sedes->links() }}
            </div>
        </div>
    </div>

    @if ($institucion)
    <div class="row text-center">
        <a href="{{ route('sedes.index') }}" class="btn btn-default">Ver todas las sedes</a>
    </div>
    <input type="hidden" id="institucion_id" value="{{ $institucion->id }}">
    @endif
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin/sede/index.js') }}"></script>
@endpush