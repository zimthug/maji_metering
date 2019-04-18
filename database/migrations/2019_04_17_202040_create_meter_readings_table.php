<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeterReadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meter_readings', function (Blueprint $table) {
            $table->bigIncrements('reading_id');
            $table->integer('meter_set_id');
            $table->date('reading_date');
            $table->string('period', 6);
            $table->float('dom_meter_reading');
            $table->float('bulk_meter_reading');
            $table->float('consumption');
            $table->integer('previous_reading_id');
            $table->integer('remaining_units');
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
        Schema::dropIfExists('meter_readings');
    }
}