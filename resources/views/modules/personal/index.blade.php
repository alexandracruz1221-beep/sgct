@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Personal</h1>

        <div class="mb-4">
            <a href="#" class="inline-block px-4 py-2 bg-green-600 text-white rounded">Crear persona</a>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombres</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Disponibilidad</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($personas ?? [] as $persona)
                        <tr>
                            <td class="px-6 py-4">{{ $persona->codigo }}</td>
                            <td class="px-6 py-4">{{ $persona->nombres }} {{ $persona->apellidos }}</td>
                            <td class="px-6 py-4">{{ $persona->tipo_personal }}</td>
                            <td class="px-6 py-4">{{ $persona->disponibilidad }}</td>
                            <td class="px-6 py-4 text-right"><a href="#" class="text-blue-600">Ver</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-6 py-4 text-center text-gray-500">No hay personas registradas.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
