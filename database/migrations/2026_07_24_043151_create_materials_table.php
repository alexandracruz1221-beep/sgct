<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->foreignId('categoria_material_id')->constrained('categorias_materiales');
            $table->foreignId('unidad_medida_id')->constrained('unidades_medida');
            $table->boolean('requiere_vencimiento')->default(false);
            $table->decimal('stock_minimo', 12, 2)->default(0);
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materiales');
    }
};
