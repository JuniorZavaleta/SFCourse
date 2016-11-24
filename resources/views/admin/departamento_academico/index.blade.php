@extends('layouts.admin')

@section('content')

    @include('admin.helpers.show_message')

    <div class="row" id="app">
        <div class="panel panel-info">
            <div class="panel-heading text-center">

                <h3>{{ $facultad->nombre }} - Departamentos Academicos</h3>
                <a type="button" class="btn btn-success btn-header" title="Agregar Departamento Academico" href="{{ route('facultades.departamentos.create', ['facultad' => $facultad->id]) }}">
                  <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                </a>

                <a type="button" class="btn btn-info btn-header" v-bind:href="url_edit" v-show="departamento_selected" title="Editar" transition="btn-header" >
                  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>
                <a type="button" class="btn btn-danger btn-header"  v-bind:href="url_delete" v-show="departamento_selected" title="Eliminar" @click="delete_departamento" transition="btn-header">
                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
                <form id="delete-departamento-form" v-bind:action="url_delete" method="POST" hidden>
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="panel-body">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <table class="table">
                        <thead>
                            <th>Nombre</th>
                        </thead>
                        <tbody>
                            @foreach($departamentos as $departamento)
                            <tr id="departamento_{{ $departamento->id }}" class="row-hover" v-on:click="select_row('{{ $departamento->id }}')">
                                <td>{{ $departamento->nombre }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <input type="hidden" id="facultad_id" value="{{ $facultad->id }}">
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin/departamento_academico/index.js') }}"></script>
@endpush