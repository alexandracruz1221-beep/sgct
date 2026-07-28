<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('necesidad_detalles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('necesidad_id')->constrained('necesidades');
            $table->foreignId('material_id')->nullable()->constrained('materiales')->nullOnDelete();
            $table->string('descripcion_material');
            $table->decimal('cantidad_solicitada', 12, 2);
            $table->decimal('cantidad_aprobada', 12, 2)->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('necesidad_detalles');
    }
};
