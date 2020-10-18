<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelex_fee_structures', function (Blueprint $table) {
            $table->id('FEE_ID');
            $table->bigInteger('CLASS_ID')->nullable();
            $table->bigInteger('SECTION_ID')->nullable();
            $table->bigInteger('CAMPUS_ID')->nullable();
            $table->bigInteger('CREATED_BY')->nullable();
            $table->decimal('FEE_AMOUNT')->nullable();
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
        Schema::dropIfExists('kelex_fee_structures');
    }
}
