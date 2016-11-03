<h1>Incidentes provenientes de {{ $pais }}</h1>
<table>
    <thead>
        <th>Direccion IP</th>
        <th>Fecha de registro</th>
    </thead>
    <tbody>
        @foreach($incidentes as $incidente)
        <tr>
            <td>{{ $incidente->direccion_ip }}</td>
            <td>{{ $incidente->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>