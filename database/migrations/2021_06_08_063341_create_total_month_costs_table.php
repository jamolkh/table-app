<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalMonthCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_month_costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cost_id')->constrained()->onDelete('cascade');
            $table->bigInteger('amount')->default(0);
            $table->integer('month_order');
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
        Schema::dropIfExists('total_month_costs');
    }
}
