@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Reportes</h1>

        <p class="text-sm text-gray-600 mb-4">Seleccione un reporte y aplique filtros. Utilice el botón "Exportar a Excel" para descargar los resultados.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="#" class="block p-4 bg-white shadow rounded hover:shadow-md">Centros educativos</a>
            <a href="#" class="block p-4 bg-white shadow rounded hover:shadow-md">Personal</a>
            <a href="#" class="block p-4 bg-white shadow rounded hover:shadow-md">Proveedores</a>
            <a href="#" class="block p-4 bg-white shadow rounded hover:shadow-md">Inventario</a>
            <a href="#" class="block p-4 bg-white shadow rounded hover:shadow-md">Necesidades</a>
            <a href="#" class="block p-4 bg-white shadow rounded hover:shadow-md">Cotizaciones</a>
        </div>
    </div>
@endsection
