@extends('layouts.admin')

@section('content')

    @include('admin.helpers.show_errors')

    <div class="row" id="app">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                <h3 class="text-center">{{ $periodo->nombre }} - Editar Periodo Academico</h3>
            </div>
            <form class="form form-horizontal" method="POST">
            {{ csrf_field() }}
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">Nombre</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nombre" value="{{ $periodo->nombre }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">Fecha de Inicio</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="fecha_inicio" value="{{$periodo->fecha_inicio}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">Fecha de Fin</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="fecha_fin" value="{{$periodo->fecha_fin}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label text-left">Tipo de Periodo</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="tipo_id">
                           <option value="" >Seleccione el tipo de Periodo</option>
                        @foreach($tipos_periodo as $tipo_periodo)
                            <option value="{{$tipo_periodo->id}}" {{($tipo_periodo->id == $periodo->tipo_id)? 'selected':''}}>{{$tipo_periodo->nombre}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-primary">Actualizar</button>
            </div>

            <input type="hidden" name="facultad_id" id="facultad_id" value="{{ $facultad->id }}">
            </form>
        </div>
    </div>

@endsection