<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waters', function (Blueprint $table) {
            $table->id();
            $table->string('building');
            $table->string('tenants');
            $table->string('c_fromdate');
            $table->string('c_todate');
            $table->string('c_measurement');
            $table->string('c_totalmonth');
            $table->string('c_rate');
            $table->string('d_fromdate');
            $table->string('d_todate');
            $table->string('d_measurement');
            $table->string('d_totalmonth');
            $table->string('d_rate');
            $table->string('total_bill');
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
        Schema::dropIfExists('waters');
    }
}
