<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdutoCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_categoria', function (Blueprint $table) {
            $table->integer('categoria')->unsigned();
            $table->foreign('categoria')->references('id')->on('categorias');
            $table->integer('produto')->unsigned();
            $table->foreign('produto')->references('id')->on('produtos');
            $table->unique('categoria', 'produto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
