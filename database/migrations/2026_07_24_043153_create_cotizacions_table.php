<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->foreignId('necesidad_id')->constrained('necesidades');
            $table->foreignId('proveedor_id')->constrained('proveedores');
            $table->date('fecha_cotizacion');
            $table->date('fecha_vencimiento')->nullable();
            $table->decimal('subtotal', 12, 2);
            $table->decimal('impuesto', 12, 2)->default(0);
            $table->decimal('total', 12, 2);
            $table->enum('estado', ['pendiente', 'aprobada', 'rechazada', 'vencida'])->default('pendiente');
            $table->string('archivo_cotizacion')->nullable();
            $table->text('observaciones')->nullable();
            $table->foreignId('aprobado_por')->nullable()->constrained('users')->nullOnDelete();
            $table->date('fecha_aprobacion')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cotizaciones');
    }
};
