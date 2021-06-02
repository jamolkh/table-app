<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_costs', function (Blueprint $table) {
            $table->id();
            $table->integer('total_variable_cost');
            $table->integer('total_fixed_cost');
            $table->integer('total_other_cost');
            $table->foreignId('project_id')->constrained();
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
        Schema::dropIfExists('total_costs');
    }
}
