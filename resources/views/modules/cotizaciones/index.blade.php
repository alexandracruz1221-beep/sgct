@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Cotizaciones</h1>

        <div class="mb-4">
            <a href="#" class="inline-block px-4 py-2 bg-green-600 text-white rounded">Crear cotización</a>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Necesidad</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Proveedor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($cotizaciones ?? [] as $c)
                        <tr>
                            <td class="px-6 py-4">{{ $c->codigo }}</td>
                            <td class="px-6 py-4">{{ $c->necesidad_id ? 'NEC-' . str_pad($c->necesidad_id,4,'0',STR_PAD_LEFT) : '-' }}</td>
                            <td class="px-6 py-4">{{ $c->proveedor?->nombre_comercial }}</td>
                            <td class="px-6 py-4">{{ number_format($c->total,2) }}</td>
                            <td class="px-6 py-4 text-right"><a href="#" class="text-blue-600">Ver</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-6 py-4 text-center text-gray-500">No hay cotizaciones registradas.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
