<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectricitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electricities', function (Blueprint $table) {
            $table->id();
            $table->string('customer_info');
            $table->string('time');
            $table->string('current_read');
            $table->string('current_date');
            $table->string('account');
            $table->string('previous_read');
            $table->string('previous_date');
            $table->string('meter_no');
            $table->string('unit');
            $table->string('issue_date');
            $table->string('last_date');
            $table->string('current_price');
            $table->string('service_charged');
            $table->string('electricity_tax');
            $table->string('demand_charge');
            $table->string('electricity_vat');
            $table->string('c_sub_total');

            $table->string('d_fromdate');
            $table->string('d_todate');
            $table->string('due_balance');
            $table->string('surcharge');

            $table->string('d_sub_total');
            $table->string('total_intime');
            $table->string('total_outtime');
            
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
        Schema::dropIfExists('electricities');
    }
}
