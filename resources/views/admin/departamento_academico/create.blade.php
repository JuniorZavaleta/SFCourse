@extends('layouts.admin')

@section('content')

    @include('admin.helpers.show_errors')

    <div class="row" id="app">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                <h3 class="text-center">{{ $facultad->nombre }} - Registrar Departamento academico</h3>
            </div>
            <form class="form form-horizontal" method="POST">
            {{ csrf_field() }}
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">Nombre</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nombre">
                    </div>
                </div>

            </div>
            <div class="panel-footer">
                <button class="btn btn-primary">Agregar</button>
            </div>
            <input type="hidden" id="facultad_id" name="facultad_id" value="{{ $facultad->id }}">
            </form>
        </div>
    </div>

@endsection