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
        Schema::create('manutencoes-veiculos', function (Blueprint $table) {
            $table->id();
            $table->string('descricao',200);
            $table->string('tipo', 30);
            $table->dateTime('data');
            $table->string('placa', 10);
            $table->string('fabricante', 30);
            $table->string('modelo', 40);
            $table->smallInteger('ano');
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
        Schema::dropIfExists('veiculos');
    }
};
