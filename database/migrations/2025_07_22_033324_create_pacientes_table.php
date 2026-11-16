<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',100);
            $table->string('apellido',100);
            $table->string('dni',100)->unique();
            $table->string('nro_seguro',100)->unique();
            $table->string('fecha_nacimiento',100);
            $table->string('genero',10);
            $table->string('celular',20);
            $table->string('email',100)->unique();
            $table->string('direccion',255);
            $table->string('grupo_sanguineo',100);
            $table->string('alergias',255);
            $table->string('contacto_emergencia',255);
            $table->string('observaciones',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
};
