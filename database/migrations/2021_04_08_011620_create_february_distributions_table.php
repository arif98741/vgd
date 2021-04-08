<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFebruaryDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('february_distributions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('beneficiary_id');
            $table->integer('union_id');
            $table->string('month');
            $table->tinyInteger('status')->default(0);
            $table->date('distribution_date')->nullable();
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
        Schema::dropIfExists('february_distributions');
    }
}
