<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('material_id')->constrained('materiales');
            $table->foreignId('centro_educativo_id')->nullable()->constrained('centro_educativos')->nullOnDelete();
            $table->enum('ubicacion_tipo', ['bodega_central', 'centro_educativo'])->default('bodega_central');
            $table->decimal('cantidad_disponible', 12, 2)->default(0);
            $table->date('fecha_vencimiento')->nullable();
            $table->string('lote')->nullable();
            $table->enum('estado', ['en_existencia', 'bajo_minimo', 'agotado', 'vencido', 'danado', 'dado_de_baja'])->default('en_existencia');
            $table->text('observaciones')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
