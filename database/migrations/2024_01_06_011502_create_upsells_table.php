<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpsellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upsells', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('qtdNumeros')->nullable()->default(null);
            $table->float('valor', 8, 2)->nullable()->default(null);
            $table->float('desconto', 8, 2)->nullable()->default(null);
            $table->integer('product_id')->nullable()->unsigned();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upsells');
    }
}
