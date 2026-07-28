<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('necesidades', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->foreignId('centro_educativo_id')->constrained('centro_educativos');
            $table->foreignId('solicitante_usuario_id')->constrained('users');
            $table->date('fecha_solicitud');
            $table->enum('prioridad', ['baja', 'media', 'alta', 'urgente'])->default('media');
            $table->enum('estado', ['borrador', 'enviada', 'aprobada', 'rechazada', 'atendida', 'cancelada'])->default('borrador');
            $table->text('justificacion');
            $table->text('observaciones')->nullable();
            $table->foreignId('aprobado_por')->nullable()->constrained('users')->nullOnDelete();
            $table->date('fecha_aprobacion')->nullable();
            $table->text('motivo_rechazo')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('necesidades');
    }
};
