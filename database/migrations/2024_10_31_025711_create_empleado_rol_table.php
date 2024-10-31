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
        Schema::create('empleado_rol', function (Blueprint $table) {
            $table->unsignedInteger('empleado_id')->comment('Identificador del empleado');
            $table->unsignedInteger('rol_id')->comment('Identificador del rol');
            
            // Se define la relación con la tabla areas
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado_rol');
    }
};
