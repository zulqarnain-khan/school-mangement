<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelex_staff_applications', function (Blueprint $table) {
            $table->id('STAFF_APP_ID');
            $table->bigInteger('STAFF_ID')->nullable();
            $table->bigInteger('USER_ID')->nullable();
            $table->bigInteger('CAMPUS_ID')->nullable();
            $table->enum('APPLICATION_TYPE',['1','2','3','4','5'])->nullable();
            $table->enum('APLLICATION_STATUS',['0','1','2'])->nullable()->comments('0=pending,1=approved,2=rejected');
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
        Schema::dropIfExists('kelex_staff_applications');
    }
}
