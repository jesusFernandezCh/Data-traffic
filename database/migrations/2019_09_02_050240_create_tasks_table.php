<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->string('fecha');
            $table->string('nombre');
            $table->string('direccion');
            $table->decimal('latitud',8,2);
            $table->decimal('longitud',8,2);
            $table->integer('mercancia');
            $table->string('estado');
            $table->string('distribuidor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
