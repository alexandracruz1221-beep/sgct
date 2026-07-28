<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Roles</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Listado de roles</h3>
                        <p class="text-sm text-gray-600">Administración de permisos y perfiles del sistema.</p>
                    </div>
                    <a href="{{ route('roles.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md">Crear rol</a>
                </div>

                <div class="mt-6 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left">Nombre</th>
                                <th class="px-4 py-2 text-left">Clave</th>
                                <th class="px-4 py-2 text-left">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($roles as $role)
                                <tr>
                                    <td class="px-4 py-2">{{ $role->nombre }}</td>
                                    <td class="px-4 py-2">{{ $role->key }}</td>
                                    <td class="px-4 py-2">{{ $role->estado }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
