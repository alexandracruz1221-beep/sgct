<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('identidad')->unique()->nullable();
            $table->string('telefono');
            $table->string('correo')->nullable();
            $table->text('direccion')->nullable();
            $table->enum('tipo_personal', ['docente', 'instructor', 'tecnico', 'mano_obra', 'administrativo']);
            $table->foreignId('especialidad_id')->nullable()->constrained('especialidades')->nullOnDelete();
            $table->enum('disponibilidad', ['disponible', 'asignado', 'inactivo'])->default('disponible');
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->text('observaciones')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
