<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioOrdemServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_ordem_servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->enum('status',['ABRIU','FECHOU']);
            $table->timestamp('data_hora');
            $table->integer('user_id')->unsigned();
            $table->integer('ordem_servico_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ordem_servico_id')->references('id')->on('ordem_servicos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario-ordem-servicos');
    }
}
