<aside class="hidden sm:block w-64 bg-white border-r border-gray-200 h-screen sticky top-0">
    <div class="p-4">
        <nav class="space-y-2">
            <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">Inicio</a>

            <div class="text-xs text-gray-500 px-3">Centros educativos</div>
            <a href="{{ route('centros.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100">Centros</a>

            <div class="text-xs text-gray-500 px-3 mt-3">Personal</div>
            <a href="{{ route('personal.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100">Personas</a>

            <div class="text-xs text-gray-500 px-3 mt-3">Proveedores</div>
            <a href="{{ route('proveedores.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100">Proveedores</a>

            <div class="text-xs text-gray-500 px-3 mt-3">Inventario</div>
            <a href="{{ route('materiales.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100">Materiales</a>
            <a href="{{ route('inventarios.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100">Existencias</a>

            <div class="text-xs text-gray-500 px-3 mt-3">Necesidades</div>
            <a href="{{ route('necesidades.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100">Necesidades</a>

            <div class="text-xs text-gray-500 px-3 mt-3">Cotizaciones</div>
            <a href="{{ route('cotizaciones.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100">Cotizaciones</a>

            <div class="text-xs text-gray-500 px-3 mt-3">Reportes</div>
            <a href="{{ route('reportes.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100">Reportes</a>

            @if(Auth::user()->isRole('admin'))
                <div class="mt-4 border-t pt-3">
                    <div class="text-xs text-gray-500 px-3">Administración</div>
                    <a href="{{ route('users.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100">Usuarios</a>
                    <a href="{{ route('roles.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100">Roles</a>
                    <a href="{{ route('admin.tipos-centro.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100">Tipos de centro</a>
                    <a href="{{ route('admin.especialidades.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100">Especialidades</a>
                    <a href="{{ route('admin.categorias-materiales.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100">Categorías material</a>
                    <a href="{{ route('admin.unidades-medida.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100">Unidades de medida</a>
                    <a href="{{ route('admin.configuracion.index') }}" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-gray-100">Configuración</a>
                </div>
            @endif
        </nav>
    </div>
</aside>
