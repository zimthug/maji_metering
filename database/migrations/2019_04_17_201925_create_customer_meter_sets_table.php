<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerMeterSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_meter_sets', function (Blueprint $table) {
            $table->bigIncrements('meter_set_id');
            $table->integer('customer_id')->nullable();
            $table->integer('bulk_meter_id');
            $table->integer('dom_meter_id');
            $table->date('date_installed')->nullable();
            $table->string('bulk_meter_status', 5);
            $table->string('dom_meter_status', 5);
            $table->date('date_removed')->nullable();
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
        Schema::dropIfExists('customer_meter_sets');
    }
}