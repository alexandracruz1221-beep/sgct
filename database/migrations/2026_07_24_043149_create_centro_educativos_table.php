<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('centro_educativos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('nombre');
            $table->foreignId('tipo_centro_id')->constrained('tipo_centros');
            $table->string('departamento');
            $table->string('municipio');
            $table->string('aldea_o_barrio')->nullable();
            $table->text('direccion');
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('nombre_responsable');
            $table->string('telefono_responsable')->nullable();
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
        Schema::dropIfExists('centro_educativos');
    }
};
