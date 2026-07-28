<?php

namespace App\Http\Controllers;

use App\Models\CentroEducativo;
use App\Models\Material;
use App\Models\Necesidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $centros = Schema::hasTable('centro_educativos') ? CentroEducativo::count() : 0;
            $materiales = Schema::hasTable('materiales') ? Material::count() : 0;
            $necesidades = Schema::hasTable('necesidades') ? Necesidad::count() : 0;
        } catch (QueryException $e) {
            // If the database is not ready or a table is missing, return zeros instead of crashing
            $centros = 0;
            $materiales = 0;
            $necesidades = 0;
        }

        return view('dashboard', compact('centros', 'materiales', 'necesidades'));
    }
}
