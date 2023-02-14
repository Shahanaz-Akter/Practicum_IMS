<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('ingredient_id');
            $table->bigInteger('amount');
            $table->bigInteger('cost_per_unit');
            $table->bigInteger('remaining');
            $table->date('manufacture_date')->nullable();
            $table->date('expire_date')->nullable();
            $table->date('entry_date');
            $table->bigInteger('alert_qty');
            $table->string('batch_no');
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
        Schema::dropIfExists('stocks');
    }
}
