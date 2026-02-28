<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('dui')->unique()->nullable()->after('name');
            $table->string('nit')->unique()->nullable()->after('dui');
            $table->date('fecha_nacimiento')->nullable()->after('nit');
            $table->string('telefono')->nullable()->after('fecha_nacimiento');
            $table->text('direccion')->nullable()->after('telefono');
            $table->enum('tipo_contribuyente', ['persona_natural', 'persona_juridica'])->nullable()->after('direccion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['dui', 'nit', 'fecha_nacimiento', 'telefono', 'direccion', 'tipo_contribuyente']);
        });
    }
};
