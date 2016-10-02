@extends('layouts.admin')

@section('content')

    @include('admin.helpers.show_message')

    <div class="row" id="app">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                <h3>{{ $institucion->siglas }} - Facultades</h3>
                <a type="button" class="btn btn-success btn-header" title="Agregar Facultad" href="{{ route('instituciones.facultades.create', ['institucion' => $institucion->id]) }}">
                  <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                </a>
                <a type="button" class="btn btn-info btn-header" v-bind:href="url_edit" v-show="facultad_selected" title="Editar" transition="btn-header" >
                  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>
                <a type="button" class="btn btn-danger btn-header"  v-bind:href="url_delete" v-show="facultad_selected" title="Eliminar" @click="delete_facultad" transition="btn-header">
                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
                <form id="delete-facultad-form" v-bind:action="url_delete" method="POST" hidden>
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="panel-body">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <table class="table">
                        <thead>
                            <th>Nombre</th>
                            <th>Codigo</th>
                        </thead>
                        <tbody>
                            @foreach($facultades as $facultad)
                            <tr id="facultad_{{ $facultad->id }}" class="row-hover" v-on:click="select_row('{{ $facultad->id }}')">
                                <td>{{ $facultad->nombre }}</td>
                                <td>{{ $facultad->codigo }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <a class="btn btn-info" href="{{ route('instituciones.index') }}" title="Regresar a instituciones">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
    </div>

    <input type="hidden" id="institucion_id" value="{{ $institucion->id }}">
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin/institucion/facultad/index.js') }}"></script>
@endpush