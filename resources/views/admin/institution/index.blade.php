@extends('layouts.admin')

@section('content')

    @include('admin.helpers.show_message')

    <div class="row" id="app">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                <h3  style="display: inline-block;">Instituciones</h3>
                <button type="button" class="btn btn-success btn-header" title="Agregar">
                  <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-info btn-header" v-show="institution_selected" title="Editar">
                  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-danger btn-header" v-show="institution_selected" title="Eliminar">
                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </button>
            </div>
            <div class="panel-body">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <table class="table">
                        <thead>
                            <th>Nombre</th>
                            <th>Siglas</th>
                        </thead>
                        <tbody>
                            @foreach($institutions as $institution)
                            <tr id="institution_{{ $institution->id }}" class="row-hover" v-on:click="select_row('{{ $institution->id }}')">
                                <td>{{ $institution->nombre }}</td>
                                <td>{{ $institution->siglas }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="{{ route('institutions.create') }}" class="btn btn-success">Agregar</a>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin/institution/index.js') }}"></script>
@endpush