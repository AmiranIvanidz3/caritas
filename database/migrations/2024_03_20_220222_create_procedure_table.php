<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedure', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('procedure_type_id')->nullable();
            $table->string('minute')->nullable();
            $table->integer('deleted')->default(0)->nullable();
            $table->timestamps();

            $table->foreign('procedure_type_id')->references('id')->on('procedure_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procedure');
    }
}
