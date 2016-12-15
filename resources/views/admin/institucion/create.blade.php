@extends('layouts.admin')

@section('content')

    @include('admin.helpers.show_errors')

    <div class="row" id="app">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                <h3>Registrar Institucion</h3>
            </div>
            <form class="form form-horizontal" method="POST">
            {{ csrf_field() }}
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">Nombre</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nombre">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">Siglas</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="siglas">
                    </div>
                </div>
            </div>
            <div class="panel-footer text-center">
                <button class="btn btn-primary">Agregar</button>
            </div>

            </form>
        </div>
    </div>

@endsection
