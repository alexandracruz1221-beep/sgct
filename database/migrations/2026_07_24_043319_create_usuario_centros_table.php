<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuario_centros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('centro_educativo_id')->constrained('centro_educativos');
            $table->timestamps();
            $table->unique(['user_id', 'centro_educativo_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuario_centros');
    }
};
