<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('role:admin')->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
    });

    Route::middleware('role:admin|coordinador')->group(function () {
        Route::get('/centros', function () {
            $centros = \App\Models\CentroEducativo::orderBy('id','desc')->take(10)->get();
            return view('modules.centros.index', compact('centros'));
        })->name('centros.index');

        Route::get('/inventarios', function () {
            return view('modules.inventarios.index');
        })->name('inventarios.index');
        
        Route::get('/personal', function () {
            $personas = \App\Models\Persona::orderBy('id','desc')->take(15)->get();
            return view('modules.personal.index', compact('personas'));
        })->name('personal.index');

        Route::get('/proveedores', function () {
            $proveedores = \App\Models\Proveedor::orderBy('id','desc')->take(12)->get();
            return view('modules.proveedores.index', compact('proveedores'));
        })->name('proveedores.index');

        Route::get('/materiales', function () {
            $materiales = \App\Models\Material::with('categoriaMaterial','unidadMedida')->orderBy('id','desc')->take(20)->get();
            return view('modules.materiales.index', compact('materiales'));
        })->name('materiales.index');

        Route::get('/necesidades', function () {
            $necesidades = \App\Models\Necesidad::with('centroEducativo')->orderBy('id','desc')->take(15)->get();
            return view('modules.necesidades.index', compact('necesidades'));
        })->name('necesidades.index');

        Route::get('/cotizaciones', function () {
            $cotizaciones = \App\Models\Cotizacion::with('proveedor')->orderBy('id','desc')->take(12)->get();
            return view('modules.cotizaciones.index', compact('cotizaciones'));
        })->name('cotizaciones.index');

        Route::get('/reportes', function () {
            return view('modules.reportes.index');
        })->name('reportes.index');
    });

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/tipos-centro', function () { return view('admin.tipos-centro.index'); })->name('admin.tipos-centro.index');
        Route::get('/admin/especialidades', function () { return view('admin.especialidades.index'); })->name('admin.especialidades.index');
        Route::get('/admin/categorias-materiales', function () { return view('admin.categorias-materiales.index'); })->name('admin.categorias-materiales.index');
        Route::get('/admin/unidades-medida', function () { return view('admin.unidades-medida.index'); })->name('admin.unidades-medida.index');
        Route::get('/admin/configuracion', function () { return view('admin.configuracion.index'); })->name('admin.configuracion.index');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';
