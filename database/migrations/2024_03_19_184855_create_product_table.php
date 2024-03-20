<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_type_id');
            $table->string('name');
            $table->string('code');
            $table->string('bar_code');
            $table->string('internal_code');
            $table->unsignedBigInteger('unit_type_id');
            $table->integer('deleted')->default(0)->nullable();
            $table->timestamp('inserted_at')->useCurrent();
            $table->timestamps();

            $table->foreign('product_type_id')->references('id')->on('product_type');
            $table->foreign('unit_type_id')->references('id')->on('unit_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
