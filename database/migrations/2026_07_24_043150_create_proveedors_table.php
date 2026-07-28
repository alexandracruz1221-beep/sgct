<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->enum('tipo_proveedor', ['persona_natural', 'empresa']);
            $table->string('nombre_comercial');
            $table->string('razon_social')->nullable();
            $table->string('rtn')->unique();
            $table->string('nombre_contacto')->nullable();
            $table->string('telefono');
            $table->string('telefono_secundario')->nullable();
            $table->string('correo')->nullable();
            $table->string('departamento')->nullable();
            $table->string('municipio')->nullable();
            $table->text('direccion')->nullable();
            $table->string('rubro');
            $table->enum('estado_rtn', ['pendiente', 'validado', 'no_validado'])->default('pendiente');
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
        Schema::dropIfExists('proveedores');
    }
};
