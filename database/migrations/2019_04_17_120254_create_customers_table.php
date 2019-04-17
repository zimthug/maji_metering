<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->string('first_name', 60)->nullable();
            $table->string('surname', 60);
            $table->string('other_names', 60)->nullable();
            $table->string('email')->nullable();
            $table->string('address');
            $table->string('street')->nullable();
            $table->integer('town');
            $table->string('customer_status', 5);
            $table->date('connection_date');
            $table->date('disconnection_date')->nullable();
            $table->string('last_updated_by');
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
        Schema::dropIfExists('customers');
    }
}
