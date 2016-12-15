@extends('layouts.admin')

@section('content')

    @include('admin.helpers.show_errors')

    <div class="row" id="app">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
            @if ($institucion)
                <h3>{{ $institucion->siglas }} - Registrar Sede</h3>
            @else
                <h3>Registrar Sede</h3>
            @endif
            </div>
            <form class="form form-horizontal" method="POST">
            {{ csrf_field() }}
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">Nombre</label>
                    <div class="col-sm-9 col-lg-6">
                        <input type="text" class="form-control" name="nombre">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">Direccion</label>
                    <div class="col-sm-9 col-lg-6">
                        <input type="text" class="form-control" name="direccion">
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

            @if (is_null($institucion))
                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">Institucion</label>
                    <div class="col-sm-6">
                        <select class="form-control" v-model="institucion_selected" name="institucion_id">
                            <option value="">Seleccione la institucion</option>
                        @foreach($instituciones as $institucion)
                            <option value="{{ $institucion->id }}">{{ $institucion->nombre }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            @else
                <input type="hidden" name="institucion_id" value="{{ $institucion->id }}">
            @endif
            </div>


            <div class="panel-footer text-center">
                <button class="btn btn-primary">Agregar</button>
            </div>

            </form>
        </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin/sede/create.js') }}"></script>
@endpush
