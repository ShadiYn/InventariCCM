@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $personal->nombre }} {{ $personal->apellido1 }} {{ $personal->apellido2 }}</h1>
    <p><strong>Correo:</strong> {{ $personal->correo }}</p>
    <p><strong>Área:</strong> {{ $personal->area }}</p>
    <p><strong>Departamento:</strong> {{ $personal->departamento }}</p>

    <h2>Bajas</h2>
    <ul>
        @foreach($personal->bajas as $baja)
            <li>
                <strong>Fecha:</strong> {{ $baja->fecha_baja }} <br>
                <strong>Motivo:</strong> {{ $baja->motivo }} <br>
                <strong>Certificado:</strong> {{ $baja->baja_certificado ? 'Sí' : 'No' }}
            </li>
        @endforeach
    </ul>
</div>
@endsection
