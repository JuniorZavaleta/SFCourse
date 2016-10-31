@foreach($incidentes as $incidente)
    <li>{{ $incidente->direccion_ip }}</li>
@endforeach