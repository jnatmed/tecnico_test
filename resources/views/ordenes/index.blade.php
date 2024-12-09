<!DOCTYPE html>
<html lang="es">
<head>
    @include('parts.head') {{-- Incluir el archivo 'parts/head.blade.php' --}}
    <link rel="stylesheet" href="/assets/css/tooltips.css">
</head>
<body class="home">
    @include('parts.header') {{-- Incluir el archivo 'parts/header.blade.php' --}}

    <div class="orden-container">
        <h1>Órdenes de Trabajo</h1>
        <table class="orden-table">
            <thead>
                <tr>
                    <th>Número de Orden</th>
                    <th>Tipo de Servicio</th>
                    <th>Fecha de Emisión</th>
                    <th>División</th>
                    <th>Sección</th>
                    <th>Estado</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    <th>Descargar</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ordenes as $orden)
                    <tr>
                        <td class="tipo-nro-lista">{{ $orden->id }}</td>
                        <td>{{ $orden->tipoServicio }}</td>
                        <td>{{ $orden->fechaEmision }}</td>
                        <td>{{ ucfirst($orden->division) }}</td>
                        <td>{{ ucfirst($orden->seccion) }}</td>
                        <td>{{ $orden->estadoOrden->descripcion_estado ?? 'Estado desconocido' }}</td>
                        <td>
                            <a href="{{ url('/orden-de-trabajo/ver', ['id' => $orden->id]) }}">Ver</a>
                        </td>
                        <td>
                            <a href="{{ url('/orden-de-trabajo/editar', ['id' => $orden->id]) }}">Editar</a>
                        </td>
                        <td>
                            <a href="{{ url('/orden-de-trabajo/eliminar', ['id' => $orden->id]) }}">Eliminar</a>
                        </td>
                        <td>
                            @if (empty($orden->pathOrden))
                                No hay Archivo
                            @else
                                <a href="{{ url('/orden-de-trabajo/descargar', ['id' => $orden->id]) }}">Descargar</a>
                            @endif
                        </td>
                        <td>
                            @switch($orden->estado_orden_id)
                                @case(1)
                                    <a href="{{ url('/orden-de-trabajo/actualizar_estado', ['id' => $orden->id, 'estado' => 2]) }}">Aceptar</a>
                                    <a href="{{ url('/orden-de-trabajo/editar', ['id' => $orden->id, 'estado' => 3]) }}" class="tooltip">
                                        Rechazar
                                        <span class="tooltiptext">Para rechazar una orden, describa el motivo del rechazo.</span>
                                    </a>
                                    @break
                                @case(2)
                                    <a href="{{ url('/orden-de-trabajo/actualizar_estado', ['id' => $orden->id, 'estado' => 4]) }}" class="tooltip">
                                        Finalizar
                                        <span class="tooltiptext">Para finalizar una orden, describa los trabajos realizados.</span>
                                    </a>
                                    @break
                                @case(3)
                                @case(4)
                                    ----
                                    @break
                            @endswitch
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="orden-message">No hay órdenes de trabajo para mostrar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @include('parts.footer') {{-- Incluir el archivo 'parts/footer.blade.php' --}}
</body>
</html>
