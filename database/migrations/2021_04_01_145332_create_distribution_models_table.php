<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributionModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('beneficiary_id');
            $table->unsignedInteger('union_id');
            $table->string('month');
            $table->tinyInteger('status')->default(0); // 0=not distributed, 1=distributed
            $table->date('distribution_date')->nullable();
            $table->foreign('beneficiary_id')
                ->references('id')
                ->on('beneficiaries')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('union_id')
                ->references('id')
                ->on('unions')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
        //id, benefiaciary_id, union_id, month, status, distribution_date
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distribution_models');
    }
}
