@extends('layouts.admin')

@section('content')

    @include('admin.helpers.show_message')

    <div class="row" id="app">
        <div class="panel panel-info">
            <div class="panel-heading text-center">

            @if ($departamento_academico)

                <h3>{{ $departamento_academico->nombre }} - Docentes</h3>
            @endif
                <a type="button" class="btn btn-danger btn-header"  v-bind:href="url_remove" v-show="docente_selected" title="Remover del Departamento" @click="remove_docente" transition="btn-header">
                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
                <form id="remove-docente-form" v-bind:action="url_remove" method="POST" hidden>
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="panel-body">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                        </thead>
                        <tbody>
                            @foreach($docentes as $docente)
                            <tr id="docente_{{ $docente->id }}" class="row-hover" v-on:click="select_row('{{ $docente->id }}')">
                                <td>{{ $docente->id }}</td>
                                <td>{{ $docente->user->nombres.' '.$docente->user->apellidos }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <input type="hidden" id="departamento_academico_id" value="{{ $departamento_academico->id }}">
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin/docente/index.js') }}"></script>
@endpush