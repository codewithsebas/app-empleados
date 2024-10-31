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
            $table->increments('id')->comment('Identificador del empleado');
            $table->string('nombre', 255)->notNullable()->comment('Nombre completo del empleado. campo tipo text. Solo debe permitir letras con o sin tilde y espacios. No se admiten caracteres especiales ni numeros. Obligatorio');;
            $table->string('email', 255)->unique()->notNullable()->comment('Correo electronico del empleado. campo de tipo Text|Email. solo permite una estructura de correo. Obligatorio');;
            $table->char('sexo', 1)->notNullable()->comment('Campo de tipo radio button. M para masculino. F para femenino. Obligatorio');
            $table->unsignedInteger('area_id')->notNullable()->comment('Area de la empresa a la que pertenece el empleado. campo de tipo select. Obligatorio.');
            $table->boolean('boletin')->default(0)->comment('1 para recibir boletion. 0 para no recibir boletion. campo de tipo checkbox. Obligatorio.');
            $table->text('descripcion')->notNullable()->comment('Se describe la experiencia del empleado. campo de tipo textare. Obligario');
            $table->timestamps();

            // Se define la relación con la tabla areas
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
