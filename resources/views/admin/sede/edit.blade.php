@extends('layouts.admin')

@section('content')

    @include('admin.helpers.show_errors')

    <div class="row" id="app">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                <h3>{{ $institucion->siglas }} - Editar Sede</h3>
            </div>
            <form class="form form-horizontal" method="POST">
            {{ csrf_field() }}
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">Nombre</label>
                    <div class="col-sm-9 col-lg-6">
                        <input type="text" class="form-control" name="nombre" value="{{ $sede->nombre }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">Direccion</label>
                    <div class="col-sm-9 col-lg-6">
                        <input type="text" class="form-control" name="direccion" value="{{ $sede->direccion }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">Departamento</label>
                    <div class="col-sm-6">
                        <select class="form-control" v-model="departamento_selected">
                            <option value="">Seleccione el departamento</option>
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">Provincia</label>
                    <div class="col-sm-6">
                        <select class="form-control" v-model="provincia_selected">
                            <option value="">Seleccione la provincia</option>
                            <option v-for="provincia in provincias" value="@{{ provincia.id }}">@{{ provincia.nombre }}</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">Distrito</label>
                    <div class="col-sm-6">
                        <select class="form-control" v-model="distrito_selected" name="distrito_id">
                            <option value="" selected>Seleccione el distrito</option>
                            <option v-for="distrito in distritos" value="@{{ distrito.id }}">@{{ distrito.nombre }}</option>
                        </select>
                    </div>
                </div>

            </div>


            <div class="panel-footer text-center">
                <button class="btn btn-primary">Actualizar</button>
            </div>

            <input type="hidden" name="institucion_id" id="institucion_id" value="{{ $sede->institucion_id }}">
            </form>
        </div>
    </div>

    <input type="hidden" id="departamento" value="{{ $sede->departamento_id }}">
    <input type="hidden" id="provincia" value="{{ $sede->provincia_id }}">
    <input type="hidden" id="distrito" value="{{ $sede->distrito_id }}">
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin/sede/edit.js') }}"></script>
@endpush
