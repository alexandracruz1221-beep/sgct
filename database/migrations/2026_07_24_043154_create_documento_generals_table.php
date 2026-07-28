<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documentos_generales', function (Blueprint $table) {
            $table->id();
            $table->string('entidad_tipo');
            $table->unsignedBigInteger('entidad_id');
            $table->string('nombre_documento');
            $table->string('archivo');
            $table->string('tipo_archivo');
            $table->text('observaciones')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->index(['entidad_tipo', 'entidad_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documentos_generales');
    }
};
