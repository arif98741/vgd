<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenefiaciariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->string('fh_name', 150);
            $table->string('mother_name', 150);
            $table->string('nid', 20);
            $table->unsignedInteger('union_id');
            $table->string('ward');
            $table->string('village');
            $table->string('card_no');
            $table->string('mobile', 15);
            $table->string('photo')->nullable();
            $table->foreign('union_id')
                ->references('id')
                ->on('unions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            /*$table->foreign('ward_id')
                ->references('id')
                ->on('wards')
                ->onDelete('cascade')
                ->onUpdate('cascade');*/
            $table->timestamps();
            //id, name, fh_name, mother_name, union_id, village, card_no, ward_id, mobile, photo¬¬¬
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benefiaciaries');
    }
}
