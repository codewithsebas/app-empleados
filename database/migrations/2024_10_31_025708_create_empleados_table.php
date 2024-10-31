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
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 255)->notNullable();
            $table->string('email', 255)->unique()->notNullable();
            $table->char('sexo', 1)->notNullable();
            $table->unsignedInteger('area_id');
            $table->boolean('boletin')->default(0);
            $table->text('description')->notNullable();
            $table->timestamps();

            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
