<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('estudiante_id');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');;

            $table->unsignedBigInteger('apoderado_id');
            $table->foreign('apoderado_id')->references('id')->on('apoderados')->onDelete('cascade');;

            $table->string('cod_matricula', 15);
            $table->string('nivel', 10);
            $table->string('grado', 10);
            $table->string('seccion', 50);
            
            $table->string('situacion', 10);
            $table->string('procedencia', 50);
            $table->string('ie_procedencia', 150)->nullable();
            
            $table->decimal('matricula_costo', 10, 2);
            $table->decimal('mensualidad', 10, 2);
            $table->decimal('descuento', 10, 2);
            $table->decimal('total', 10, 2);
            $table->decimal('deuda', 10, 2);
            $table->integer('dia_pago');

            $table->string('parentesco', 10);

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
        Schema::dropIfExists('matriculas');
    }
}
