<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movimientos_inventario', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->foreignId('material_id')->constrained('materiales');
            $table->foreignId('inventario_origen_id')->nullable()->constrained('inventarios')->nullOnDelete();
            $table->foreignId('inventario_destino_id')->nullable()->constrained('inventarios')->nullOnDelete();
            $table->foreignId('centro_origen_id')->nullable()->constrained('centro_educativos')->nullOnDelete();
            $table->foreignId('centro_destino_id')->nullable()->constrained('centro_educativos')->nullOnDelete();
            $table->enum('tipo_movimiento', ['entrada', 'salida', 'traslado', 'ajuste', 'baja']);
            $table->decimal('cantidad', 12, 2);
            $table->date('fecha_movimiento');
            $table->text('motivo');
            $table->string('referencia_documento')->nullable();
            $table->string('responsable');
            $table->text('observaciones')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movimientos_inventario');
    }
};
