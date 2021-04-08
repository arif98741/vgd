<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuneDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('june_distributions', function (Blueprint $table) {
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
        Schema::dropIfExists('june_distributions');
    }
}
